<?php /* template name: Menus principais */ ?>
<?php get_header() ?>
  <div class="section_wrapper mcb-section-inner">
    <div class="column mcb-column one column_tabs conteudo-interno">
      <div class="content-ieptb sidebar-menupaginas">
        <?php
        $id = get_the_id();
        $titulo_corrente = get_the_title();
        $pagina_anterior = get_post_ancestors($id);

        if(!empty($pagina_anterior)){
          $idPagina = $pagina_anterior[0];
        } else {
          $idPagina = $id;
        }

        $arg = array(
          'post_type'       => 'page',
          'posts_per_page'  => 20,
          'orderby'         => 'menu_order',
          'order'           => 'ASC',
          'post_parent'     => $idPagina
        );

        $menu_lateral = new wp_query($arg);
        if($menu_lateral->have_posts()):
          echo "<ul>";
            while($menu_lateral->have_posts()): $menu_lateral->the_post();
              $titulo_menu = get_the_title();
              if ($titulo_corrente == $titulo_menu) {
                $activate = "activate";
              } else {
                $activate = "";
              }
              echo "<li class='$activate'>";
              ?>
                <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
              <?php
              echo "</li>";
            endwhile;
          echo "</ul>";
        else:
          echo "Nenhuma pagina encontrada";
        endif;
        ?>
      </div>
      <div class="content-ieptb conteudo-paginas">
        <?php if (have_posts()): ?>
          <?php while(have_posts()): the_post(); ?>
            <?php the_content() ?>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
      <div class="clearcontent"></div>
    </div>
  </div>
<?php get_footer(); ?>
