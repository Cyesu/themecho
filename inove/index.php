<?php
/**
 * iNove theme inspired by MacZone.sk. created by <a href="http://www.neoease.com/">mg12</a>.
 * It's a popular theme and have exceeded more than 500,000 downloads in WordPress Theme Channel
 * 
 * @package inove for Typecho
 * @author Hanabi
 * @version 1.0.0
 * @link http://hanabi.sinaapp.com
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
	$this->need('header.php');
?>

<?php while ($this->next()): ?>
	<div class="post">
		<h2><a class="title" href="<?php $this->permalink(); ?>" rel="bookmark"><?php $this->title(); ?></a></h2>
		<div class="info">
			<span class="date"><?php $this->date('F jS, Y'); ?></span>
			<span class="author"><a href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></span>
			<div class="fixed"></div>
		</div>
		<div class="content">
			<?php $this->content('阅读全文…'); ?>
			<div class="fixed"></div>
		</div>
		<div class="under">
			<span class="categories"><?php _e('分类: '); ?></span><span><?php $this->category(','); ?></span>
			<span class="tags"><?php _e('标签：'); ?></span><span><?php $this->tags(', ', true, '无'); ?></span>
		</div>
	</div>
<?php endwhile; ?>

		<div id="pagenavi">
			<span class="newer"><?php $this->pageLink('上一页','prev'); ?></span>
			<span class="older"><?php $this->pageLink('下一页','next'); ?></span>
			<div class="fixed"></div>
		</div>
</div>
<!-- main END -->

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
