<?php
/**
 * 女神来了模块定义
 *
 * @author 微赞科技
 * @url http://bbs.012wz.com/
 */
defined('IN_IA') or exit('Access Denied');

		$status = $_GPC['status'];
		//$reply['sharetitle']= $this->get_share($uniacid,$rid,$from_user,$reply['sharetitle']);
		//$reply['sharecontent']= $this->get_share($uniacid,$rid,$from_user,$reply['sharecontent']);
		//$myavatar = $avatar;
		//$mynickname = $nickname;
		$title = $rbasic['title'];
		//$_share['link'] = $_W['siteroot'] .'app/'.$this->createMobileUrl('shareuserview', array('rid' => $rid,'fromuser' => $from_user));//分享URL
		 $_share['title'] = $this->get_share($uniacid,$rid,$from_user,$rshare['sharetitle']);
		$_share['content'] = $this->get_share($uniacid,$rid,$from_user,$rshare['sharecontent']);
		$_share['imgUrl'] = toimage($rshare['sharephoto']);		
		include $this->template('stopllq');