<?php 
/**
 * 友情链接
 * 
 * @package custom 
 * 
 */
 if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('head.php');
?>
<body class="single">
    <div id="catui-header">
        <?php $this->need('header.php'); ?>
    </div>
    <div id="catui-content">
        <div class="catui-container">
            <div class="catui-primary detail">
                
                <div class="catui catui-item">
                    <div class="catui-block">
                        <div class="catui-meta">
                            <a><?php $this->date('Y年n月d日');?></a>
                            <a><?php art_count($this->cid);?> 汉字</a>
                            <a><?php get_post_view($this);?> 围观</a>
                            <a><?php $this->commentsNum('%d'); ?> 评论</a>
                            <?php $this->category(' '); ?>
                            <?php $this->tags(' ', true); ?>
                        </div>
                        <div class="catui-border">
                            <div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div>
                        </div>
                        <article class="catui-content">
                            <?php
                            $str = preg_replace('#<li>(.*?)</li>#','<li>$1</li>', $this->content);
                            $str = preg_replace('#<li>(.*?)<a href="(.*?)">(.*?)</a></li>#','<a class="mdui-ripple" href="$2" target="_blank" >$1<p>$3</p></a>',$str);
                            $str = preg_replace('#<ul>#','<div class="link-area">', $str);
                            $str = preg_replace('#</ul>#','</div>', $str);
                            $str = preg_replace('#\@\((.*?)\)#','<img src="https://nexmoe.com/usr/themes/catui/newpaopao/$1.png" class="biaoqing">',$str);
                            $str = preg_replace('#<a href="(.*?)">(.*?)</a>#','<a href="$1" target="_blank" >$2</a>',$str);
                            echo $str;
                            ?>
                        </article>
                    </div><!-- .catui-block -->
                </div><!-- .catui-item -->

                <div id="comments" class="catui-item"><?php $this->need('comments.php'); ?></div><!-- #comments -->
            </div><!-- .catui-primary -->
            <div class="catui-secondary" id="sider">
                <?php $this->need('sider.php'); ?>
            </div><!-- .catui-secondary -->
        </div><!-- .catui-container -->
    </div>
    
    <div id="catui-footer">
        <?php $this->need('footer.php'); ?>
    </div>
</body>
</html>