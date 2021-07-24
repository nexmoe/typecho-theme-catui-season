<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="catui-container">
<div class="header">
    <div class="header-canopy catui-item">
        <div class="header-cover" style="background-image: url(<?php
        if ($this->is('post') || $this->is('page')) :
           get_post_cover($this->fields->Cover);
        else:
            $this->options->background();
        endif;
        ?>);"></div>
        <div class="header-cover-bk"></div>
        <div class="header-menu">
            
                <div class="header-menu-title"><?php echo $this->options->title(); ?></div>
                <div class="header-menu-avatar">
                    <a href="<?php $this->options->siteUrl(); ?>"><img src="<?php $this->options->logoUrl();?>"></a>
                </div>
                <div class="header-menu-content" id="menu-nav">
                    
                    <div class="mdui-tab mdui-tab-centered">
                        
                        <?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
                        <?php while($category->next()): ?>
                            <a<?php if($this->category == $category->slug && !$this->is('index')): ?> class="mdui-tab-active"<?php endif; ?> href="<?php $category->permalink(); ?>" title="<?php $category->name(); ?>"><?php $category->name(); ?></a>
                        <?php endwhile; ?>

                        <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                        <?php while($pages->next()): ?>
                        <a  class="mdui-ripple<?php if($this->is('page', $pages->slug)): ?> mdui-tab-active<?php endif; ?>" href="<?php $pages->permalink(); ?>"  title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
                        <?php endwhile; ?>
                    </div>
                    
                </div>
            
        </div>
    </div>
    <button class="mdui-fab mdui-fab-hide mdui-ripple mdui-fab-fixed" onclick="get_to_top();"><i class="mdui-icon material-icons"></i></button>
</div>
</div>