<?php 

add_shortcode('video-play', 'video_play_btn');

function video_play_btn()
{
  $video_play = get_option('video_play');
  ?>
  <div class="main_video_top">
    <a id="play-video" class="video-play-button">
      <span><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/home/video_btn.png" width="48px" height="48px"></span>
    </a>


    <div id="video-overlay" class="video-overlay" data-id='<?php echo $video_play ?>'>
      <a class="video-overlay-close">x</a>
    </div>

  </div>


  <?php 
}

add_shortcode('bg-video-play', 'bg_video_play');

function bg_video_play()
{
  ?>

  <div class="main-bg-video-play">
    <div class="bg-video-play">
      <?php echo do_shortcode('[video-play]'); ?>
    </div>
  </div>
  
  <?php  
}