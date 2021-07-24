<?php 
/**
 * 日记
 * 
 * @package custom 
 * 
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
            <div class="catui-primary detail diary<?php if($this->user->hasLogin()){ echo ' haslogin';}?>">
                <div id="comments" class="diary catui-item">
                    <?php $this->need('comments.php'); ?>
                </div><!-- #comments -->
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