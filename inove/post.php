<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

	<div class="post">
		<h2><?php $this->title() ?></h2>
		<div class="info">
			<span class="date"><?php $this->date('F jS, Y'); ?></span>
			<div class="fixed"></div>
		</div>
		<div class="content">
			<?php $this->content(); ?>
			<div class="fixed"></div>
		</div>
		<div class="under">
			<span class="categories"><?php _e('分类: '); ?></span><span><?php $this->category(','); ?></span>
			<span class="tags"><?php _e('标签：'); ?></span><span><?php $this->tags(', ', true, '无'); ?></span>
		</div>
	</div>
	<?php $this->need('comments.php'); ?>
</div>
<!-- main END -->

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
