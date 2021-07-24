<?php if($this->user->uid==$this->author->uid && $this->user->hasLogin()): ?>
<section>
<h3><?php _e('个人资料'); ?></h3>
<ul><li>
<label class="typecho-label" for="screenName-0-1">
用户名</label><?php $this->user->name() ?></li></ul>
<?php Typecho_Widget::widget('Widget_Users_Profile')->profileForm()->render(); ?>
</sction>
<section id="change-password">
<h3><?php _e('密码修改'); ?></h3>
<?php Typecho_Widget::widget('Widget_Users_Profile')->passwordForm()->render(); ?>
</sction>
<?php Typecho_Widget::widget('Widget_Users_Profile')->personalFormList(); ?>
<?php endif; ?>