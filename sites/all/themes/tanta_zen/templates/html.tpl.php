<?php
/**
 * @file
 * Returns the HTML for the basic html structure of a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728208
 */
?><!DOCTYPE html>
<html <?php print $html_attributes . $rdf_namespaces; ?>>
<head>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>

  <link rel="apple-touch-icon" sizes="57x57" href="/sites/default/files/favicon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="/sites/default/files/favicon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="/sites/default/files/favicon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="/sites/default/files/favicon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="/sites/default/files/favicon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="/sites/default/files/favicon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="/sites/default/files/favicon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="/sites/default/files/favicon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="/sites/default/files/favicon/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="/sites/default/files/favicon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/sites/default/files/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="/sites/default/files/favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/sites/default/files/favicon/favicon-16x16.png">
  <link rel="manifest" href="/sites/default/files/favicon/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="/sites/default/files/favicon/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">

  <?php if ($default_mobile_metatags): ?>
    <meta name="MobileOptimized" content="width">
    <meta name="HandheldFriendly" content="true">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php endif; ?>

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <?php print $styles; ?>
  <?php if ($add_html5_shim): ?>
    <!--[if lt IE 9]>
    <script src="<?php print $base_path . $path_to_zen; ?>/js/html5shiv.min.js"></script>
    <![endif]-->
  <?php endif; ?>
  <script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "WebSite",
    "url": "http://accesibilidadweb.com",
    "contactPoint": [{
      "@type": "ContactPoint",
      "telephone": "+34 91 440 10 40",
      "contactType": "customer service"
    }]
  }
  </script>
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <?php if ($skip_link_text && $skip_link_anchor): ?>
    <a href="<?php print $skip_link_anchor; ?>" class="sr-only sr-only-focusable" id="skippy"><div class="container"><span class="skiplink-text"><?php print $skip_link_text; ?></span></div></a>
  <?php endif; ?>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
  <?php print $scripts; ?>
</body>
</html>
