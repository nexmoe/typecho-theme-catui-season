<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
error_reporting(0);
function themeInit($archive){
    Helper::options()->commentsAntiSpam = false; 
}
function themeConfig($form){
	$logoUrl=new Typecho_Widget_Helper_Form_Element_Text('logoUrl',NULL,"https://avatar.mixcm.com/github/nexmoe",_t ('博客头像'),_t ('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO<br>可使用QQ头像链接作为LOGO http://avatar.mixcm.com/qq/（这里填QQ）'));
	$form->addInput ($logoUrl);
	
	$background=new Typecho_Widget_Helper_Form_Element_Text('background',NULL,'https://cdn.jsdelivr.net/gh/nexmoe/image@latest/679710.png',_t ('博客头图'),_t ('在这里填入一个图片URL地址, 给博客添加一个头图'));
	$form->addInput ($background);
	
	$supportzfb=new Typecho_Widget_Helper_Form_Element_Text('supportzfb',NULL,"https://ooo.0o0.ooo/2017/10/14/59e1cb575ec56.png",_t ('支付宝付款二维码'));
	$form->addInput ($supportzfb);
	
	$supportqq=new Typecho_Widget_Helper_Form_Element_Text('supportqq',NULL,NULL,_t ('腾讯QQ付款二维码'));
	$form->addInput ($supportqq);
	
	$supportwx=new Typecho_Widget_Helper_Form_Element_Text('supportwx',NULL,"https://ooo.0o0.ooo/2017/10/14/59e1cb575ec56.png",_t ('微信付款二维码'));
	$form->addInput ($supportwx);
	
	$css=new Typecho_Widget_Helper_Form_Element_Textarea('css',NULL,'',_t ('自定义CSS'),_t ('为你的网站自定义的CSS样式表'));
	$form->addInput ($css);
	
	$tongji=new Typecho_Widget_Helper_Form_Element_Textarea('tongji',NULL,'<script>var _hmt = _hmt || [];(function() {var hm = document.createElement("script");hm.src = "https://hm.baidu.com/hm.js?41b04999ee3d67f2acc9ce741045e68d";var s = document.getElementsByTagName("script")[0];s.parentNode.insertBefore(hm, s);})();</script><script data-ad-client="ca-pub-2058306854838448" async="" src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>','统计代码','为你的网站添加统计代码');
	$form->addInput ($tongji);
	
	$Cover=new Typecho_Widget_Helper_Form_Element_Radio('Cover',array ('2'=>_t ('文章标题'),'5'=>_t ('自定义Cover'),'6'=>_t ('自定义Cover+标题')),'6',_t ('Cover模式'),_t ("文章标题：将标题设置为Cover。<br>自定义Cover：若已设置“自定义缩略图”，则将其设置为Cover，当没有图片时，会将背景设置为Cover。<br>自定义Cover+标题：若已设置“自定义缩略图”，则将其设置为Cover，当没有图片时，会将标题设置为Cover。"));
	$form->addInput ($Cover);
	
	$OtherTool=new Typecho_Widget_Helper_Form_Element_Checkbox('OtherTool',array ('share'=>_t ('博客功能（文章内显示打赏、二维码按钮）'),'smoothscroll'=>_t ('开启SmoothScroll平滑滚动')),array ('share','smoothscroll'),_t ('其他工具'));
	$form->addInput ($OtherTool->multiMode ());
	
	$Sider=new Typecho_Widget_Helper_Form_Element_Checkbox('Sider',array ('qrcode'=>_t ('二维码'),'tagscloud'=>_t ('标签云'),'search'=>_t ('搜索栏'),'archive'=>_t ('文章归档'),'comments'=>_t ('近期评论')),array ('qrcode','tagscloud','search','archive','comments'),_t ('侧边栏'));
	$form->addInput ($Sider->multiMode ());
}
function themeFields($layout) {
    $Cover = new Typecho_Widget_Helper_Form_Element_Textarea('Cover', NULL, NULL, _t('自定义缩略图'), _t('输入缩略图地址'));
    $layout->addItem($Cover);
}
function Cover ($cid,$Cover){
	$options=Typecho_Widget::widget ('Widget_Options');
	$db=Typecho_Db::get ();
	$rs=$db->fetchRow ($db->select ('table.contents.text','table.contents.title')->from ('table.contents')->where ('table.contents.cid=?',$cid)->order ('table.contents.cid',Typecho_Db::SORT_ASC)->limit (1));
	
	$colorid=rand(1,8);
	switch ($colorid){
		case 1:
			$color='rgb(255, 110, 113)';
			break ;
		case 2:
			$color='rgb(255, 170, 115)';
			break ;
		case 3:
			$color='rgb(254, 212, 102)';
			break ;
		case 4:
			$color='rgb(60, 220, 130)';
			break ;
		case 5:
			$color='rgb(100, 220, 240)';
			break ;
		case 6:
			$color='rgb(100, 185, 255)';
			break ;
		case 7:
			$color='rgb(180, 180, 255)';
			break ;
		case 8:
		    $color='#f4a7b9';
			break ;
	}
	if ($options->Cover =='5'){
		if ($Cover != ""){
			echo '<div class="cover mdui-ripple"><img src="'.$Cover.'"><div class="title">'.$rs['title'].'</div></div>';
		}else {
			echo '<div class="cover mdui-ripple"><img src="'.$options->background.'"><div class="title">'.$rs['title'].'</div></div>';
		}
	}
	elseif ($options->Cover =='6'){
		if ($Cover != ""){
			echo '<div class="cover mdui-ripple"><img src="'.$Cover.'"><div class="title">'.$rs['title'].'</div></div>';
		}else {
			echo '<div class="cover mdui-ripple"><p style="background:'.$color.';"></p><div class="title">'.$rs['title'].'</div></div>';
		}
	}
	else {
		echo '<div class="cover mdui-ripple"><p style="background:'.$color.';"></p><div class="title">'.$rs['title'].'</div></div>';
	}
}
function  art_count ($cid){
	$db=Typecho_Db::get ();
	$rs=$db->fetchRow ($db->select ('table.contents.text')->from ('table.contents')->where ('table.contents.cid=?',$cid)->order ('table.contents.cid',Typecho_Db::SORT_ASC)->limit (1));
	$text=preg_replace("/[^\x{4e00}-\x{9fa5}]/u","",$rs['text']);
	echo mb_strlen($text,'UTF-8');
}
function  get_post_cover ($Cover){
	$options=Typecho_Widget::widget ('Widget_Options');

	if ($options->Cover =='5'){
		if ($Cover != ""){
			echo $Cover;
		}else {
			echo $options->background;
		}
	}
	elseif ($options->Cover =='6'){
		if ($Cover != ""){
			echo $Cover;
		}else {
			echo $options->background;
		}
	}
	else {
		echo $options->background;
	}
}
function  get_post_view ($archive){
	$cid=$archive->cid ;
	$db=Typecho_Db::get ();
	$prefix=$db->getPrefix ();
	if (!array_key_exists('viewsNum',$db->fetchRow ($db->select ()->from ('table.contents')))){
		$db->query ('ALTER TABLE `'.$prefix.'contents` ADD `viewsNum` INT(10) DEFAULT 0;');
		echo 0;
		return ;
	}
	$row=$db->fetchRow ($db->select ('viewsNum')->from ('table.contents')->where ('cid = ?',$cid));
	if ($archive->is ('single')){
		$views=Typecho_Cookie::get ('extend_contents_viewsNum');
		if (empty($views)){
			$views=array ();
		}else {
			$views=explode(',',$views);
		}
		if (!in_array($cid,$views)){
			$db->query ($db->update ('table.contents')->rows (array ('viewsNum'=>(int )$row['viewsNum']+1))->where ('cid = ?',$cid));
			array_push($views,$cid);
			$views=implode(',',$views);
			Typecho_Cookie::set ('extend_contents_viewsNum',$views);
			//记录查看cookie
		}
	}
	echo $row['viewsNum'];
}
function get_comment_at($coid){
    $db   = Typecho_Db::get();
    $prow = $db->fetchRow($db->select('parent')
        ->from('table.comments')
        ->where('coid = ? AND status = ?', $coid, 'approved'));
    $parent = $prow['parent'];
    if ($parent != "0") {
        $arow = $db->fetchRow($db->select('author')
            ->from('table.comments')
            ->where('coid = ? AND status = ?', $parent, 'approved'));
        $author = $arow['author'];
        $href   = '<a class="at" href="#comment-'.$parent.'">回复 '.$author.':</a> ';
        echo $href;
    } else {
        echo '';
    }
}
function get_biaoqing_info($type) {
    $a=array ("@(二哈)"=>"二哈","@(柴犬)"=>"柴犬","@(柴犬不高兴)"=>"柴犬不高兴","@(柴犬再见)"=>"柴犬再见","@(柴犬哭)"=>"柴犬哭","@(柴犬舔舌头)"=>"柴犬舔舌头","@(柴犬耍帅)"=>"柴犬耍帅","@(柴犬大嘴)"=>"柴犬大嘴","@(呵呵)"=>"呵呵","@(哈哈)"=>"哈哈","@(吐舌)"=>"吐舌","@(太开心)"=>"太开心","@(笑眼)"=>"笑眼","@(花心)"=>"花心","@(小乖)"=>"小乖","@(乖)"=>"乖","@(捂嘴笑)"=>"捂嘴笑","@(滑稽)"=>"滑稽","@(你懂的)"=>"你懂的","@(不高兴)"=>"不高兴","@(怒)"=>"怒","@(汗)"=>"汗","@(黑线)"=>"黑线","@(泪)"=>"泪","@(真棒)"=>"真棒","@(喷)"=>"喷","@(惊哭)"=>"惊哭","@(阴险)"=>"阴险","@(鄙视)"=>"鄙视","@(酷)"=>"酷","@(啊)"=>"啊","@(狂汗)"=>"狂汗","@(what)"=>"what","@(疑问)"=>"疑问","@(酸爽)"=>"酸爽","@(呀咩爹)"=>"呀咩爹","@(委屈)"=>"委屈","@(惊讶)"=>"惊讶","@(睡觉)"=>"睡觉","@(笑尿)"=>"笑尿","@(挖鼻)"=>"挖鼻","@(吐)"=>"吐","@(犀利)"=>"犀利","@(小红脸)"=>"小红脸","@(懒得理)"=>"懒得理","@(勉强)"=>"勉强","@(爱心)"=>"爱心","@(心碎)"=>"心碎","@(玫瑰)"=>"玫瑰","@(礼物)"=>"礼物","@(彩虹)"=>"彩虹","@(太阳)"=>"太阳","@(星星月亮)"=>"星星月亮","@(钱币)"=>"钱币","@(茶杯)"=>"茶杯","@(蛋糕)"=>"蛋糕","@(大拇指)"=>"大拇指","@(胜利)"=>"胜利","@(haha)"=>"haha","@(OK)"=>"OK","@(沙发)"=>"沙发","@(手纸)"=>"手纸","@(香蕉)"=>"香蕉","@(便便)"=>"便便","@(药丸)"=>"药丸","@(红领巾)"=>"红领巾","@(蜡烛)"=>"蜡烛","@(音乐)"=>"音乐","@(灯泡)"=>"灯泡");
    if($type=="run"){
        foreach($a as $x=>$x_value){
            echo '<a class="mdui-ripple" onclick="Smilies.grin(\''.$x.'\');"><img src="'.Helper::options()->themeUrl.'/newpaopao/'.$x_value.'.png"></a>';
        }
    }
}
function  get_useragent_info ($agent,$biao){
	switch ($biao){
		case  'browser':
			if (preg_match('/MSIE\s([^\s|;]+)/i',$agent,$regs)){
				return 'IE浏览器';
			}
			elseif (preg_match('/FireFox\/([^\s]+)/i',$agent,$regs)){
				return 'Firefox';
			}
			elseif (preg_match('/Maxthon([\d]*)\/([^\s]+)/i',$agent,$regs)){
				return '傲游浏览器';
			}
			elseif (preg_match('#SE 2([a-zA-Z0-9.]+)#i',$agent,$regs)){
				return '搜狗浏览器';
			}
			elseif (preg_match('#360([a-zA-Z0-9.]+)#i',$agent,$regs)){
				return '360安全浏览器';
			}
			elseif (preg_match('/Edge([\d]*)\/([^\s]+)/i',$agent,$regs)){
				return 'Edge';
			}
			elseif (preg_match('/UC/i',$agent)){
				return 'UC浏览器';
			}
			elseif (preg_match('/MicroMesseng/i',$agent,$regs)){
				return '微信内嵌浏览器';
			}
			elseif (preg_match('/WeiBo/i',$agent,$regs)){
				return '微博内嵌浏览器';
			}
			elseif (preg_match('/QQ/i',$agent,$regs) || preg_match('/QQBrowser\/([^\s]+)/i',$agent,$regs)){
				return 'QQ浏览器';
			}
			elseif (preg_match('/BIDU/i',$agent,$regs)){
				return '百度浏览器';
			}
			elseif (preg_match('/LBBROWSER/i',$agent,$regs)){
				return '猎豹浏览器';
			}
			elseif (preg_match('/TheWorld/i',$agent,$regs)){
				return '世界之窗浏览器';
			}
			elseif (preg_match('/XiaoMi/i',$agent,$regs)){
				return '小米浏览器';
			}
			elseif (preg_match('/UBrowser/i',$agent,$regs)){
				return 'UC浏览器';
			}
			elseif (preg_match('/mailapp/i',$agent,$regs)){
				return 'email内嵌浏览器';
			}
			elseif (preg_match('/2345Explorer/i',$agent,$regs)){
				return '2345浏览器';
			}
			elseif (preg_match('/Sleipnir/i',$agent,$regs)){
				return '神马浏览器';
			}
			elseif (preg_match('/YaBrowser/i',$agent,$regs)){
				return 'Yandex浏览器';
			}
			elseif (preg_match('/Opera[\s|\/]([^\s]+)/i',$agent,$regs)){
				return 'Opera浏览器';
			}
			elseif (preg_match('/MZBrowser/i',$agent,$regs)){
				return '魅族浏览器';
			}
			elseif (preg_match('/VivoBrowser/i',$agent,$regs)){
				return 'vivo浏览器';
			}
			elseif (preg_match('/Quark/i',$agent,$regs)){
				return '夸克浏览器';
			}
			elseif (preg_match('/mixia/i',$agent,$regs)){
				return '米侠浏览器';
			}
			elseif (preg_match('/CoolMarket/i',$agent,$regs)){
				return '基安内置浏览器';
			}
			elseif (preg_match('/Thunder/i',$agent,$regs)){
				return '迅雷内置浏览器';
			}
			elseif (preg_match('/Chrome([\d]*)\/([^\s]+)/i',$agent,$regs)){
				return 'Chrome';
			}
			elseif (preg_match('/safari\/([^\s]+)/i',$agent,$regs)){
				return 'Safari';
			}else {
				return '未知浏览器';
			}
			break ;
		case  'os':
			if (preg_match('/win/i',$agent)){
				if (preg_match('/nt 6.0/i',$agent)){
					return'Windows Vista';
				}else if (preg_match('/nt 6.1/i',$agent)){
					return'Windows 7';
				}else if (preg_match('/nt 6.2/i',$agent)){
					return'Windows 8';
				}else if (preg_match('/nt 6.3/i',$agent)){
					return'Windows 8.1';
				}else if (preg_match('/nt 5.1/i',$agent)){
					return'Windows XP';
				}else if (preg_match('/nt 10.0/i',$agent)){
					return'Windows 10';
				}else {
					return'Windows';
				}
			}else if (preg_match('/android/i',$agent)){
				if (preg_match('/android 8/i',$agent)){
					return'Android O';
				}else if (preg_match('/android 7/i',$agent)){
					return'Android N';
				}else if (preg_match('/android 6/i',$agent)){
					return'Android M';
				}else if (preg_match('/android 5/i',$agent)){
					return'Android L';
				}else {
					return'Android';
				}
			}else if (preg_match('/ubuntu/i',$agent)){
				return'Ubuntu';
			}else if (preg_match('/linux/i',$agent)){
				return'Linux';
			}else if (preg_match('/iPhone/i',$agent)){
				return'iPhone OS';
			}else if (preg_match('/mac/i',$agent)){
				return'Mac OS';
			}else if (preg_match('/unix/i',$agent)){
				return'Unix';
			}else if (preg_match('/symbian/i',$agent)){
				return'Nokia SymbianOS';
			}else {
				return'未知系统';
			}
			break ;
	}
}
function  get_cid_info ($cid,$biao){
	$db=Typecho_Db::get ();
	$rs=$db->fetchRow ($db->select ('table.contents.'.$biao)->from ('table.contents')->where ('table.contents.cid=?',$cid)->order ('table.contents.cid',Typecho_Db::SORT_ASC)->limit (1));
	return $rs[$biao];
}