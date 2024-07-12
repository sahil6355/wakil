<?php get_header(); ?>
<?php 
$case_page_bg_img = esc_url(get_option('case_bg_img'));
$case_per_page = get_option('case_number');
$case_grid_layout = get_option('case_grid_layout');

?>

<div class="top_header_layout">
    <div class="sub_heder_layout">
        <img src="<?php if ($case_page_bg_img == '') { echo get_template_directory_uri() . '/assets/images/case/bg_image.png';} else { echo $case_page_bg_img;} ?>" alt="service banner">
        <div class="black-overlay"></div>
        <div class="banner-header-content">
            <h1 class="page-title"> Our Cases </h1>
            <?php
            echo do_shortcode('[custom_breadcrumb]'); 
            ?>
        </div>
    </div>
</div>

<div class="cases">
    <?php 
    $terms = get_terms( array(
        'taxonomy' => 'case_category',
        'hide_empty' => false,
    ) );
    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
        echo '<div class="main_case_category">';
        echo '<ul class="case-categories">';
        echo '<li class="button active" id="all"><a href="#">All</a></li>';
        foreach ( $terms as $term ) {
            echo '<li class="button" id="' . esc_html( $term->slug ) . '"><a href="#">' . esc_html( $term->name ) . '</a></li>';
        }
        echo '</ul></div>';
    }
    $number_of_columns = '';
    if($case_grid_layout === '3_wide' || $case_grid_layout === '4_wide' || $case_grid_layout === '5_wide'){
        $number_of_columns = intval(explode('_', $case_grid_layout)[0]);
        $column_class = 'wide-columns columns-' . $number_of_columns;
    } else if($case_grid_layout === 'masonry_1' || $case_grid_layout === 'masonry_2'){
        $column_class = 'gridContainer';
        if($case_grid_layout === 'masonry_2'){
            $column_class = 'gridContainer second_masonry_layout';
        }
    } else if($case_grid_layout === 'masonry_3'){
        $column_class = 'third_masonry_layout';
    }else {
        $number_of_columns = $case_grid_layout;
        $column_class = 'columns-' . $number_of_columns;
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
        'posts_per_page' =>  -1 ,
    );
    $result = new WP_Query($args);
    if($case_grid_layout != 'masonry_3'){
        ?>
        <div class="case-box <?php echo $column_class ?>">
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
                   
                    echo '<div class="hover_cursor_change sub_case_box all ' . $class_names . '">';
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
        <?php
    } else{
        if ($result->have_posts()) {
            $total_posts = $result->post_count;
            ?>
            <div class="case-box <?php echo $column_class ?>">
                <?php
                $max_rows = 3; 
                $posts_per_row = ceil($total_posts / $max_rows);
                $remaining_posts = $total_posts % $max_rows;
                $count = 0;

                for ($row = 0; $row < $max_rows; $row++) {
                    echo '<div class="row">'; // Start a new row
                    $posts_in_this_row = $posts_per_row;
                    if ($remaining_posts > 0) {
                        $remaining_posts--;
                    } else {
                        $posts_in_this_row--;
                    }
                    for ($col = 0; $col < $posts_in_this_row; $col++) {
                        if ($count < $total_posts) {
                            $result->the_post();
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
                            $sub_case_box_class = ($col % 2 == 0) ? 'even' : 'odd';
                            
                            echo '<div class="sub_case_box all ' . $class_names . ' ' . $sub_case_box_class . '">';
                            echo '<a href="' . esc_url( get_permalink() ) . '">';
                            if ( has_post_thumbnail() ) {
                                $featured_image_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
                                echo '<div class="image-container">';
                                echo '<img src="' . esc_url( $featured_image_url ) . '" alt="' . get_the_title() . '" width="570" height="570">';
                                echo '<div class="sub_case_box_img_overlay"></div>';                
                                echo '</div>';
                            }
                            echo '<div class="bottom_contain"><p class="case_category">'.  $cat_names .'</p>';
                            echo '<h2>'. $title .'</h2></div>';
                            echo '</a>';
                            echo '</div>';
                            $count++;
                        }
                    }
                    echo '</div>';
                }?>
            </div>
            <?php
        } else {
            echo 'No posts found';
        }
    }
    ?> 
    <div class="button-box Load_more" id="Loadmore-case">
        <a class="button-wrap">
            <span>
                Load More
                <i class="ri-arrow-right-line"></i>
            </span>
        </a>
    </div>

</div>

<?php 

echo do_shortcode('[bg-video-play]');

echo do_shortcode('[testimonial-layout-second]');

echo do_shortcode('[Consultation-layout]');

get_footer(); ?>

<script>
    $(document).ready(function () {
        var $list = $(".case-box .all").hide(),
        $curr;
        var $num = <?php echo $case_per_page; ?>;
        var $chanegnum = <?php echo $case_per_page; ?>;

        $(".button").on("click", function () {
            var $this = $(this);
            $this.addClass("active").siblings().removeClass("active");
            $curr = $list.filter("." + this.id).hide();
            $curr.slice(0, $num).show(400);
            $list.not($curr).hide(300);
            checkLoadMoreVisibility(); 
        }).filter(".active").click();

        $("#Loadmore-case").on("click", function () {
            var $hiddenElements = $curr.filter(":hidden");
            var $nextElements = $hiddenElements.slice(0, $chanegnum);
            $nextElements.slideDown("slow");

            checkLoadMoreVisibility();
        });

        function checkLoadMoreVisibility() {
            if ($curr.filter(":hidden").length === 0) {
                $("#Loadmore-case").hide();
            } else {
                $("#Loadmore-case").show(); 
            }
        }
        checkLoadMoreVisibility();
    });
</script>


<script type="text/javascript">
    const gridContainer = $('.gridContainer');
    const children = gridContainer.children();
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
</script>