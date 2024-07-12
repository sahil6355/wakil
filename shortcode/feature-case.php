

<?php 

add_shortcode('horizontal-scroll', 'horizontal');

function horizontal()
{
  ?>
  <div class="feature_case_box p-100">
    <div class="top_feature_content">
      <div class="left_heading_feature">
        <h2>Featured Cases</h2>
        <div class="title_border"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/home/border_icon.png" width="36" height="30"></div>
      </div>
      <div class="right_content_feature">
        <p>Wakil is at the forefront of corporate, monetary, and legal innovation. We can help our clients succeed because we have a strong culture filled with a spirit of cooperation and creativity.</p>
      </div>
    </div>

    <div class="main_middle_horizantal"  id="horizontal-scoll">
      <div class="horizontal-scoll-wrapper">
        <div class="middle_horizantal horizontal">
          <?php
          $args = array(
            'post_type' => 'case',
            'post_status' => 'publish',
            'posts_per_page' =>  -1 ,
          );

          $result = new WP_Query($args);

          if ( $result -> have_posts() ) {
            while ( $result -> have_posts() ) {
              $result -> the_post();
              $title = get_the_title();
              $terms = get_the_terms( get_the_ID(), 'case_category' );
              $category_classes = array();
              if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                foreach ( $terms as $term ) {
                  $category_classes[] = esc_html( $term->slug );
                }
              }
              $cat_names = implode( ' , ', $category_classes );
              $post_url = get_permalink( get_the_ID() );
              ?>
              <div class="sub_feature_case_box">
                <a href="<?php echo $post_url; ?>">
                  <?php
                  if ( has_post_thumbnail() ) {
                    $featured_image_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
                    echo '<div class="image-container">';
                    echo '<img src="' . esc_url( $featured_image_url ) . '" alt="' . get_the_title() . '" width="370" height="370">';
                    echo '<div class="overlay-image"></div>';                   
                    echo '</div>';
                  }
                  echo '<div class="bottom_contain">';
                  echo '<p class="case_category">'.  $cat_names .'</p>';
                  echo '<h3>'. $title .'</h3>';
                  echo '</div>';
                  ?>
                </a>
              </div>
              <?php
            }
          } 
          ?>
        </div>
      </div>
    </div>

    <div class="button-box Load_more">
      <a href="<?php echo home_url(); ?>" class="button-wrap">
        <span>
          View All Cases
          <i class="ri-arrow-right-line"></i>
        </span>
      </a>
    </div>

  </div>

  <?php
}



add_shortcode('feature-hover', 'feature_hover');

function feature_hover()
{
  ?>
  <div class="feature_case2">
    <div class="main_our_feature_case">

      <?php
      $args = array(
        'post_type' => 'case',
        'post_status' => 'publish',
        'order' => 'ASC',
        'posts_per_page' =>  5,
      );
      $result = new WP_Query($args);
      ?>
      <div class="our_feature_case_img">
        <?php
        echo '';
        if ( $result -> have_posts() ) {
          $is_first = true;
          while ( $result -> have_posts() ) {
            $result -> the_post();
            $id = get_the_ID();
            $image_id = get_post_meta($id, 'wpse_uploaded_image', true);
            $image_url = wp_get_attachment_image_url($image_id, 'thumbnail');
            $active_class = $is_first ? 'active' : '';
            echo '<div id="img-'. $id .'" class="sub_case_img ' . $active_class . '"><img src="'. $image_url .'"><div class="shape-box-1"></div></div>';
            $is_first = false; 
          }
        }
        ?>
      </div>
      <div class="our_feature_case">
        <?php
        if ( $result -> have_posts() ) {
          while ( $result -> have_posts() ) {
            $result -> the_post();
            $title = get_the_title();
            $excerpt = get_the_excerpt();
            $post_url = get_permalink( get_the_ID() );
            $terms = get_the_terms( get_the_ID(), 'case_category' );
            $category_classes = array();
            if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
              foreach ( $terms as $term ) {
                $category_classes[] = esc_html( $term->slug );
              }
            }
            $class_names = implode( ' ', $category_classes );
            $cat_names = implode( ' , ', $category_classes );
            ?>
            <div id="case-<?php echo get_the_ID(); ?>"  class="sub_our_feature_case">
              <div class="left_our_feature_case">
                <?php echo '<a href="'. $post_url .'"><p class="case_category">'.  $cat_names .'</p></a>' ?>
                <?php  echo '<a href="'. $post_url .'"><h4>'. $title .'</h4></a>' ?>
              </div>  
              <div class="right_our_feature_case">
                <p>
                  <?php echo $excerpt; ?>
                </p>
              </div>  
            </div>
            <?php
          }
        }
        ?>
      </div>
    </div>
  </div>

  <?php
}


add_shortcode('case-layout1', 'case_layout1');

function case_layout1()
{
  ?>

  <div class="cases">
    <?php 

    $number_of_columns = '';

    $case_grid_layout = 'masonry_1';
    if($case_grid_layout === 'masonry_1' || $case_grid_layout === 'masonry_2'){
      $column_class = 'gridContainer';
      if($case_grid_layout === 'masonry_2'){
        $column_class = 'gridContainer second_masonry_layout';
      }
    }

    $dynamic_css = '';
    for ($i = 1; $i <= $number_of_columns; $i++) {
      $dynamic_css .= "
      .case-box.columns-$i {
        grid-template-columns: repeat($i, 1fr);
      }

      /* Responsive design */
      @media (max-width: 1440px) {
        .case-box.columns-$i {
          grid-template-columns: repeat(" . min($number_of_columns, 4) . ", 1fr);
        }
      }

      @media (max-width: 1199px) {
        .case-box.columns-$i {
          grid-template-columns: repeat(" . min($number_of_columns, 3) . ", 1fr);
        }
      }
      @media (max-width: 991px) {
        .case-box.columns-$i {
          grid-template-columns: repeat(" . min($number_of_columns, 2) . ", 1fr);
        }
      }
      @media (max-width: 600px) {
        .case-box.columns-$i {
          grid-template-columns: repeat(1, 1fr);
        }
      }
      ";
    }

    echo "<style>$dynamic_css</style>";
    $args = array(
      'post_type' => 'case',
      'post_status' => 'publish',
      'posts_per_page' =>  6 ,
    );
    $result = new WP_Query($args);
    ?>

    <div class="elementer-case-box case-box <?php echo $column_class ?>">
      <?php
      if ( $result -> have_posts() ) : 
        while ( $result -> have_posts() ) : 
          $result -> the_post(); 
          $title = get_the_title();
          $terms = get_the_terms( get_the_ID(), 'case_category' );
          $category_classes = array();
          if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
            foreach ( $terms as $term ) {
              $category_classes[] = esc_html( $term->slug );
            }
          }
          $class_names = implode( ' ', $category_classes );
          $cat_names = implode( ' , ', $category_classes );

          echo '<div class="sub_case_box all ' . $class_names . '">';
          echo '<a href="' . esc_url( get_permalink() ) . '">';
          if ( has_post_thumbnail() ) {
            $featured_image_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
            echo '<div class="image-container">';
            echo '<img src="' . esc_url( $featured_image_url ) . '" alt="' . get_the_title() . '" width="570" height="570">';
            echo '<div class="sub_case_box_overlay"><img src="' . get_stylesheet_directory_uri() . ' /assets/images/home/page-six-logo.png"></div>';                   
            echo '</div>';
          }
          echo '<div class="bottom_contain"><p class="case_category">'.  $cat_names .'</p>';
          echo '<h2>'. $title .'</h2></div>';
          echo '</a>';
          echo '</div>';

        endwhile; 
      endif; 
      wp_reset_postdata();
      ?>
    </div>

    <script>

      jQuery(document).ready(function ($) {
        const gridContainer2 = $('.elementer-case-box.case-box.gridContainer');
        const children = gridContainer2.children();

        let spanPattern = [4, 2];
        let spanIndex = 0;
        let count = 0;

        for (let i = 0; i < children.length; i++) {
          if (count === 0) {
            $(children[i]).addClass('grid-row-span-2');
          }

          count++;
          if (count >= spanPattern[spanIndex]) {
            count = 0;
            spanIndex = (spanIndex + 1) % spanPattern.length;
          }
        }
      });
    </script>

    <?php
  }

  add_shortcode('case-layout2', 'case_layout2');

  function case_layout2()
  {
    $args = array(
      'post_type' => 'case',
      'post_status' => 'publish',
      'posts_per_page' => 2 ,
    );
    $result = new WP_Query($args);
    echo '<div class="case_layout2">';
    if ( $result -> have_posts() ) : 
      while ( $result -> have_posts() ) : 
        $result -> the_post(); 
        $title = get_the_title();
        $terms = get_the_terms( get_the_ID(), 'case_category' );
        $category_classes = array();
        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
          foreach ( $terms as $term ) {
            $category_classes[] = esc_html( $term->slug );
          }
        }
        $cat_names = implode( ' , ', $category_classes );
        ?>

        <div class="sub_case_layout2">
          <a href="<?php echo esc_url( get_permalink() ); ?>">
          <?php
          if ( has_post_thumbnail() ) {
            $featured_image_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
            echo '<div class="image-container">';
            echo '<img src="' . esc_url( $featured_image_url ) . '" alt="' . get_the_title() . '" width="570" height="570">';                   
            echo '</div>';
          }
          echo '<div class="bottom_contain">';
          echo '<p class="case_category">'.  $cat_names .'</p>';
          echo '<h3>'. $title .'</h3>';
          echo '</div>';
          ?>
        </a>

      </div>

      <?php
    endwhile; 
  endif; 
  echo '</div>';
  wp_reset_postdata();

}

