<?php get_header() ?>
  <div class="section_wrapper mcb-section-inner conteudo-artigo-interno">

    <div class="content-ieptb conteudo-paginas">
      <?php
        if (have_posts()):
          while(have_posts()): the_post();
      ?>
          <div style="text-align: center;">
             <?php the_post_thumbnail( 'high', array( 'class' => 'scale-with-grid' ) ); ?>
          </div>
            <h3><?php the_title() ?></h3>
            <?php the_content() ?>
      <?php
          endwhile;
        endif;
      ?>
      <a href="<?php echo esc_url( home_url( 'artigos-ieptb-mg' ) ); ?>"> 
        <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Voltar 
      </a>
    </div>
    <div class="content-ieptb barra-lateral-artigos">
      <?php
        $argLateral = array(
          'post_type'       => 'artigo',
          'posts_per_page'  => 20,
        );
        $artigosLateral = new WP_Query($argLateral);
      ?>
      <ul>
        <?php if($artigosLateral->have_posts()): ?>
          <?php while($artigosLateral->have_posts()): $artigosLateral->the_post() ?>
            <li>
              <a href=" <?php the_permalink() ?> ">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> <?php the_title() ?> 
              </a>
            </li>
          <?php endwhile; ?>
        <?php endif; ?>
      </ul>
    </div>
    <div class="clearcontent"></div>
  </div>
<?php get_footer() ?>
