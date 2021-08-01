<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;$this->footer(); ?>
<script src="https://cdnjs.loli.net/ajax/libs/highlight.js/9.9.0/highlight.min.js"></script>
<script>$('pre code').each(function(i, block) {hljs.highlightBlock(block);});</script>
<script src="https://cdnjs.loli.net/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.loli.net/ajax/libs//mdui/0.4.2/js/mdui.min.js"></script>
<script src="https://cdnjs.loli.net/ajax/libs/fancybox/3.4.1/jquery.fancybox.min.js"></script>
<?php if (!empty($this->options->OtherTool) && in_array('smoothscroll', $this->options->OtherTool) && get_useragent_info ($_SERVER['HTTP_USER_AGENT'],'os')!="Mac OS X"): ?>
<script src="https://cdnjs.loli.net/ajax/libs/smoothscroll/1.4.6/SmoothScroll.min.js"></script>
<?php endif;?>
<?php $this->options->tongji();echo "\n"; ?>
<script src="https://cdnjs.loli.net/ajax/libs/instantclick/3.0.1/instantclick.js"></script>
<script data-no-instant>InstantClick.init();</script>
<script src="<?php $this->options->themeUrl('app.js?v=21.8.1.1'); ?>"></script>