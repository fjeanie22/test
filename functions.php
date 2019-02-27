<?php
/**
 * Child theme functions
 *
 * Functions file for child theme, enqueues parent and child stylesheets by default.
 *
 * @since   1.0.0
 * @package aa
 */
  
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
if ( ! function_exists( 'aa_enqueue_styles' ) ) {
    // Add enqueue function to the desired action.
    add_action( 'wp_enqueue_scripts', 'aa_enqueue_styles' );
     
    /**
     * Enqueue Styles.
     *
     * Enqueue parent style and child styles where parent are the dependency
     * for child styles so that parent styles always get enqueued first.
     *
     * @since 1.0.0
     */
    function aa_enqueue_styles() {
        // Parent style variable.
        $parent_style = 'parent-style';
         
        // Enqueue Parent theme's stylesheet.
        wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
         
        // Enqueue Child theme's stylesheet.
        // Setting 'parent-style' as a dependency will ensure that the child theme stylesheet loads after it.
        wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ) );
    }
}

add_action( 'init', 'create_post_type' );
function create_post_type() {
  register_post_type( 'acme_product',
    array(
      'labels' => array(
        'name' => __( 'Movie' ),
        'singular_name' => __( 'Movie' )
      ),
      'public' => true,
      'has_archive' => true,
      'menu_position' => 15,
      'supports' => array( 'title', 'editor', 'comments', 'thumbnail', 'custom-fields' ),
      'taxonomies' => array( 'post_tag', 'category'),
    )
  );
}



// хук для регистрации

function create_taxonomy_genre(){
	register_taxonomy('genre', array('acme_product'), array(
		'label'                 => '', 
		'labels'                => array(
			'name'              => 'Genre',
			'singular_name'     => 'Genre',
			'search_items'      => 'Search Genres',
			'all_items'         => 'All Genres',
			'view_item '        => 'View Genre',
			'parent_item'       => 'Parent Genre',
			'parent_item_colon' => 'Parent Genre:',
			'edit_item'         => 'Edit Genre',
			'update_item'       => 'Update Genre',
			'add_new_item'      => 'Add New Genre',
			'new_item_name'     => 'New Genre Name',
			'menu_name'         => 'Genre',
		),
		'description'           => '', 
		'public'                => true,
		'publicly_queryable'    => null, // равен аргументу public
		'show_in_nav_menus'     => true, // равен аргументу public
		'show_ui'               => true, // равен аргументу public
		'show_in_menu'          => true, // равен аргументу show_ui
		'show_tagcloud'         => true, // равен аргументу show_ui
		'show_in_rest'          => null, // добавить в REST API
		'rest_base'             => null, // $taxonomy
		'hierarchical'          => true,
		//'update_count_callback' => '_update_post_term_count',
		'rewrite'               => true,
		//'query_var'             => $taxonomy, // название параметра запроса
		'capabilities'          => array(),
		'meta_box_cb'           => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
		'show_admin_column'     => true, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
		'_builtin'              => false,
		'show_in_quick_edit'    => null, // по умолчанию значение show_ui
	) );
}
add_action( 'init', 'create_taxonomy_genre' );
register_taxonomy( $genre, $object_type, $args );


function create_taxonomy_country(){
	register_taxonomy('country', array('acme_product'), array(
		'label'                 => '', 
		'labels'                => array(
			'name'              => 'Country',
			'singular_name'     => 'Country',
			'search_items'      => 'Search Country',
			'all_items'         => 'All Country',
			'view_item '        => 'View Country',
			'parent_item'       => 'Parent Country',
			'parent_item_colon' => 'Parent Country:',
			'edit_item'         => 'Edit Country',
			'update_item'       => 'Update Country',
			'add_new_item'      => 'Add New Country',
			'new_item_name'     => 'New Country Name',
			'menu_name'         => 'Country',
		),
		'description'           => '', 
		'public'                => true,
		'publicly_queryable'    => null, // равен аргументу public
		'show_in_nav_menus'     => true, // равен аргументу public
		'show_ui'               => true, // равен аргументу public
		'show_in_menu'          => true, // равен аргументу show_ui
		'show_tagcloud'         => true, // равен аргументу show_ui
		'show_in_rest'          => null, // добавить в REST API
		'rest_base'             => null, // $taxonomy
		'hierarchical'          => true,
		//'update_count_callback' => '_update_post_term_count',
		'rewrite'               => true,
		//'query_var'             => $taxonomy, // название параметра запроса
		'capabilities'          => array(),
		'meta_box_cb'           => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
		'show_admin_column'     => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
		'_builtin'              => false,
		'show_in_quick_edit'    => null, // по умолчанию значение show_ui
	) );
}
add_action( 'init', 'create_taxonomy_country' );
register_taxonomy( $country, $object_type, $args );

function create_taxonomy_year(){
	register_taxonomy('year', array('acme_product'), array(
		'label'                 => '', 
		'labels'                => array(
			'name'              => 'Year',
			'singular_name'     => 'Year',
			'search_items'      => 'Search Year',
			'all_items'         => 'All Year',
			'view_item '        => 'View Year',
			'parent_item'       => 'Parent Year',
			'parent_item_colon' => 'Parent Year:',
			'edit_item'         => 'Edit Year',
			'update_item'       => 'Update Year',
			'add_new_item'      => 'Add New Year',
			'new_item_name'     => 'New Year Name',
			'menu_name'         => 'Year',
		),
		'description'           => '', 
		'public'                => true,
		'publicly_queryable'    => null, // равен аргументу public
		'show_in_nav_menus'     => true, // равен аргументу public
		'show_ui'               => true, // равен аргументу public
		'show_in_menu'          => true, // равен аргументу show_ui
		'show_tagcloud'         => true, // равен аргументу show_ui
		'show_in_rest'          => null, // добавить в REST API
		'rest_base'             => null, // $taxonomy
		'hierarchical'          => true,
		//'update_count_callback' => '_update_post_term_count',
		'rewrite'               => true,
		//'query_var'             => $taxonomy, // название параметра запроса
		'capabilities'          => array(),
		'meta_box_cb'           => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
		'show_admin_column'     => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
		'_builtin'              => false,
		'show_in_quick_edit'    => null, // по умолчанию значение show_ui
	) );
}
add_action( 'init', 'create_taxonomy_year' );
register_taxonomy( $year, $object_type, $args );

function create_taxonomy_actor(){
	register_taxonomy('actor', array('acme_product'), array(
		'label'                 => '', 
		'labels'                => array(
			'name'              => 'Actor',
			'singular_name'     => 'Actor',
			'search_items'      => 'Search Actor',
			'all_items'         => 'All Actor',
			'view_item '        => 'View Actor',
			'parent_item'       => 'Parent Actor',
			'parent_item_colon' => 'Parent Actor:',
			'edit_item'         => 'Edit Actor',
			'update_item'       => 'Update Actor',
			'add_new_item'      => 'Add New Actor',
			'new_item_name'     => 'New Actor Name',
			'menu_name'         => 'Actor',
		),
		'description'           => '', 
		'public'                => true,
		'publicly_queryable'    => null, // равен аргументу public
		'show_in_nav_menus'     => true, // равен аргументу public
		'show_ui'               => true, // равен аргументу public
		'show_in_menu'          => true, // равен аргументу show_ui
		'show_tagcloud'         => true, // равен аргументу show_ui
		'show_in_rest'          => null, // добавить в REST API
		'rest_base'             => null, // $taxonomy
		'hierarchical'          => true,
		//'update_count_callback' => '_update_post_term_count',
		'rewrite'               => true,
		//'query_var'             => $taxonomy, // название параметра запроса
		'capabilities'          => array(),
		'meta_box_cb'           => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
		'show_admin_column'     => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
		'_builtin'              => false,
		'show_in_quick_edit'    => null, // по умолчанию значение show_ui
	) );
}
add_action( 'init', 'create_taxonomy_actor' );
register_taxonomy( $actor, $object_type, $args );











add_action('add_meta_boxes', 'my_extra_fields', 1);

function my_extra_fields() {
	add_meta_box( 'extra_fields', 'Information', 'extra_fields_box_func', 'acme_product', 'normal', 'high'  );
}

function extra_fields_box_func( $post ){
	?>
	

	<p>Cost:
		<textarea type="text" name="extra[description]" style="width:50%;height:25px;"><?php echo get_post_meta($post->ID, 'description', 1); ?></textarea>
	</p>

	<p>Date:
			<select name="extra[select]">
			<?php $sel_v = get_post_meta($post->ID, 'select', 1); ?>
			<option value="0">----</option>
			<option value="2017" <?php selected( $sel_v, '2017' )?> >2017</option>
			<option value="2018" <?php selected( $sel_v, '2018' )?> >2018</option>
			<option value="2019" <?php selected( $sel_v, '2019' )?> >2019</option>
		</select> </p>

	<input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
	<?php
}

add_action( 'save_post', 'my_extra_fields_update', 0 );

## Сохраняем данные, при сохранении поста
function my_extra_fields_update( $post_id ){
	// базовая проверка
	if (
		   empty( $_POST['extra'] )
		|| ! wp_verify_nonce( $_POST['extra_fields_nonce'], __FILE__ )
		|| wp_is_post_autosave( $post_id )
		|| wp_is_post_revision( $post_id )
	)
		return false;

	// Все ОК! Теперь, нужно сохранить/удалить данные
	$_POST['extra'] = array_map( 'sanitize_text_field', $_POST['extra'] ); // чистим все данные от пробелов по краям
	foreach( $_POST['extra'] as $key => $value ){
		if( empty($value) ){
			delete_post_meta( $post_id, $key ); // удаляем поле если значение пустое
			continue;
		}

		update_post_meta( $post_id, $key, $value ); // add_post_meta() работает автоматически
	}

	return $post_id;
}

add_theme_support( 'post-thumbnails' );











function insertFoot($content) {
$terms = get_terms( 'genre', array(
    'orderby'    => 'count',
    'hide_empty' => 0
 ) );


// теперь выполняется запрос для каждого семейства 
foreach( $terms as $term ) {
 
    // Определение запроса
    $args = array(
        'post_type' => 'acme_product',
        'genre' => $term->slug,
    );
    $query = new WP_Query( $args );
             
    // вывод названий записей в тегах заголовков
     echo'<h5>' . $term->name . '</h5>';
     
    // вывод списком заголовков записей
    echo '<ul style="list-style-type:none">';
     
        // Начало цикла
        while ( $query->have_posts() ) : $query->the_post(); ?>
 
        <li class="alert alert-info" role="alert" id="post-<?php the_ID(); ?>">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </li>
         
        <?php endwhile;
     
    echo '</ul>';
     
    // используем сброс данных записи, чтобы восстановить оригинальный запрос
    wp_reset_postdata();
 
} 
}





function view_acme_func( $atts ){
	return insertFoot(); // никаких echo, только return
}
 
add_shortcode( 'acme', 'view_acme_func' );

function insertFilm($content) {
$posts = get_posts( array(
	'numberposts' => 5,
	'category'    => 0,
	'orderby'     => 'date',
	'order'       => 'DESC',
	'include'     => array(),
	'exclude'     => array(),
	'meta_key'    => '',
	'meta_value'  =>'',
	'post_type'   => 'post',
	'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
) );

foreach( $posts as $post ){
	setup_postdata($post);
    // формат вывода the_title() ...
}

wp_reset_postdata(); // сброс
}

function view_acme_films( $atts ){
	return insertFilm();
}
 
add_shortcode( 'acmefilm', 'view_acme_films' );
