<?php
/**
 * 普通话在线考试模块微站定义
 *
 * @author 华轩科技
 * @url http://bbs.012wz.com/
 */
defined('IN_IA') or exit('Access Denied');

class Hx_voiceModuleSite extends WeModuleSite {

	public function doMobileVoice() {
		//这个操作被定义用来呈现 功能封面
		global $_W,$_GPC;
		$s_title = isset($this->module['config']['s_title']) ? $this->module['config']['s_title'] : '你的普通话什么等级？';
		$s_content = isset($this->module['config']['s_content']) ? $this->module['config']['s_content'] : '普通话等级测试，你敢来试试吗？';
		$s_img = isset($this->module['config']['s_img']) ? $this->module['config']['s_img'] : $_W['siteroot'].'addons/hx_voice/icon.jpg';
		$title = array(
			"桃树、杏树、梨树，你不让我，我不让你，都开满了花赶趟儿。红的像火，粉的像霞，白的像雪。花里带着甜味儿；闭了眼，树上仿佛已经满是桃儿、杏儿、梨儿。",
			"这，也许特殊了一点儿，常人不容易理解。那么，你看见过笋的成长吗？你看见过被压在瓦砾和石块下面的一棵小草的生长吗？它为着向往阳光，为着达成它的生之意志，不管上面的石块如何重，石与石之间如何狭，它必定要曲曲折折地，但是顽强不屈地透到地面上来。",
			"两个同龄的年轻人同时受雇于一家店铺，并且拿同样的薪水。可是一段时间后，叫阿诺德的那个小伙子青云直上，而那个叫布鲁诺的小伙子却仍在原地踏步。布鲁诺很不满意老板的不公正待遇。",
			"然而，恰恰是这座不留姓名的坟墓，比所有挖空心思用大理石和奢华装饰建造的坟墓更扣人心弦。在今天这个特殊的日子里，到他的安息地来的成百上千人中间，没有一个有勇气，哪怕仅仅从这幽暗的土丘上摘下一朵花留作纪念。",
			"我的朋友很多，玲玲是我最要好的一个朋友，也是是多年的老朋友了。高高的个子，细长的眉毛下闪动着一双乌黑发亮的眼睛，流露出聪颖的光芒。体型不胖不瘦，平时爱穿蓝色的衬衫，咖啡色的裤子，黑色的皮鞋，很有精神。",
			"小草偷偷地从土里钻出来，嫩嫩的，绿绿的。园子里，田野里，瞧去，一大片一大片满是的。坐着，躺着，打两个滚，踢几脚球，赛几趟跑，捉几回迷藏。风轻悄悄的，草软绵绵的。",
			"爸不懂得怎样表达爱，使我们一家人融洽相处的是我妈。他只是每天上班下班，而妈则把我们做过的错事开列清单，然后由他来责骂我们。有一次我偷了一块糖果，他要我把它送回去，告诉卖糖的说是我偷来的，说我愿意替他拆箱卸货作为赔偿。",
			"最妙的是下点儿小雪呀。看吧，山上的矮松越发的青黑，树尖儿上顶着一髻儿白花，好像日本看护妇。山尖儿全白了，给蓝天镶上一道银边。山坡上，有的地方雪厚点儿，有的地方草色还露着；这样，一道儿白，一道儿暗黄，给山们穿上一件带水纹儿的花衣。",
			"这，也许特殊了一点儿，常人不容易理解。那么，你看见过笋的成长吗？你看见过被压在瓦砾和石块下面的一棵小草的生长吗？它为着向往阳光，为着达成它的生之意志，不管上面的石块如何重，石与石之间如何狭，它必定要曲曲折折地，但是顽强不屈地透到地面上来。",
			"然而，恰恰是这座不留姓名的坟墓，比所有挖空心思用大理石和奢华装饰建造的坟墓更扣人心弦。在今天这个特殊的日子里，到他的安息地来的成百上千人中间，没有一个有勇气，哪怕仅仅从这幽暗的土丘上摘下一朵花留作纪念。",
			"对于一个在北平住惯的人，像我，冬天要是不刮风，便觉得是奇迹；济南的冬天是没有风声的。对于一个刚由伦敦回来的人，像我，冬天要能看得见日光，便觉得是怪事；济南的冬天是响晴的。自然，在热带的地方，日光永远是那么毒，响亮的天气，反有点儿叫人害怕。",
			"记得我十三岁时，和母亲住在法国东南部的耐斯城。母亲没有丈夫，也没有亲戚，够清苦的，但她经常能拿出令人吃惊的东西，摆在我面前。她从来不吃肉，一再说自己是素食者。",
			"很快他又有了新的机会，他让他的顾客每天把垃圾袋放在门前，然后由他早上运到垃圾桶里，每个月加一美元。之后他还想出了许多孩子赚钱的办法，并把它集结成书。",
			"树，活的树，又不卖何言其贵？只因它老，它粗，是香港百年沧桑的活见证，香港人不忍看着它被砍伐，或者被移走，便跟要占用这片山坡的建筑者谈条件：可以在这儿建大楼盖商厦，但一不准砍树，二不准挪树，必须把它原地精心养起来，成为香港闹市中的一景。",
			"天上风筝渐渐多了，地上孩子也多了。城里乡下，家家户户，老老小小，也赶趟儿似的，一个个都出来了。舒活舒活筋骨，抖擞抖擞精神，各做各的一份事去。",
			);
		$key = mt_rand(0,count($title)-1);
		$t = $title[$key];
		include $this->template('voice');
	}

	public function doMobilePostvoice() {
		global $_W,$_GPC;
		$old = $_GPC['old'];
		$text = $_GPC['text'];
		similar_text($old, $text, $percent);
		if ($percent >= 97) {
			$msg = "哇！！你的普通话为【一级甲等】，有当播音员的潜质哦！！";
		}elseif ($percent >= 90) {
			$msg = "great！你的普通话为【一级乙等】，可以去应聘语文老师啦！";
		}elseif ($percent >= 87) {
			$msg = "你的普通话为【二级甲等】，只能当外国友人汉语老师哦！";
		}elseif ($percent >= 80) {
			$msg = "你的普通话为【二级乙等】，努力让普通话说的更好哦！";
		}elseif ($percent >= 77) {
			$msg = "恭喜O(∩_∩)O，普通话为【三级甲等】，仅够日常交流！";
		}elseif ($percent >= 70) {
			$msg = "咿！你的普通话为【三级乙等】，方言也不是你这么说的吧！！";
		}else{
			$msg = "亲，你是火星来的嘛？汉语都能被你讲成这样，回去在练练吧%>_<%！";
		}
		$data = array(
			'percent' => sprintf("%.2f", $percent),
			'msg' => $msg,
			);
		exit(json_encode($data));
	}

}