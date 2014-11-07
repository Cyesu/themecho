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
	</div>
	<?php $this->need('comments.php'); ?>
</div>
<!-- main END -->

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
