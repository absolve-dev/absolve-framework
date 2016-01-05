<?php
  /*
    Videos Archive Template
  */
  get_header();
?>
<div class="container">
  <h1>Videos <small>Archive</small></h1>
  <div class="panel panel-default">
    <div class="panel-body">
      Hello Videos Archive

      <?php if( have_posts() ): while( have_posts() ): the_post();
        // check for video thumbnail. if not, use own thumbnail. ?>
        <p>
          <a href="<?php the_permalink(); ?>">
            <b><?php the_title(); ?></b>
          </a>
        </p>
      <?php endwhile; else:?>
        <p>Sorry! There's nothing here.</p>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
