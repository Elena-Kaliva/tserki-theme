<?php
$categories = get_sub_field('categories');
?>
<section class="container home-category">
  <?php foreach ($categories as $category): ?>

    <div class="row mb-80">
      <div class="col-12 text-center">
        <div class="home-category-content">
          <?php if ($category['title']): ?>
            <h3 class="category-title"><?= $category['title']; ?></h3>
          <?php endif; ?>
          <?php if ($category['content']): ?>
            <div class="category-text roboto-regular"><?= $category['content']; ?></div>
          <?php endif; ?>
          <?php if ($category['image']): ?>
            <img src="<?= $category['image']['url']; ?>" alt="" class="category-image">
          <?php endif; ?>

          <?php if ($category['link']): ?>
            <a class="button buttonbg" href="<?= $category['link']['url']; ?>"><?= $category['link']['title']; ?></a>
          <?php endif; ?>

        </div>

      </div>

    </div>
  <?php endforeach; ?>

</section>