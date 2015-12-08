<?php get_header(); ?>

<main>
	<div id="contents">
		<div id="main" class="container">
			<h2 class="archiveH">
				<?php
					if (is_category()) {
						single_cat_title();
					} elseif (is_tag()) {
						single_tag_title();
					} elseif (is_tax()) {
						single_term_title();
					} elseif (is_day()) {
						echo "日別アーカイブ：" . get_the_time('Y年m月d日');
					} elseif (is_month()) {
						echo "月別アーカイブ：" . get_the_time('Y年m月');
					} elseif (is_year()) {
						echo "年別アーカイブ：" . get_the_time('Y年');
					} elseif (is_author()) {
						echo "投稿者アーカイブ：" . esc_html(get_queried_object()->display_name);
					} else {
						echo "ブログアーカイブ";
					}
				?>
			</h2>

		<?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
			<h3 class="line catabs"><?php the_date(); ?> : <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<p class="archiveImg"><?php the_post_thumbnail( array( 230, 166 ) ); ?></p>
			<?php the_excerpt(); ?>

		<?php endwhile; ?>
			<?php wp_pagenavi(); ?>

		<?php else : ?>
		<?php endif; ?>
		</div>
	</div>

<?php get_template_part( 'sidebar-page' ); ?>
</main>

<?php get_footer(); ?>