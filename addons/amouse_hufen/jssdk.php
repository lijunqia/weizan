<?php


function getSignPackage($weid, $appIfo){
    $jsapiTicket = getJsApiTicket($weid, $appIfo);
    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $timestamp = time();
    $nonceStr = createNonceStr();
    // 这里参数的顺序要按照 key 值 ASCII 码升序排序
    $string = "jsapi_ticket=$jsapiTicket&noncestr=$nonceStr&timestamp=$timestamp&url=$url";
    $signature = sha1($string);
    $signPackage = array(
        "appId" => $appIfo['appid'],
        "nonceStr" => $nonceStr,
        "timestamp" => $timestamp,
        "url" => $url,
        "signature" => $signature,
        "rawString" => $string
    );
    return $signPackage;
}

function createNonceStr($length = 16){
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $str = "";
    for ($i = 0; $i < $length; $i++) {
        $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
    }
    return $str;
}

function getJsApiTicket($weid, $appIfo){
    if (IMS_VERSION >= 0.6) {
        load()->func('cache');
    }
    $data = cache_load("szy_hufen.jsapi_ticket.json::" . $appIfo['appid'], true);

    if (empty($data['expire_time']) || $data['expire_time'] < time()) {
        $accessToken = getAccessToken($weid, $appIfo);
        $url = "http://api.weixin.qq.com/cgi-bin/ticket/getticket?type=1&access_token=$accessToken";
        $res = json_decode(httpGet($url));
        $ticket = $res->ticket;
        if ($ticket) {
            $data['expire_time'] = time() + 7000;
            $data['jsapi_ticket'] = $ticket;
            cache_write("szy_hufen.jsapi_ticket.json::" . $appIfo['appid'], iserializer($data));

        } else {
            print_r($res);
        }
    } else {
        $ticket = $data['jsapi_ticket'];
    }

    return $ticket;
}

function getAccessToken($weid, $appIfo)
{
    if (IMS_VERSION >= 0.6) {
        load()->func('cache');
    }

    $data = cache_load("szy_hufen.access_token.json::" . $appIfo['appid'], true);

    if (empty($data['expire_time']) || $data['expire_time'] < time()) {
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appIfo['appid']}&secret={$appIfo['appsecret']}";

        $ret = httpGet($url);

        $res = json_decode($ret);
        $access_token = $res->access_token;
        if ($access_token) {
            $data['expire_time'] = time() + 7000;
            $data['access_token'] = $access_token;
            cache_write("szy_hufen.access_token.json::" . $appIfo['appid'], iserializer($data));
        }
    }
    return $data['access_token'];
}

function httpGet($url)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_TIMEOUT, 500);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSLVERSION, 1);
    if (defined('CURL_SSLVERSION_TLSv1')) {
        curl_setopt($curl, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1);
    }
    curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:9.0.1) Gecko/20100101 Firefox/9.0.1');
    $res = curl_exec($curl);
    $errno = curl_errno($curl);
    $error = curl_error($curl);
    curl_close($curl);
    if ($errno || empty($res)) {
        print_r($error);
    }
    return $res;
}

load()->func('communication');
