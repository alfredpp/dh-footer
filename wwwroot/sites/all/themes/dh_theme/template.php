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
  $menu_output = '<div id="accordion-menu">';
  $num = 1;
  foreach ($footer_menu_tree as $index => $menu_item) {
    $id_name = 'collapse-' . str_replace(' ', '-', $index);
    $expanded = ($num == 1) ? 'true' : 'false';
    $collapsed_class = ($num != 1) ? 'collapsed' : 'in';
    $menu_output .= '<div class="accordion panel"><p style="cursor: pointer;" role="button" data-toggle="collapse" data-target="#' . $id_name . '" aria-expanded="' . $expanded . '" aria-controls="' . $id_name . '">';
    $menu_output .= "<a href='/" . drupal_get_path_alias($menu_item['link']['href']) . "' target='_blank'>" . $menu_item['link']['title'] . "</a>";
    $menu_output .= '</p>';
    if (isset($menu_item['below'])) {
      $menu_output .= '<div class="newfooter_section_one_firstblocks collapse ' . $collapsed_class . ' dont-collapse-sm" style="" id="' . $id_name . '"  data-parent="#accordion-menu"><ul>';
      foreach ($menu_item['below'] as $child_menu) {
        $menu_output .= "<li><a href='/" . drupal_get_path_alias($child_menu['link']['href']) . "' target='_blank'>" . $child_menu['link']['title'] . "</a></li>";
      }
      $menu_output .= '</ul></div>';
    }
    $menu_output .= '</div>';
    $num++;
  }
  $menu_output .= '</div>';
  $variables['footer_menu_op'] = $menu_output;
}
