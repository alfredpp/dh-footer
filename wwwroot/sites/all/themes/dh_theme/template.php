<?php

/**
 * @file
 * Bootstrap sub-theme.
 *
 * Place your custom PHP code in this file.
 */

function dh_theme_preprocess_page(&$variables) {
  $menu = 'menu-footer-menu-1';
  $footer_menu_tree = menu_tree_all_data($menu);
  $menu_output = '';
  foreach ($footer_menu_tree as $menu_item) {
    $menu_output .= '<div class="accordion"><p style="cursor: pointer;">';
    $menu_output .= "<a href=" . $menu_item['link']['href'] . ">" . $menu_item['link']['title'] . "</a>";
    $menu_output .= '<span class="side-nav-list__items--accordion-cta" style="display: none;"></span></p>';
    if (isset($menu_item['below'])) {
      $menu_output .= '<div class="newfooter_section_one_firstblocks" style=""><ul>';
      foreach ($menu_item['below'] as $child_menu) {
        $menu_output .= "<li><a href=" . $child_menu['link']['href'] . ">" . $child_menu['link']['title'] . "</a></li>";
      }
      $menu_output .= '</ul></div>';
    }
    $menu_output .= '</div>';
  }
  $variables['footer_menu_op'] = $menu_output;
}
