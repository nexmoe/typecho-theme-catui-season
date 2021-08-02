<?php 
/**
 * Cat UI 情托于物。人情冷暖，世态炎凉。
 * @package Cat UI Season
 * @author 折影轻梦 
 * @version 1.0
 * @link http://nexmoe.com/ 
 */ 
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('head.php'); 
?>
<body>
    <div id="catui-header">
        <?php $this->need('header.php'); ?>
    </div>
    <div id="catui-content">
        <div class="catui-container">
            <div class="catui-primary"> 
                <div class="catui catui-item">
                    <?php while($this->next()): ?>
                    <div class="catui-block">
                        <a class="catui-cover" href="<?php $this->permalink() ?>">
                            <?php Cover($this->cid,$this->fields->Cover); ?>
                        </a>
                        <div class="catui-meta">
                            <a><?php $this->date('Y年n月d日');?></a>
                            <a><?php art_count($this->cid);?> 汉字</a>
                            <a><?php get_post_view($this);?> 围观</a>
                            <a><?php $this->commentsNum('%d'); ?> 评论</a>
                            <?php $this->category(','); ?>
                            <?php $this->tags(' ', true); ?>
                        </div>
                        <article class="catui-content">
                            <?php $this->content('更多'); ?>
                        </article>
                    </div>
                    <?php endwhile; ?>
                </div><!-- .catui -->
                <?php $this->pageNav(); ?>
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