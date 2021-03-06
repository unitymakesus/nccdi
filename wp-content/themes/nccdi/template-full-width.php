<?php
/* Template Name: Full Width */

use Roots\Sage\Setup;

get_template_part('templates/components/header', get_post_type());
?>

<div class="container">
  <div class="content">

    <?php if (is_page('2015-16-annual-report')) { ?>
      <div id="chapters" class="chapters container hidden-xs hidden-sm print-no">
        <ul class="nav"></ul>
      </div>
    <?php } ?>

    <main class="main">
      <?php
      if (!have_posts()) : ?>
        <div class="alert alert-warning">
          This is not the page you're looking for.
        </div>
        <?php get_search_form();
      endif;

      if (is_post_type_archive('resource') || is_tax('resource-type')) :
        get_template_part('templates/layouts/block', 'resource');
      else :
        while (have_posts()) : the_post();
          if (is_page('whats-new')) {
            get_template_part('templates/layouts/loop', 'blog');
          } elseif (is_archive()) {
            get_template_part('templates/layouts/block', 'post-side');
          } else {
            get_template_part('templates/layouts/content', get_post_type());
          }
        endwhile;
      endif;
      ?>
    </main>
  </div><!-- /.content -->
</div><!-- /.container -->

<?php if ($wp_query->max_num_pages > 1) : ?>
  <nav class="post-nav container">
    <?php wp_pagenavi(); ?>
  </nav>
<?php endif; ?>
