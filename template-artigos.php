<?php /* template name: Pagina artigos */ ?>
<?php get_header() ?>
  <div class="section_wrapper mcb-section-inner conteudo-interno">
    <div class="section_wrapper mcb-section-inner" style=" border-bottom:#00a4e3 solid 3px; margin-bottom:30px; padding:0 15px 15px;">
      <h3 class="icon-doc-line" style="color: #00a4e3; float: left; margin-bottom: 5px;">
        <?php the_title(); ?>
      </h3>
    </div>
      <div class="" style="clear:both"></div>
	<?php
		$args = array(
			'post_type' 		=> 'artigo',
			'posts_per_page'	=> 20,
		);

		$artigos_view = new WP_Query($args);

		if($artigos_view->have_posts()):
			while ($artigos_view->have_posts()): $artigos_view->the_post();
		?>
    	<div class="column mcb-column one-third column_photo_box ">
				<div class="photo_box  pb_left">
					<div class="image_frame">
						<div class="image_wrapper">
							<div class="mask mask-artigos" onclick="location.href='<?php the_permalink(); ?>' "></div>
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( 'high', array( 'class' => 'scale-with-grid' ) ); ?>
							</a>
						</div>
					</div>
					<div class="desc">
						<h5><?php the_title(); ?></h5>
						<div class="artigos">
							<?php the_excerpt( ); ?>
						</div>
						<div class="saibamaisartigos">
							<a class="icon-plus-circled" href="<?php the_permalink(); ?>" style="color:#1a066f;">
								Saiba mais
							</a>
						</div>
					</div>
				</div>
			</div>
		<?php
			endwhile;
		endif;
	?>
  </div>
 <?php get_footer( ); ?>
