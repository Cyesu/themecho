<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="content-type" content="text/html; charset=<?php $this->options->charset(); ?>" />
<title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
<meta name="robots" content="all"/>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7"/>
<meta http-equiv="Cache-Control" content="no-transform"/>
<meta name="renderer" content="webkit|ie-stand|ie-comp"/>
<?php $this->header('generator=&template='); ?>
<!-- style START -->
<!-- default style -->
<link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>"/>
<!-- for translations -->
<link rel="stylesheet" href="<?php $this->options->themeUrl('css/chinese.css'); ?>"/>
<!--[if IE]>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/ie.css'); ?>"/>
<![endif]-->
<!-- style END -->
<!-- script START -->
<script type="text/javascript" src="<?php $this->options->themeUrl('js/base.js'); ?>"></script>
<script type="text/javascript" src="<?php $this->options->themeUrl('js/menu.js'); ?>"></script>
<!-- script END -->
</head>

<body>
<!-- wrap START -->
<div id="wrap">

    <!-- container START -->
    <div id="container">

        <!-- header START -->
        <div id="header">

            <!-- banner START -->
            <!-- banner END -->

            <div id="caption">
                <h1 id="title"><a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a></h1>
                <div id="tagline"><?php $this->options->description(); ?></div>
            </div>

            <div class="fixed"></div>
        </div>
        <!-- header END -->

        <!-- navigation START -->
        <div id="navigation">

            <!-- menus START -->
            <ul id="menus">
                <li <?php if($this->is('index')): ?> class="current"<?php endif; ?>><a class="home" title="<?php _e('首页'); ?>" href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a></li>
                <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                <?php while($pages->next()): ?>
                <li <?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?>><a title="<?php $pages->title(); ?>" href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a></li>
                <?php endwhile; ?>
                <li><a class="lastmenu" href="javascript:void(0);"></a></li>
            </ul>
            <!-- menus END -->

            <!-- searchbox START -->
            <div id="searchbox">
                <form action="./" method="post">
                    <div class="content">
                        <input type="text" class="textfield" name="s" size="24" value="" />
                        <input type="submit" class="button" value="" />
                    </div>
                </form>
            </div>
            <script type="text/javascript">
            //<![CDATA[
                var searchbox = MGJS.$("searchbox");
                var searchtxt = MGJS.getElementsByClassName("textfield", "input", searchbox)[0];
                var searchbtn = MGJS.getElementsByClassName("button", "input", searchbox)[0];
                var tiptext = "<?php _e('请输入关键字...'); ?>";
                if(searchtxt.value == "" || searchtxt.value == tiptext) {
                    searchtxt.className += " searchtip";
                    searchtxt.value = tiptext;
                }
                searchtxt.onfocus = function(e) {
                    if(searchtxt.value == tiptext) {
                        searchtxt.value = "";
                        searchtxt.className = searchtxt.className.replace(" searchtip", "");
                    }
                }
                searchtxt.onblur = function(e) {
                    if(searchtxt.value == "") {
                        searchtxt.className += " searchtip";
                        searchtxt.value = tiptext;
                    }
                }
                searchbtn.onclick = function(e) {
                    if(searchtxt.value == "" || searchtxt.value == tiptext) {
                        return false;
                    }
                }
            //]]>
            </script>
            <!-- searchbox END -->

            <div class="fixed"></div>
        </div>
        <!-- navigation END -->

<!-- content START -->
<div id="content">

    <!-- main START -->
    <div id="main">
