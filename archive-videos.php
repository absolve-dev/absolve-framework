<?php
  /*
    Videos Archive Template
  */
  get_header();
?>

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

<?php get_footer(); ?>
