<?php
/**
 * @file
 * Overwrite modules/taxonomy/taxonomy-term.tpl.php
 *
 */
?>
<div id="taxonomy-term-<?php print $term->tid; ?>" class="<?php print $classes; ?>">

  <?php if (!$page): ?>
    <a href="<?php print $term_url; ?>"><?php print $term_name; ?></a>
  <?php endif; ?>

  <div class="content">
    <?php print render($content); ?>
  </div>

</div>
