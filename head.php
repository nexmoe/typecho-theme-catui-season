<!DOCTYPE html>
<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<html>
    <head>
        <title><?php $this->archiveTitle(array( 'category' => _t('分类 %s 下的文章'), 'search' => _t('包含关键字 %s 的文章'), 'tag' => _t('标签 %s 下的文章'), 'author' => _t('%s 发布的文章') ), '', ' - '); ?><?php $this->options->title(); ?><?php if($this->is('index')): ?> - <?php $this->options->description() ?><?php endif; ?></title>
        <meta charset="<?php $this->options->charset(); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
        <meta name="renderer" content="webkit">
        <meta name="generator" content="Cat UI 之 四季的猫">
        <meta name="author" content="Nexmoe">
        <meta name="copyright" content="https://nexmoe.com/seasoncat.html">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <?php if ($this->is('post')) : ?>
        <meta property="og:type" content="article">
        <meta property="article:published_time" content="<?php $this->date('c'); ?>">
        <meta property="article:author" content="<?php $this->author(); ?>">
        <meta property="article:published_first" content="<?php $this->options->title() ?>, <?php $this->permalink() ?>">
        <meta property="og:title" content="<?php $this->title() ?>">
        <meta property="og:url" content="<?php $this->permalink() ?>">
        <?php endif; ?>
        <link rel="shortcut icon" href="/favicon.ico">
        <link rel="apple-touch-icon" href="<?php $this->options->logoUrl();?>">
        <link rel="stylesheet" href="https://cdnjs.loli.net/ajax/libs/mdui/0.4.2/css/mdui.css">
        <link rel="stylesheet" href="https://cdnjs.loli.net/ajax/libs/highlight.js/9.8.0/styles/monokai-sublime.min.css">
        <link rel="stylesheet" href="https://cdnjs.loli.net/ajax/libs/fancybox/3.4.1/jquery.fancybox.min.css">
        <link rel="stylesheet" href="https://cdnjs.loli.net/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
        <link rel="stylesheet" href="https://at.alicdn.com/t/font_957446_4fy8nut2joi.css">
        <link rel="stylesheet" href="<?php $this->options->themeUrl('app.main.css?v=18.1.5.1'); ?>">
        <?php $this->header('generator=&template=&pingback=&xmlrpc=&wlw=&commentReply=&rss1=&rss2=&atom='); ?>
        <style type="text/css">
            <?php $this->options->css(); ?>
        </style>
    </head>