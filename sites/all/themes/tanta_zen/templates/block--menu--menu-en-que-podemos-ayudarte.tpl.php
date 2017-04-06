<?php
/**
 * @file
 * Overwrite sites/all/themes/zen/templates/block.tpl.php
 *
 */
?>
<div class="col-md-3 <?php print $classes; ?>"<?php print $attributes; ?> id="<?php print $block_html_id; ?>">

  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <h2<?php print $title_attributes; ?>><?php print $title; ?></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <?php print $content; ?>

</div>
