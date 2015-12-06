<?php if(have_comments()):?>
<ol class = "commentsList">
<?php wp_list_comments('callback=custom_comment');?>
</ol>
<?php endif;?>

<?php comment_form(); ?>

<?php if(pings_open()): ?>
	<h3 id="trback">
		Track Back URL</h3>
		<p><input class="u-full-width" type="text" name="textbox" onclick="this.focus();this.select();" value="<?php trackback_url(); ?>"></p>
<?php endif; ?>
