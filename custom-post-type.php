<?php
/* ----------------------------------------------------- */
/* Post Types */
/* ----------------------------------------------------- */
/* Criando um Post Type Personalizado */
add_action('init', 'artigos_register');
function artigos_register() {
	 $labels = array(
			'name' => 'Artigos',
			'singular_name' => 'Artigo',
			'all_items' => 'Todos Artigos',
			'add_new' => 'Adicionar Artigo',
			'add_new_item' => 'Adicionar Artigo',
			'edit_item' => 'Editar Artigo',
			'new_item' => 'Novo Artigo',
			'view_item' => 'Ver Artigo',
			'search_items' => 'Procurar Artigo',
			'not_found' =>  'Nada encontrado',
			'not_found_in_trash' => 'Nada encontrado no lixo',
			'parent_item_colon' => '',
			'menu_icon'   => 'teste',
	);
	$args = array(
 			'menu_icon' => 'dashicons-portfolio',
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'capability_type' => 'post',
			'hierarchical' => true,
			'has_archive' => true,
			'taxonomy' => array('categoria-artigo'),
			'menu_position' => 6,
			'supports' => array('title','editor','comments','thumbnail','category','gallery','page-attributes'),
			'rewrite' => array('slug' => 'artigo')
	  );
	register_post_type('artigo',$args);
}

/* ----------------------------------------------------- */
/* Taxonomias */
/* ----------------------------------------------------- */
/* Criando uma Taxonomia Personalizada */
register_taxonomy("categoria-artigo", array("artigo"),
	array(
		"hierarchical" => true,
		"label" => "categoria",
		"singular_label" => "categoria Artigos",
		'rewrite' => array( 'slug' => 'categoria-artigo' )
	)
);
