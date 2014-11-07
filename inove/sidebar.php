<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!-- sidebar START -->
<div id="sidebar">

<!-- sidebar north START -->
<div id="northsidebar" class="sidebar">

	<!-- feeds -->
	<div class="widget widget_feeds">
		<div class="content">
			<div id="subscribe">
				<a rel="external nofollow" id="feedrss" title="<?php _e('订阅这个博客的文章'); ?>" href="<?php $this->options->feedUrl(); ?>"><?php _e('订阅'); ?></a>
			</div>
			<div class="fixed"></div>
		</div>
	</div>

	<!-- recent posts -->
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
	<div class="widget">
		<h3><?php _e('近期文章'); ?></h3>
		<ul>
			<?php $this->widget('Widget_Contents_Post_Recent')
            ->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
		</ul>
	</div>
	<?php endif; ?>

	<!-- recent comments -->
	<?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
	<div class="widget">
		<h3><?php _e('近期回复'); ?></h3>
		<ul>
			<?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
        	<?php while($comments->next()): ?>
			<li><a href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?></a>: <?php $comments->excerpt(35, '...'); ?></li>
			<?php endwhile; ?>
		</ul>
	</div>
	<?php endif; ?>

</div>
<!-- sidebar north END -->

<!-- sidebar center START -->
<div id="centersidebar" class="sidebar">

	<!-- sidebar east START -->
	<div id="eastsidebar" class="sidebar">
		<?php if (!empty($this->options->sidebarBlock) && in_array('ShowTagCloud', $this->options->sidebarBlock)): ?>
		<!-- tag cloud -->
		<div id="tag_cloud" class="widget">
			<h3><?php _e('标签'); ?></h3>
			<ul>
			<?php $this->widget('Widget_Metas_Tag_Cloud', 'limit=6')->to($tags); ?>
			<?php while ($tags->next()): ?>
			<li><a rel="tag" href="<?php $tags->permalink();?>"><?php $tags->name(); ?></a></li>
			<?php endwhile; ?>
		</ul>
		</div>
		<?php endif; ?>
	</div>
	<!-- sidebar east END -->

	<!-- sidebar west START -->
	<div id="westsidebar" class="sidebar">
		<?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)): ?>
		<!-- categories -->
		<div class="widget widget_categories">
			<h3><?php _e('分类'); ?></h3>
			<ul>
				<?php $this->widget('Widget_Metas_Category_List')
            ->parse('<li><a rel="category" href="{permalink}">{name}</a></li>'); ?>
			</ul>
		</div>
		<?php endif; ?>
	</div>
	<!-- sidebar west END -->
	<div class="fixed"></div>
</div>
<!-- sidebar center END -->

<!-- sidebar south START -->
<div id="southsidebar" class="sidebar">

	<!-- archives -->
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowArchive', $this->options->sidebarBlock)): ?>
	<div class="widget">
		<h3><?php _e('文章归档'); ?></h3>
		<ul>
			<?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')
            ->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
		</ul>
	</div>
	<?php endif; ?>

	<!-- meta -->
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowOther', $this->options->sidebarBlock)): ?>
	<div class="widget">
		<h3><?php _e('其它'); ?></h3>
		<ul>
			<?php if($this->user->hasLogin()): ?>
				<li class="last"><a href="<?php $this->options->adminUrl(); ?>"><?php _e('进入后台'); ?> (<?php $this->user->screenName(); ?>)</a></li>
                <li><a href="<?php $this->options->logoutUrl(); ?>"><?php _e('退出'); ?></a></li>
            <?php else: ?>
                <li class="last"><a href="<?php $this->options->adminUrl('login.php'); ?>"><?php _e('登录'); ?></a></li>
            <?php endif; ?>
            <li><a href="<?php $this->options->feedUrl(); ?>"><?php _e('文章 RSS'); ?></a></li>
            <li><a href="<?php $this->options->commentsFeedUrl(); ?>"><?php _e('评论 RSS'); ?></a></li>
            <li><a href="http://www.typecho.org">Typecho</a></li>
		</ul>
	</div>
	<?php endif; ?>

</div>
<!-- sidebar south END -->

</div>
<!-- sidebar END -->
