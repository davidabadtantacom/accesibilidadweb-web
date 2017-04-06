<?php
/**
 * @file
 * Contains the theme's functions to manipulate Drupal's default markup.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728096
 */


/**
 * Override or insert variables into the maintenance page template.
 *
 * @param array $variables
 *   Variables to pass to the theme template.
 * @param string $hook
 *   The name of the template being rendered ("maintenance_page" in this case.)
 */
/* -- Delete this line if you want to use this function
function tanta_zen_preprocess_maintenance_page(&$variables, $hook) {
  // When a variable is manipulated or added in preprocess_html or
  // preprocess_page, that same work is probably needed for the maintenance page
  // as well, so we can just re-use those functions to do that work here.
  tanta_zen_preprocess_html($variables, $hook);
  tanta_zen_preprocess_page($variables, $hook);
}
// */

/**
 * Override or insert variables into the html templates.
 *
 * @param array $variables
 *   Variables to pass to the theme template.
 * @param string $hook
 *   The name of the template being rendered ("html" in this case.)
 */
/* -- Delete this line if you want to use this function*/
function tanta_zen_preprocess_html(&$variables, $hook) {
/*
  $variables['sample_variable'] = t('Lorem ipsum.');

  // The body tag's classes are controlled by the $classes_array variable. To
  // remove a class from $classes_array, use array_diff().
  $variables['classes_array'] = array_diff($variables['classes_array'],
    array('class-to-remove')
  );
*/

  drupal_add_css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', array('type' => 'external'));
  drupal_add_js ('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('type' => 'external'));
}
/*// */

/**
 * Override or insert variables into the page templates.
 *
 * @param array $variables
 *   Variables to pass to the theme template.
 * @param string $hook
 *   The name of the template being rendered ("page" in this case.)
 */
/* -- Delete this line if you want to use this function
function tanta_zen_preprocess_page(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the region templates.
 *
 * @param array $variables
 *   Variables to pass to the theme template.
 * @param string $hook
 *   The name of the template being rendered ("region" in this case.)
 */
/* -- Delete this line if you want to use this function
function tanta_zen_preprocess_region(&$variables, $hook) {
  // Don't use Zen's region--no-wrapper.tpl.php template for sidebars.
  if (strpos($variables['region'], 'sidebar_') === 0) {
    $variables['theme_hook_suggestions'] = array_diff(
      $variables['theme_hook_suggestions'], array('region__no_wrapper')
    );
  }
}
// */

/**
 * Override or insert variables into the block templates.
 *
 * @param array $variables
 *   Variables to pass to the theme template.
 * @param string $hook
 *   The name of the template being rendered ("block" in this case.)
 */
/* -- Delete this line if you want to use this function
function tanta_zen_preprocess_block(&$variables, $hook) {
  // Add a count to all the blocks in the region.
  // $variables['classes_array'][] = 'count-' . $variables['block_id'];

  // By default, Zen will use the block--no-wrapper.tpl.php for the main
  // content. This optional bit of code undoes that:
  if ($variables['block_html_id'] == 'block-system-main') {
    $variables['theme_hook_suggestions'] = array_diff(
      $variables['theme_hook_suggestions'], array('block__no_wrapper')
    );
  }
}
// */

/**
 * Override or insert variables into the node templates.
 *
 * @param array $variables
 *   Variables to pass to the theme template.
 * @param string $hook
 *   The name of the template being rendered ("node" in this case.)
 */
/* -- Delete this line if you want to use this function*/
function tanta_zen_preprocess_node(&$variables, $hook) {
  // Si es una página no mostramos información de quién ni cuando ha sido publicada o modificada
  if (in_array ($variables['type'], array ('page_completed'))){
    if ($variables['submitted']) {
      $variables['submitted'] = '';
    }
  }
  if (in_array ($variables['type'], array ('post'))){
    if ($variables['display_submitted']) {
      $variables['submitted'] = t('!datetime', array('!datetime' => $variables['pubdate']));
      if (isset($variables['content']['links']['node']['#links']['node-readmore'])) {

      // make a copy of the old link and change the link's title
      $readmore = $variables['content']['links']['node']['#links']['node-readmore'];
      $readmore['title'] = t('Read more');

      // remove the old link
      unset($variables['content']['links']['node']['#links']['node-readmore']);

      // creat a new link
      $variables['content']['links']['node']['#links']['node-readmore'] = $readmore;

//echo '<pre>';var_export($variables);echo '</pre>';die;
      }
    }
  }
}
/*// */

/**
 * Override or insert variables into the comment templates.
 *
 * @param array $variables
 *   Variables to pass to the theme template.
 * @param string $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
function tanta_zen_preprocess_comment(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */


/**
 * Override all images alt and title attribute if empty
 * 
 * @param array $vars
 */
function tanta_zen_preprocess_image(&$vars) {
  // alt
  if (empty($vars['alt']) && !empty($vars['title'])) {
    $vars['alt'] = $vars['title'];
  }
  // title
  elseif (empty($vars['title']) && !empty($vars['alt'])) {
    $vars['title'] =   $vars['alt'];
  }
  // both
  elseif (empty($vars['title']) && empty($vars['alt'])){
    $vars['alt'] = 'image title';
    $vars['title'] = 'alt title';
  }
}

/**
 * Overrtide the main menu html
 *
 * @param array  $variables
 */
function tanta_zen_menu_tree__main_menu($variables) {
  $menu_type = str_replace('menu_tree__menu_', '', $variables['theme_hook_original']);  
  return '<ul class="menu ' . str_replace(array('_', ' '), '-', strtolower($menu_type)) . '-menu nav navbar-nav navbar-right">' . $variables['tree'] . '</ul>';
}

/**
 * hook_js_alter for replacing jquery eu_cookie_compliance js call
 *
 * @param array $javascript  The javascript
 */
function eu_cookie_compliance_js_alter(&$javascript) {
  $javascript['sites/all/modules/eu_cookie_compliance/js/eu_cookie_compliance.js']['scope'] = 'header';
}


function tanta_zen_form_alter(&$form, $form_state, $form_id) {
  if ( $form['#form_id'] == 'user_login' ) {
    // Form
    $form['#prefix'] = '<div class="col-xs-12 col-sm-12 col-sm-offset-0 col-md-8 col-md-offset-2">';
    $form['#suffix'] = '</div>';
    // Username
    $form['name']['#attributes']['placeholder'] = $form['name']['#title'];
    $form['name']['#attributes']['class'][] = 'form-control';
    $form['name']['#description'] = '';
    $form['name']['#prefix'] = '<div class="form-group">';
    $form['name']['#suffix'] = '</div>';
    // Password
    $form['pass']['#attributes']['placeholder'] = $form['pass']['#title'];
    $form['pass']['#attributes']['class'][] = 'form-control';
    $form['pass']['#description'] = '';
    $form['pass']['#prefix'] = '<div class="form-group">';
    $form['pass']['#suffix'] = '</div>';
    // Submit
    $form['actions']['submit']['#attributes']['class'][] = 'btn';
    $form['actions']['submit']['#attributes']['class'][] = 'btn-primary';
    $form['actions']['submit']['#attributes']['class'][] = 'btn-block';
    $form['actions']['submit']['#prefix'] = '<div class="form-group">';
    $form['actions']['submit']['#suffix'] = '</div>';
  }
  elseif ( $form['#form_id'] == 'user_pass' ) {
    // Form
    $form['#prefix'] = '<div class="col-xs-12 col-sm-12 col-sm-offset-0 col-md-8 col-md-offset-2">';
    $form['#suffix'] = '</div>';
    // Username
    $form['name']['#attributes']['placeholder'] = $form['name']['#title'];
    $form['name']['#attributes']['class'][] = 'form-control';
    $form['name']['#description'] = '';
    $form['name']['#prefix'] = '<div class="form-group">';
    $form['name']['#suffix'] = '</div>';

    // Submit
    $form['actions']['submit']['#attributes']['class'][] = 'btn';
    $form['actions']['submit']['#attributes']['class'][] = 'btn-primary';
    $form['actions']['submit']['#attributes']['class'][] = 'btn-block';
    $form['actions']['submit']['#prefix'] = '<div class="form-group">';
    $form['actions']['submit']['#suffix'] = '</div>';
  }
  elseif ( $form['#form_id'] == 'user_register_form' ) {
    // Form
    $form['#prefix'] = '<div class="col-xs-12 col-sm-12 col-sm-offset-0 col-md-8 col-md-offset-2">';
    $form['#suffix'] = '</div>';
    // Username
    $form['account']['name']['#attributes']['placeholder'] = $form['account']['name']['#title'];
    $form['account']['name']['#attributes']['class'][] = 'form-control';
    $form['account']['name']['#description'] = '';
    $form['account']['name']['#prefix'] = '<div class="form-group">';
    $form['account']['name']['#suffix'] = '</div>';
    // Email
    $form['account']['mail']['#attributes']['placeholder'] = $form['account']['mail']['#title'];
    $form['account']['mail']['#attributes']['class'][] = 'form-control';
    $form['account']['mail']['#description'] = '';
    $form['account']['mail']['#prefix'] = '<div class="form-group">';
    $form['account']['mail']['#suffix'] = '</div>';
    // Submit
    $form['actions']['submit']['#attributes']['class'][] = 'btn';
    $form['actions']['submit']['#attributes']['class'][] = 'btn-primary';
    $form['actions']['submit']['#attributes']['class'][] = 'btn-block';
    $form['actions']['submit']['#prefix'] = '<div class="form-group">';
    $form['actions']['submit']['#suffix'] = '</div>';
  }
}