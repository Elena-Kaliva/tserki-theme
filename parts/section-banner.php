<?php

$image = get_sub_field('banner_image');
$video = get_sub_field('banner_video');

?>

<section class="video-banner">

  <?php
  if ($video): ?>
    <style>
      .hero-video {
        background-image: url(<?= $image['url']; ?>);
        background-size: cover;
      }
    </style>
    <video id="hero-video" class="hero-video" autoplay="" muted="" loop="" playsinline="" poster="">
      <source src="<?= $video['url']; ?>" type="video/mp4">
    </video>
  <?php endif; ?>
</section>