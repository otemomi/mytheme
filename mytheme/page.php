<?php get_header(); ?>

<main>
	<div id="contents">
		<div id="main">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<h2 class="pagetitle"><?php the_title(); ?></h2>
			<?php the_content(); ?>

				<?php endwhile; else : ?>
					<h2>お探しのページはありません。</h2>
					<p>大変申し訳ありません。お探しのページは見つかりませんでした。<br>
					URLに間違いがないか確認してください。</p>
				<?php endif; ?>
		</div>
	</div>

<?php get_template_part( 'sidebar-page' ); ?>
</main>

<?php get_footer(); ?>
