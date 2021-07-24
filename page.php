<?php 
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
                            $str = preg_replace('#<a href="(.*?)">(.*?)</a>#','<a href="$1" target="_blank" >$2</a>',$this->content);
                            $str = preg_replace('#\@\((.*?)\)#','<img src="https://nexmoe.com/usr/themes/catui/newpaopao/$1.png" class="biaoqing">',$str);
                            $str = preg_replace('#<li><p>\[OPEN\](.*?)</p><ul>(.*?)</ul></li>#','<li><details open><summary><i class="mdui-icon material-icons add">add_circle</i><i class="mdui-icon material-icons remove">remove_circle</i> $1</summary><ul>$2</ul></details></li>',$str);
                            $str = preg_replace('#<li><p>(.*?)</p><ul>(.*?)</ul></li>#','<li><details><summary><i class="mdui-icon material-icons add">add_circle</i><i class="mdui-icon material-icons remove">remove_circle</i> $1</summary><ul>$2</ul></details></li>',$str);
                            $str = preg_replace('#<li>(.*?)\[Y\](.*?)</li>#','<li>$1<label class="mdui-checkbox">
                                <input type="checkbox" disabled checked>
                                <i class="mdui-checkbox-icon"></i> 
                                </label><del>$2</del></li>',$str);
                            $str = preg_replace('#<li>(.*?)\[N\](.*?)</li>#','<li>$1<label class="mdui-checkbox">
                                <input type="checkbox" disabled><i class="mdui-checkbox-icon"></i></label>$2</li>',$str);
                            $str = preg_replace('#<p>\[PIC(.*?)\]</p>(.*?)<p>\[/PIC(.*?)\]</p>#','<div class="catui-pic-$1">$2</div>',$str);
                            $str = preg_replace('#<p><img src="(.*?)"(.*?)title="(.*?)"></p>#','<p title="$3">
                            <a data-fancybox="gallery" href="$1"><img src="$1"$2title="$3"></a></p>',$str);
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