<?php
/**
 * @file
 * Overwrite sites/all/themes/zen/templates/page.tpl.php
 *
 */
?>

<a id="main-content"></a>
<header class="navbar navbar-default nav-principal">
  <div class="container fullwidth">
    <div class="navbar-header">
      <?php if ($logo): ?>
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="header__logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" class="header__logo-image" /></a>
      <?php endif; ?>
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#tt-navbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <nav class="collapse navbar-collapse" id="tt-navbar">
      <?php print render($page['header']); ?>
    </nav>
  </div>
  <?php if ($secondary_menu): ?>
    <nav class="header__secondary-menu" role="navigation">
      <?php print theme('links__system_secondary_menu', array(
        'links' => $secondary_menu,
        'attributes' => array(
          'class' => array('links', 'inline', 'clearfix'),
        ),
        'heading' => array(
          'text' => $secondary_menu_heading,
          'level' => 'h2',
          'class' => array('visually-hidden'),
        ),
      )); ?>
    </nav>
  <?php endif; ?>
</header>

<main role="main">
  <?php print render($page['highlighted']); ?>
  <?php print $breadcrumb; ?>
  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <h1><?php print $title; ?></h1>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <?php print $messages; ?>
  <?php print render($tabs); ?>
  <?php print render($page['help']); ?>
  <?php if ($action_links): ?>
    <ul class="action-links"><?php print render($action_links); ?></ul>
  <?php endif; ?>
  <?php print render($page['content']); ?>
  <?php print $feed_icons; ?>
</main>

<div class="layout-swap__top layout-3col__full">

  <div class="container">

    <?php if ($main_menu): ?>
      <nav class="main-menu" role="navigation">
        <?php
        // This code snippet is hard to modify. We recommend turning off the
        // "Main menu" on your sub-theme's settings form, deleting this PHP
        // code block, and, instead, using the "Menu block" module.
        // @see https://drupal.org/project/menu_block
        print theme('links__system_main_menu', array(
          'links' => $main_menu,
          'attributes' => array(
            'class' => array('navbar', 'clearfix'),
          ),
          'heading' => array(
            'text' => t('Main menu'),
            'level' => 'h2',
            'class' => array('visually-hidden'),
          ),
        )); ?>
      </nav>
    <?php endif; ?>

    <?php print render($page['navigation']); ?>

  </div>

</div>

<?php print render($page['footer']); ?>

<?php print render($page['bottom']); ?>
