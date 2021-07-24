<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php if (!empty($this->options->Sider) && in_array('search', $this->options->Sider)): ?>
<section class="catui-item" id="sider-search">
    <div class="sider-content">
        <form class="search" method="post" action="./" role="search">
            <input type="search" placeholder="搜索╮(￣▽￣)╭" name="s" class="search-input" value="">
            <button type="submit" class="mdui-ripple mdui-btn"><i class="mdui-icon material-icons">search</i></button>
        </form>
        <div class="cat">
            <div class="cat-header">
                <div class="cat-ear-left mdui-ripple"></div>
                <div class="cat-ear-right mdui-ripple"></div>
            </div>
            <div class="cat-body">
            <a class="nexmoefont icon-dashboard mdui-ripple" href="<?php $this->options->adminUrl(); ?>" target="_blank" title="仪表盘" mdui-tooltip="{content: '仪表盘'}"></a>
            <?php if($this->user->hasLogin()):?>
            <?php if ($this->is('post')) : ?>
            <a class="nexmoefont icon-editor mdui-ripple" href="<?php $this->options->adminUrl(); ?>write-post.php?cid=<?php echo $this->cid;?>" target="_blank" title="编辑" mdui-tooltip="{content: '编辑'}"></a>
            <?php endif;?>
            <?php if ($this->is('page')) : ?>
            <a class="nexmoefont icon-editor mdui-ripple" href="<?php $this->options->adminUrl(); ?>write-page.php?cid=<?php echo $this->cid;?>" target="_blank" title="编辑" mdui-tooltip="{content: '编辑'}"></a>
            <?php endif;?>
            <?php endif;?>
            
            <a class="nexmoefont icon-sponsor mdui-ripple" onclick="get_sider_catui_item_fixed('support');" title="赞助" mdui-tooltip="{content: '赞助'}"></a>
            
            <?php if (!empty($this->options->Sider) && in_array('qrcode', $this->options->Sider)): ?>
            <a class="nexmoefont icon-qrcode mdui-ripple" onclick="get_sider_catui_item_fixed('qrcode');" title="二维码" mdui-tooltip="{content: '二维码'}"></a>
            <?php endif;?>
        
            <?php if (!empty($this->options->Sider) && in_array('tagscloud', $this->options->Sider)): ?>
            <a class="nexmoefont icon-tags mdui-ripple" onclick="get_sider_catui_item_fixed('tagscloud');" title="标签云" mdui-tooltip="{content: '标签云'}"></a>
            <?php endif;?>
        
            <?php if (!empty($this->options->Sider) && in_array('archive', $this->options->Sider)): ?>
            <a class="nexmoefont icon-archive mdui-ripple" onclick="get_sider_catui_item_fixed('archive');" title="文章归档" mdui-tooltip="{content: '文章归档'}"></a>
            <?php endif;?>
        
            <?php if (!empty($this->options->Sider) && in_array('comments', $this->options->Sider)): ?>
            <a class="nexmoefont icon-comments mdui-ripple" onclick="get_sider_catui_item_fixed('comments');" title="近期评论" mdui-tooltip="{content: '近期评论'}" href="#comments"></a>
            <?php endif;?>
            
            <a class="nexmoefont icon-rss mdui-ripple" href="<?php $this->options->siteUrl(); ?>feed" target="_blank" title="订阅" mdui-tooltip="{content: '订阅'}"></a>
            </div>
        </div>
    </div><!-- .sider-content -->
</section><!-- #sider-search -->
<?php endif;?>

<?php if (!empty($this->options->Sider) && in_array('comments', $this->options->Sider)): ?>
<section class="catui-item" id="sider-comments">
    <div class="sider-header">
        <div class="sider-title">近期评论</div>
        <div onclick="get_sider_catui_item_disappear('comments');" class="sider-close mdui-ripple"></div>
    </div>
    <div class="sider-content">
        <?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
        <?php while($comments->next()): ?>
        <a class="mdui-ripple" href="<?php $comments->permalink(); ?>" rel="nofollow"><span><?php $comments->author(false); ?></span>：
        <?php $url = Helper::options()->themeUrl;echo preg_replace('#\@\((.*?)\)#',"<img src='$url/newpaopao/$1.png' class='biaoqing'>",$comments->text); ?></a>
        <?php endwhile; ?>
    </div><!-- .sider-content -->
</section><!-- #sider-comments -->
<?php endif;?>

<?php if (!empty($this->options->Sider) && in_array('archive', $this->options->Sider)): ?>
<section class="catui-item" id="sider-archive">
    <div class="sider-header">
        <div class="sider-title">文章归档</div>
        <div onclick="get_sider_catui_item_disappear('archive');" class="sider-close mdui-ripple"></div>
    </div>
    <div class="sider-content">
        <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=Y 年 m 月')
            ->parse('<a class="mdui-ripple" href="{permalink}">{date}<span>{count}</span></a>'); ?>
    </div><!-- .sider-content -->
</section><!-- #sider-archive -->
<?php endif;?>

<?php if (!empty($this->options->Sider) && in_array('qrcode', $this->options->Sider)): ?>
<section class="catui-item" id="sider-qrcode">
    <div class="sider-header">
        <div class="sider-title">二维码</div>
        <div onclick="get_sider_catui_item_disappear('qrcode');" class="sider-close mdui-ripple"></div>
    </div><!-- .sider-header -->
    <div class="sider-content">
        <img src="https://api.imjad.cn/qrcode/?text=<?php
        if ($this->is('post') || $this->is('page')) :
            $this->permalink();
        else:
            $this->options->siteUrl(); 
        endif;
        ?>&size=300">
    </div><!-- .sider-content -->
</section><!-- #sider-qrcode -->
<?php endif;?>

<?php if (!empty($this->options->Sider) && in_array('tagscloud', $this->options->Sider)): ?>
<section class="catui-item" id="sider-tagscloud">
    <div class="sider-header">
        <div class="sider-title">标签云</div>
        <div onclick="get_sider_catui_item_disappear('tagscloud');" class="sider-close mdui-ripple"></div>
    </div><!-- .sider-header -->
    <div class="sider-content">
        <?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=mid&ignoreZeroCount=1&desc=0&limit=30')->to($tags); ?>
        <?php if($tags->have()): ?>
        <?php while ($tags->next()): ?>
        <a href="<?php $tags->permalink(); ?>" rel="tag" class="size-<?php $tags->split(5, 10, 20, 30); ?>" title="<?php $tags->count(); ?> 个话题"><?php $tags->name(); ?></a>
        <?php endwhile; ?>
        <?php else: ?>
        <a><?php _e('没有任何标签'); ?></a>
        <?php endif; ?>
    </div><!-- .sider-content -->
</section><!-- #sider-tagscloud -->
<?php endif;?>

<section class="catui-item disappear" id="sider-support">
    <div class="sider-header">
        <div class="sider-title">赞助二维码</div>
        <div onclick="get_sider_catui_item_disappear('support');" class="sider-close mdui-ripple"></div>
    </div><!-- .sider-header -->
    <div class="sider-content">
        
        <?php if (!empty($this->options->supportzfb)): ?>
        <h2>支付宝</h2>
        <img src="<?php $this->options->supportzfb(); ?>">
        <?php endif;?>
        
        <?php if (!empty($this->options->supportqq)): ?>
        <h2>QQ支付</h2>
        <img src="<?php $this->options->supportqq(); ?>">
        <?php endif;?>
        
        <?php if (!empty($this->options->supportwx)): ?>
        <h2>微信支付</h2>
        <img src="<?php $this->options->supportwx(); ?>">
        <?php endif;?>
        
    </div><!-- .sider-content -->
</section><!-- #sider-support -->

<section class="catui-item disappear" id="sider-OwO">
    <div class="sider-header">
        <div class="sider-title">评论表情</div>
        <div onclick="get_sider_catui_item_disappear('OwO');" class="sider-close mdui-ripple"></div>
    </div><!-- .sider-header -->
    <div class="sider-content">
        <div class="comment-OwO-body" id="OwO">
            <?php get_biaoqing_info("run"); ?>
        </div><!-- .comment-OwO-body -->
    </div><!-- .sider-content -->
</section><!-- #sider-OwO -->

<section class="catui-item" id="sider-copyright">
    <div class="sider-content">
        &copy; <?php echo date("Y"); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php echo $this->options->title(); ?></a> Theme By <a href="https://nexmoe.com/seasoncat.html" target="_blank">CatUI</a>
    </div><!-- .sider-content -->
</section><!-- #sider-copyright -->