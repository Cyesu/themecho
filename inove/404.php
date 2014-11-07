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
<!-- for 404 -->
<link rel="stylesheet" href="<?php $this->options->themeUrl('css/404.css'); ?>"/>
<!--[if IE]>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/ie.css'); ?>"/>
<![endif]-->
<!-- style END -->
</head>

<body>

<div id="container">
	<div id="talker">
		<a href="<?php $this->options->siteUrl(); ?>"><img src="<?php $this->options->themeUrl('img/lovelace.gif'); ?>" alt="<?php _e('咸湿佬'); ?>" /></a>
	</div>
	<div id="notice">
		<h1><?php _e('欢迎来到 404 页面'); ?></h1>
		<p><?php _e('欢迎您的到来. 您会到达这个页面证明您刚刚点击了失效的链接. 当然, 也可能是我们搞错了... 但与其向您展示一个混乱的, 没有任何说明的 404 出错页面, 我们创建这个页面可以向您解释究竟出了些什么问题.'); ?></p>
		<p><?php _e('您现在可以 (a) 点击浏览器上的 "返回" 按钮并尝试通过其他方式进入我们的页面, 或者 (b) 点击下方的链接转跳到网站的首页.'); ?></p>
		<div class="back">
			<a href="<?php $this->options->siteUrl(); ?>"><?php _e('回到博客首页 &raquo;'); ?></a>
		</div>
		<div class="fixed"></div>
	</div>
	<div class="fixed"></div>
</div>

</body>
</html>
