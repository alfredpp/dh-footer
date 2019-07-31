<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup templates
 */
?>
<header id="navbar" role="banner" class="<?php print $navbar_classes; ?>">
  <div class="<?php print $container_class; ?>">
    <div class="navbar-header">
      <?php if ($logo) : ?>
        <a class="logo navbar-btn pull-left" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
          <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
        </a>
      <?php endif; ?>

      <?php if (!empty($site_name)) : ?>
        <a class="name navbar-brand" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a>
      <?php endif; ?>

      <?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])) : ?>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
          <span class="sr-only"><?php print t('Toggle navigation'); ?></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      <?php endif; ?>
    </div>

    <?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])) : ?>
      <div class="navbar-collapse collapse" id="navbar-collapse">
        <nav role="navigation">
          <?php if (!empty($primary_nav)) : ?>
            <?php print render($primary_nav); ?>
          <?php endif; ?>
          <?php if (!empty($secondary_nav)) : ?>
            <?php print render($secondary_nav); ?>
          <?php endif; ?>
          <?php if (!empty($page['navigation'])) : ?>
            <?php print render($page['navigation']); ?>
          <?php endif; ?>
        </nav>
      </div>
    <?php endif; ?>
  </div>
</header>

<div class="main-container <?php print $container_class; ?>">

  <header role="banner" id="page-header">
    <?php if (!empty($site_slogan)) : ?>
      <p class="lead"><?php print $site_slogan; ?></p>
    <?php endif; ?>

    <?php print render($page['header']); ?>
  </header> <!-- /#page-header -->

  <div class="row">

    <?php if (!empty($page['sidebar_first'])) : ?>
      <aside class="col-sm-3" role="complementary">
        <?php print render($page['sidebar_first']); ?>
      </aside> <!-- /#sidebar-first -->
    <?php endif; ?>

    <section<?php print $content_column_class; ?>>
      <?php if (!empty($page['highlighted'])) : ?>
        <div class="highlighted jumbotron"><?php print render($page['highlighted']); ?></div>
      <?php endif; ?>
      <?php if (!empty($breadcrumb)) : print $breadcrumb;
      endif; ?>
      <a id="main-content"></a>
      <?php print render($title_prefix); ?>
      <?php if (!empty($title)) : ?>
        <h1 class="page-header"><?php print $title; ?></h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php print $messages; ?>
      <?php if (!empty($tabs)) : ?>
        <?php print render($tabs); ?>
      <?php endif; ?>
      <?php if (!empty($page['help'])) : ?>
        <?php print render($page['help']); ?>
      <?php endif; ?>
      <?php if (!empty($action_links)) : ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>
      </section>

      <?php if (!empty($page['sidebar_second'])) : ?>
        <aside class="col-sm-3" role="complementary">
          <?php print render($page['sidebar_second']); ?>
        </aside> <!-- /#sidebar-second -->
      <?php endif; ?>

  </div>
</div>


<footer id="footer-wrapper" class="section-footer-1 col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">
  <div id="dynamicfootermain">
    <div class="newfooter_section_one clearfix">
      <div class="section-container ">
        <div class="clearfix">
          <?php
          $footer_menu_1 = menu_navigation_links('footer-menu-1', 1);
          print theme('links', array(
            'links' => $footer_menu_1,
            'attributes' => array(
              'id' => 'user-menu',
              'class' => array('links', 'clearfix'),
            ),
            'heading' => array(
              'text' => t('User menu'),
              'level' => 'h2',
              'class' => array('element-invisible'),
            ),
          ));
          ?>
        </div>
        <!-- <div class="clearfix">
            <div class="accordion">

              <p style="cursor: pointer;"><a target="_blank" href="https://www.deccanherald.com/nation"> National</a> <span class="side-nav-list__items--accordion-cta" style="display: none;"></span></p>
              <div class="newfooter_section_one_firstblocks" style="">
                <ul>
                  <li><a target="_blank" href="https://www.deccanherald.com/nation/national-politics">Politics</a></li>
                  <li><a target="_blank" href="https://www.deccanherald.com/nation/north-central">North and Central</a></li>
                  <li><a target="_blank" href="https://www.deccanherald.com/south">South</a></li>
                  <li><a target="_blank" href="https://www.deccanherald.com/nation/east-and-northeast">East and Northeast</a></li>
                  <li><a target="_blank" href="https://www.deccanherald.com/nation/west">West</a></li>
                </ul>
              </div>
            </div>

            <div class="accordion">

              <p style="cursor: pointer;"><a target="_blank" href="https://www.deccanherald.com/karnataka"> Karnataka</a> <span class="side-nav-list__items--accordion-cta collapsed" style="display: none;"></span></p>
              <div class="newfooter_section_one_firstblocks" style="">
                <ul>
                  <li><a target="_blank" href="https://www.deccanherald.com/state/top-karnataka-stories-sec">Top Stories</a></li>
                  <li><a target="_blank" href="https://www.deccanherald.com/state/politics-sec">Politics</a></li>
                  <li><a target="_blank" href="https://www.deccanherald.com/state/districts-sec">Districts</a></li>
                </ul>
              </div>
            </div>

            <div class="accordion">

              <p style="cursor: pointer;"><a target="_blank" href="https://www.deccanherald.com/bengaluru"> Bengaluru</a> <span class="side-nav-list__items--accordion-cta collapsed" style="display: none;"></span></p>
              <div class="newfooter_section_one_firstblocks" style="">
                <ul>
                  <li><a target="_blank" href="https://www.deccanherald.com/bengaluru/top-bengaluru-stories">Top Stories</a></li>
                  <li><a target="_blank" href="https://www.deccanherald.com/bengaluru/crime">Bengaluru Crime</a></li>
                  <li><a target="_blank" href="https://www.deccanherald.com/bengaluru/politics">Politics</a></li>
                  <li><a target="_blank" href="https://www.deccanherald.com/bengaluru/infrastructure">Infrastructure</a></li>
                  <li><a target="_blank" href="https://www.deccanherald.com/bengaluru/life-in-the-city">Life in the City</a></li>
                </ul>
              </div>
            </div>

            <div class="accordion">

              <p style="cursor: pointer;"><a target="_blank" href="https://www.deccanherald.com/sports"> Sports</a> <span class="side-nav-list__items--accordion-cta" style="display: none;"></span></p>
              <div class="newfooter_section_one_firstblocks" style="">
                <ul>
                  <li><a target="_blank" href="https://www.deccanherald.com/sports/cricket">Cricket</a></li>
                  <li><a target="_blank" href="https://www.deccanherald.com/sports/cricket/icc-world-cup-2019.html">ICC World Cup 2019</a></li>
                  <li><a target="_blank" href="https://www.deccanherald.com/sports/formula-1">Formula 1 with DH</a></li>
                  <li><a target="_blank" href="https://www.deccanherald.com/sports/football">Football</a></li>
                  <li><a target="_blank" href="https://www.deccanherald.com/sports/tennis">Tennis</a></li>
                  <li><a target="_blank" href="https://www.deccanherald.com/sports/sportscene">Sportscene</a></li>
                  <li><a target="_blank" href="https://www.deccanherald.com/sports/other-sports">Other Sports</a></li>
                </ul>
              </div>
            </div>

            <div class="accordion">

              <p style="cursor: pointer;"><a target="_blank" href="https://www.deccanherald.com/business"> Business</a> <span class="side-nav-list__items--accordion-cta collapsed" style="display: none;"></span></p>
              <div class="newfooter_section_one_firstblocks" style="">
                <ul>
                  <li><a target="_blank" href="https://www.deccanherald.com/business-sec">Business News</a></li>
                  <li><a target="_blank" href="https://www.deccanherald.com/budget-2019">Budget 2019</a></li>
                  <li><a target="_blank" href="https://www.deccanherald.com/economy-business">Economy &amp; Business</a></li>
                  <li><a target="_blank" href="https://www.deccanherald.com/family-finance">Family Finance</a></li>
                  <li><a target="_blank" href="https://www.deccanherald.com/technology">Technology</a></li>
                  <li><a target="_blank" href="https://www.deccanherald.com/dh-wheels">DH Wheels</a></li>
                </ul>
              </div>
            </div>

            <div class="accordion">

              <p style="cursor: pointer;">Multimedia<span class="side-nav-list__items--accordion-cta collapsed" style="display: none;"></span></p>
              <div class="newfooter_section_one_firstblocks" style="">
                <ul>
                  <li><a target="_blank" href="https://www.deccanherald.com/video">Videos</a></li>
                  <li><a target="_blank" href="https://www.deccanherald.com/photos">Photos</a></li>
                </ul>
              </div>
            </div>

            <div class="accordion">

              <p style="cursor: pointer;"><a target="_blank" href="https://www.deccanherald.com/opinion-0"> Opinion</a> <span class="side-nav-list__items--accordion-cta collapsed" style="display: none;"></span></p>
              <div class="newfooter_section_one_firstblocks" style="">
                <ul>
                  <li><a target="_blank" href="https://www.deccanherald.com/Opinion">DH Views</a></li>
                  <li><a target="_blank" href="https://www.deccanherald.com/first-edit">Editorials</a></li>
                  <li><a target="_blank" href="https://www.deccanherald.com/panorama">Panorama</a></li>
                  <li><a target="_blank" href="https://www.deccanherald.com/main-article">Comment</a></li>
                  <li><a target="_blank" href="https://www.deccanherald.com/perspective">In Perspective</a></li>
                  <li><a target="_blank" href="https://www.deccanherald.com/right-middle">Right in the Middle</a></li>
                </ul>
              </div>
            </div>

            <div class="accordion">

              <p style="cursor: pointer;"><a target="_blank" href="https://www.deccanherald.com/entertainment"> Entertainment</a> <span class="side-nav-list__items--accordion-cta collapsed" style="display: none;"></span></p>
              <div class="newfooter_section_one_firstblocks" style="">
                <ul>
                  <li><a target="_blank" href="https://www.deccanherald.com/entertainment-cat">Entertainment News</a></li>
                  <li><a target="_blank" href="https://www.deccanherald.com/DH-Talkies">DH Talkies</a></li>
                  <li><a target="_blank" href="https://www.deccanherald.com/entertainment/arts-books-culture">Arts, Books &amp; Culture</a></li>
                </ul>
              </div>
            </div>

          </div> -->


        <div class="clearfix newfooter_m-t_specials">
          <div class="newfooter_specials_blocks">
            <?php
            $view = views_embed_view('special_events', 'block');
            print render($view);
            ?>
          </div>
        </div>

      </div>
    </div>
    <div class="newfooter_section_two clearfix">
      <div class="section-container">

        <div class="newfooter_section_two_blocks hide_below1024">
          <p>DH Picks</p>
          <?php
          $view = views_embed_view('dh_picks', 'block_1');
          print render($view);
          ?>
        </div>
        <div class="newfooter_section_two_blocks hide_below1024">
          <p>Latest stories</p>
          <?php
          $view = views_embed_view('latest_stories', 'block');
          print render($view);
          ?>
        </div>
        <div class="newfooter_section_two_blocks">
          <p>Trending news</p>
          <?php
          $block = module_invoke('dh_custom', 'block_view', 'trending_news');
          print render($block['content']);
          ?>
        </div>


        <div class="newfooter_section_two_blocks_last">
          <ul>
            <p>Services</p>
            <li>
              <a target="_blank" href="http://printersmysore.com/" title="About">About</a>
            </li>
            <li>
              <a target="_blank" href="http://www.deccanheraldepaper.com/" title="Epaper">Epaper</a>
            </li>

            <li>
              <a target="_blank" href="https://www.deccanherald.com/newsletters" title="Newsletter">Newsletter</a>
            </li>
            <li>
              <a target="_blank" href="https://www.deccanherald.com/archives" title="Archives">Archives</a>
            </li>
            <li>
              <a target="_blank" href="https://www.deccanherald.com/sitemap" title="Sitemap">Sitemap</a>
            </li>
            <li>
              <a target="_blank" href="http://dhclassifieds.com/deccanonline/" title="Classifieds">Classifieds</a>
            </li>

            <li>
              <a target="_blank" href="http://printersmysore.com/contact" title="Contact">Contact</a>
            </li>
          </ul>
          <ul>
            <p class="ourgroupsites_lable_mt">Our group sites</p>
            <li>
              <a target="_blank" href="http://printersmysore.com/" title="Printers Mysore">Printers Mysore</a>
            </li>
            <li>
              <a target="_blank" href="http://www.prajavani.net/" title="Prajavani">Prajavani</a>
            </li>
            <li>
              <a target="_blank" href="http://sudhaezine.com/" title="Sudha">Sudha</a>
            </li>
            <li>
              <a target="_blank" href="http://mayuraezine.com/" title="Mayura">Mayura</a>
            </li>
          </ul>

          <ul class="pri_tr_dis">
            <li>
              <a target="_blank" href="https://www.deccanherald.com/privacy-policy" title="Privacy Policy">Privacy Policy</a>
            </li>
            <li>
              <a target="_blank" href="https://www.deccanherald.com/terms" title="Terms">Terms</a>
            </li>
            <li>
              <a target="_blank" href="https://www.deccanherald.com/disclaimer" title="Disclaimer">Disclaimer</a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="newfooter_section_three clearfix">
      <div class="section-container">
        <div class="newfooter_fl"> © 2019 The Printers (Mysore) Private Ltd.</div>
        <div class="newfooter_fr newfooter_social">
          <ul>
            <li>
              <a target="_blank" href="https://www.facebook.com/deccanherald/"><img src="https://www.deccanherald.com/sites/deccanherald.com/modules/dynamicfooter/images/fb-white.svg" alt="" target="_blank"></a>
            </li>

            <li><a target="_blank" href="https://twitter.com/deccanherald"><img src="https://www.deccanherald.com/sites/deccanherald.com/modules/dynamicfooter/images/twit-white.svg" alt=""></a></li>

            <li>
              <a target="_blank" href="https://www.instagram.com/deccanherald/"><img src="https://www.deccanherald.com/sites/deccanherald.com/modules/dynamicfooter/images/insta-white.svg" alt="" target="_blank"></a>
            </li>
            <li>
              <a target="_blank" href="https://www.youtube.com/channel/UCHDXXHPrz-1GVbK_qk82hBQ"><img src="https://www.deccanherald.com/sites/deccanherald.com/modules/dynamicfooter/images/youtube-white.svg" alt="" target="_blank"></a>
            </li>

          </ul>
        </div>
      </div>
    </div>

  </div>


  <?php if (!empty($page['footer'])) : ?>
    <?php print render($page['footer']); ?>
  <?php endif; ?>
</footer>
