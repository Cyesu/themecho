<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<script type="text/javascript" src="<?php $this->options->themeUrl('js/comment.js'); ?>"></script>

<?php
	$pintracks = $this->db->fetchAll($this->db->select('coid')
             ->from('table.comments')
             ->where('type != ?', 'comment')
             ->where('cid = ?', $this->cid)
             );
	$pintrackNum = count($pintracks);
?>

    <div id="comments">
    	<div id="cmtswitcher">
    		<?php if ($this->allow('ping')): ?>
    		<a id="commenttab" class="curtab" href="javascript:void(0);" onclick="MGJS.switchTab('thecomments,commentnavi', 'thetrackbacks', 'commenttab', 'curtab', 'trackbacktab', 'tab');"><?php $this->commentsNum(_t('评论 (0)'), _t('评论 (1)'), _t('评论 (%d)')); ?></a>
    		<a id="trackbacktab" class="tab" href="javascript:void(0);" onclick="MGJS.switchTab('thetrackbacks', 'thecomments,commentnavi', 'trackbacktab', 'curtab', 'commenttab', 'tab');"><?php _e('Trackback ('); ?><?php echo $pintrackNum; ?><?php _e(')');?></a>
    		<?php else : ?>
    		<a id="commenttab" class="curtab" href="javascript:void(0);"><?php $this->commentsNum(_t('评论 (0)'), _t('评论 (1)'), _t('评论 (%d)')); ?></a>
    		<?php endif; ?>

    		<?php if($this->allow('comment')): ?>
    		<span class="addcomment"><a href="#respond"><?php _e('发表评论'); ?></a></span>
    		<?php endif; ?>

    		<?php if ($this->allow('ping')): ?>
    		<span class="addtrackback"><a href="<?php $this->trackbackUrl(); ?>"><?php _e('Trackback'); ?></a></span>
    		<?php endif; ?>
    		<div class="fixed"></div>
    	</div>

        <?php $this->comments('comment')->to($comments); ?>
		<div id="commentlist">
			<!-- comments START -->
			<?php if ($comments->have()): ?>
			<ol id="thecomments">
				<?php while ($comments->next()): ?>
				<li class="comment<?php if($comments->authorId == $comments->ownerId): ?> admincomment<?php else: ?> regularcomment<?php endif; ?>" id="<?php $comments->theId(); ?>">
					<div class="author">
						<div class="pic">
							<?php $comments->gravatar('32', ''); ?>
						</div>
						<div class="name">
							<span id="commentauthor-<?php $comments->theId(); ?>"><?php $comments->author(''); ?></span>
						</div>
					</div>

					<div class="info">
						<div class="date">
							<?php $comments->date('Y年m月d日 H:i'); ?>
						</div>
						<div class="act">
							<a href="javascript:void(0);" onclick="MGJS_CMT.reply('commentauthor-<?php $comments->theId(); ?>', '<?php $comments->theId(); ?>', 'comment');"><?php _e('回复'); ?></a>
						</div>
						<div class="fixed"></div>
						<div class="content">
							<?php if ($comments->status == 'waiting'): ?>
								<p><small><?php _e('您的评论需要经过管理员审核通过后才会生效.'); ?></small></p>
							<?php endif; ?>

							<div id="commentbody-<?php $comments->theId(); ?>">
								<?php $comments->content(); ?>
							</div>
						</div>
					</div>
				</li>
				<div class="fixed"></div>
				<?php endwhile; ?>
			</ol>
			<!-- comments END -->

			    <?php if (Typecho_Widget::widget('Widget_Options')->commentsPageBreak): ?>
				<div id="commentnavi">
					<span class="pages"><?php _e('评论分页'); ?></span>
					<div id="commentpager">
						<?php $comments->pageNav('&laquo; 上一页', '下一页 &raquo;'); ?>
						<span id="cp_post_id"><?php $this->theId(); ?></span>
					</div>
					<div class="fixed"></div>
				</div>
			    <?php endif; ?>

			<?php else: ?>
			<ol id="thecomments">
				<li class="messagebox">
					<?php _e('本文目前尚无任何评论.'); ?>
				</li>
			</ol>
			<?php endif; ?>
		

		    <!-- trackbacks START -->
		    <?php if ($this->allow('ping')): ?>
			<?php $this->comments('pingback')->to($trackbacks); ?>
			<ol id="thetrackbacks">
				<?php if ($pintrackNum): ?>
				<?php while ($trackbacks->next()): ?>
				<li class="trackback">
					<div class="date">
						<?php $trackbacks->date('Y年m月d日 H:i'); ?>
					</div>
					<div class="fixed"></div>
					<div class="title">
						<a href="<?php $trackbacks->permalink(); ?>">
							<?php $trackbacks->author(''); ?>
						</a>
					</div>
				</li>
				<?php endwhile; ?>

				<?php else: ?>
				<li class="messagebox">
					<?php _e('本文目前尚无任何 trackbacks 和 pingbacks.'); ?>
				</li>
				<?php endif; ?>
			</ol>
			<?php endif; ?>
			<div class="fixed"></div>
			<!-- trackbacks END -->
		</div>
    </div>


<?php if (!$this->allow('comment')): // If comments are closed. ?>
	<div class="messagebox">
		<?php _e('评论已关闭'); ?>
	</div>

<?php else: ?>
<div id="<?php $this->respondId(); ?>">
	<div class="cancel-comment-reply">
	<?php $comments->cancelReply(); ?>
	</div>
	<form method="post" action="<?php $this->commentUrl(); ?>" id="commentform" role="form">
		<div id="respond">
			<?php if($this->user->hasLogin()): ?>
				<div class="row">
					<?php _e('登录身份: '); ?><a href="<?php $this->options->profileUrl(); ?>"><strong><?php $this->user->screenName(); ?></strong></a>.
					 <a href="<?php $this->options->logoutUrl(); ?>" title="登出"><?php _e('退出 &raquo;'); ?></a>
				</div>

			<?php else: ?>

				<div id="author_info">
					<div class="row">
						<input type="text" name="author" id="author" class="textfield" value="<?php $this->remember('author'); ?>" size="24" tabindex="1" required />
						<label for="author" class="small" class="required"><?php _e('昵称(必填)'); ?></label>
					</div>
					<div class="row">
						<input type="email" name="mail" id="email" class="textfield" value="<?php $this->remember('mail'); ?>" size="24" tabindex="2"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
						<label for="mail" class="small"<?php if ($this->options->commentsRequireMail): ?> class="required"<?php endif; ?>><?php _e('电子邮箱(我们会为您保密)'); ?><?php if ($this->options->commentsRequireMail): ?><?php _e('(必填)'); ?><?php endif; ?></label>
					</div>
					<div class="row">
						<input type="url" name="url" id="url" class="textfield" placeholder="<?php _e('http://'); ?>" value="<?php $this->remember('url'); ?>" size="24" tabindex="3"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
						<label for="url" class="small"<?php if ($this->options->commentsRequireURL): ?> class="required"<?php endif; ?>><?php _e('个人网站'); ?><?php if ($this->options->commentsRequireURL): ?><?php _e('(必填'); ?><?php endif; ?></label>
					</div>
				</div>

			<?php endif; ?>

			<!-- comment input -->
			<div class="row">
				<textarea name="text" class="comment" id="comment" tabindex="4" rows="8" cols="50" required><?php $this->remember('text'); ?></textarea>
			</div>

			<!-- comment submit and rss -->
			<div id="submitbox">
				<a class="feed" href="<?php $this->options->commentsFeedUrl(); ?>"><?php _e('订阅评论'); ?></a>
				<div class="submitbutton">
					<input name="submit" type="submit" id="submit" class="button" tabindex="5" value="<?php _e('提交评论'); ?>" />
				</div>
				<div class="fixed"></div>
			</div>
		</div>
	</form>
</div>
<script type="text/javascript">MGJS.loadCommentShortcut();</script>
<?php endif; ?>
