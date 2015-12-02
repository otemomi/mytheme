<?php
// ショートコード
function shortcode_url() {
	return get_bloginfo('url');
}
add_shortcode('url', 'shortcode_url');

function shortcode_tp() {
	return get_template_directory_uri();
}
add_shortcode('template', 'shortcode_tp');

//検索ページのタイトル修正
function search_wp_title( $title ) {
	if ( is_search() ) {
		$title = ' 「' . get_search_query() . '」の検索結果 :: ';
	}
	return $title;
}
add_filter( 'wp_title', 'search_wp_title' );

// アイキャッチ
add_theme_support( 'post-thumbnails' ); // 有効化
add_image_size( 'topimg', 456, 9999 ); // w456px h330px

//コメント
function custom_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
			<div id="comment-<?php comment_ID(); ?>" class="comment-body">
				<?php echo get_avatar( $comment, 48 ); ?>
				<?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>
				<?php if ($comment->comment_approved == '0') : ?>
				<p class="wait">*このコメントはただいま承認待ちです*</p>
		<?php endif; ?>

		<div class="comment-meta">
			<?php printf(__('%1$s'), get_comment_date() . ' ' . get_comment_time()) ?><?php edit_comment_link(__('(Edit)'),'  ','') ?>
		</div>

			<?php comment_text() ?>

		<div class="reply">
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</div>
		</div>
<?php
}

// 字数を140文字に指定する
function my_excerpt_mblength($length) {
    return 140;
}
add_filter('excerpt_mblength', 'my_excerpt_mblength');

// 本文からの抜粋末尾の文字列を指定する
function my_auto_excerpt_more($more) {
    return '・・・・・・';
}
add_filter('excerpt_more', 'my_auto_excerpt_more');

// 抜粋末尾に個別投稿ページへのリンクを追加する
function my_custom_excerpt_more($excerpt) {
    return $excerpt . '<p><a href="' . get_permalink($post->ID) . '"> &gt;&gt; 記事を表示する</a></p>';
}
add_filter('get_the_excerpt', 'my_custom_excerpt_more');

// 表示件数制御
function my_post_queries( $query ) {
	if ( is_admin() || ! $query->is_main_query() )
		return;

	// ホームとカテゴリーアーカイブで表示件数を３件に設定
	if ( is_tag() ) {
		$query->set('posts_per_page', 5);
	return;
	}

	if ( is_category() ) {
		$query->set('posts_per_page', 5);
	return;
	}

	if ( is_search() ) {
		$query->set('posts_per_page', 5);
	return;
	}
}
add_action( 'pre_get_posts', 'my_post_queries' );

//検索結果から固定ページを除外
function SearchFilter($query) {
	if ( !is_admin() && $query->is_main_query() && $query->is_search() ) {
		$query->set( 'post_type', 'post' );
	}
}

add_action( 'pre_get_posts','SearchFilter' );

// 全角スペースで検索語句を区切る
if(isset($_GET['s'])) $_GET['s']=mb_convert_kana($_GET['s'],'s','UTF-8');

//検索語句をハイライト
function wps_highlight_results($text){
     if(is_search()){
     $sr = get_query_var('s');
     $keys = explode(" ",$sr);
     $text = preg_replace('/('.implode('|', $keys) .')/iu', '<span class="searchEx">'.$sr.'</span>', $text);
     }
     return $text;
}
add_filter('the_title', 'wps_highlight_results');
add_filter('the_excerpt', 'wps_highlight_results');

//カテゴリーの数を<a>タグに含める
add_filter( 'wp_list_categories', 'my_list_categories', 10, 2 );
function my_list_categories( $output, $args ) {
	$output = preg_replace('/<\/a>\s*\((\d+)\)/',' <span>$1</span></a>',$output);
	return $output;
}

//絵文字無効
function disable_emoji() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
add_action( 'init', 'disable_emoji' );
?>