<?php
  function noticia_home()
  {
  ?>
  <!-- Latest compiled and minified CSS -->
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->

  <style media="screen">
    .img-principal{
        height: 420px;
        overflow: hidden;
    }

    .img-principal img{
      width: 100%;
      height: 100%;
    }

    .noticia-linha{
      margin: 0 0 10px;
      padding: 0 0 10px;
      border-bottom: #c3c3c3 solid 1px;
    }

    .noticia-linha:last-child{
      border-bottom: transparent solid 1px !important;
    }

    .noticia-linha h4{
      margin:0px;
    }

    .noticia-left{
      float: left;
      margin-right: 15px;
    }
  </style>
  <?php
    $arg = array(
      'post_type' => 'post',
      'posts_per_page' => 1
    );

    $post_principal = new wp_query($arg);
    echo "<div class='mp-row'>";
    if($post_principal->have_posts()):
        while($post_principal->have_posts()): $post_principal->the_post();
          $idPostPrincipal = get_the_id();
          echo '<div class="mp-span7">';
            if (has_post_thumbnail()): ?>
            <div class="img-principal">
              <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'high', array( 'class' => 'img-responsive' ) ); ?>
              </a>
            </div>
          <?php
            endif;
            echo "<h4>";
              the_title();
            echo "</h4>";
            echo "<p>";
              the_excerpt();
            echo "</p>"
            ?>
            <a class="button  button_right button_large button_js kill_the_icon"
            href="<?php the_permalink() ?>"  style=" background-color:#00a4e3 !important; color:#fff;float: right;">
            <span class="button_icon">
              <i class="icon-forward" style=" color:#fff !important;"></i>
            </span>
            <span class="button_label"><b>Leia Mais</b></span>
            </a>
            <?php
          echo "</div>";
        endwhile;
    endif;
      echo "<div class='mp-span5'>";
        $arg2 = array(
          'post_type' => 'post',
          'posts_per_page' => 4
        );

        $noticias_lateral = new wp_query($arg2);
        if ($noticias_lateral->have_posts()):
          while($noticias_lateral->have_posts()): $noticias_lateral->the_post();
            $postsLateral = get_the_id();
            if ($idPostPrincipal != $postsLateral) {
              echo "<div class='row noticia-linha'>";
                echo "<div class='col-md-4 noticia-left'>";
                  if (has_post_thumbnail()): ?>
                      <div class="img">
                        <a href="<?php the_permalink(); ?>">
                          <?php the_post_thumbnail( 'thumbnail', array( 'class' => 'img-responsive' ) ); ?>
                        </a>
                      </div>
                    <?php
                  endif;
                echo "</div>";
                echo "<div class='col-md-8'>";
                  echo "<h4>";
                    the_title();
                  echo "</h4>";
                  echo "<p>";
                    the_excerpt();
                  echo "</p>";
                  ?>
                  <div class="" style="text-align:right">
                    <a href="<?php the_permalink() ?>"> Leia Mais + </a>
                  </div>

                  <?php
                echo "</div>";
                echo "<div style='clear:both'></div>";
              echo "</div>";
            }
          endwhile;
        endif;
        wp_reset_query();
      echo "</div>";
    echo "</div>";
  }

  add_shortcode( 'noticia_home', 'noticia_home' );
