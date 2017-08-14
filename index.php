<?php
define('INDEX_AUTH', '1');
  include "../sysconfig.inc.php";
  include "function/Koleksi.php";

  $page_title = $sysconf['library_semantic_subname'].' | '.$sysconf['library_semantic_name'];

  function clean($string) {
     $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
     $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

     return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
  }


?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" prefix="og: http://ogp.me/ns#">
<head>
  <!-- Page Title
  ============================================= -->
<?php
  include_once "object/meta.php";
?>

</head>
<body>

<!--[if lt IE 9]>
<div class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</div>
<![endif]-->
<?php
  include_once 'object/header.php';
?>

<!--Main Content-->
<?php if(isset($_GET['search']) || isset($_GET['p'])):

  ?>
<section  id="content" class="s-main-page" role="main">

  <!-- Search on Front Page
  ============================================= -->
  <div class="s-main-search">
    <?php
    if(isset($_GET['p'])) {
      switch ($_GET['p']) {
      case ''             : $page_title = __('Collections'); break;
      case 'show_detail'  : $page_title = __("Record Detail"); break;
      case 'member'       : $page_title = __("Member Area"); break;
      case 'member'       : $page_title = __("Member Area"); break;
      default             : $page_title; break; }
    } else {
      $page_title = __('Collections');
    }
    ?>
    <h1 class="s-main-title animated fadeInUp delay1"><?php echo $page_title ?></h1>
    <form action="index.php" method="get" autocomplete="off">
      <input type="text" id="keyword" class="s-search animated fadeInUp delay4" name="keywords" value="" lang="<?php echo $sysconf['default_lang']; ?>" role="search">
      <button type="submit" name="search" value="search" class="s-btn animated fadeInUp delay4"><?php echo __('Search'); ?></button>
    </form>
    <a href="#" class="s-search-advances" width="800" height="500" title="<?php echo __('Advanced Search') ?>"><?php echo __('Advanced Search') ?></a>
  </div>

  <!-- Mai
  ============================================= -->
  <div class="s-main-content container">
    <div class="row">

      <!-- Show Result
      ============================================= -->
      <div class="col-lg-8 col-sm-9 col-xs-12 animated fadeInUp delay2">

         <?php $search_term=isset($_GET['keyword']) ? $_GET['keyword'] : '';
        if($_GET['keyword']==$search_term):
          $biblio=new Koleksi();
          $result=$biblio->basic_search($search_term);
            foreach ($result as $rs):?>
            <div class="item biblioRecord" itemscope itemtype="http://schema.org/Book" vocab="http://schema.org/" typeof="Book">
              <div class="cover-list"></div><div class="detail-list">
                <h4><a href="" class="titleField" itemprop="name" property="name" title="<?php echo $rs['title']?>"><?php echo $rs['title'];?> </a></h4>
                <div class="author" itemprop="author" property="author" itemscope itemtype="http://schema.org/Person">
                  <span class="author-name" itemprop="name" property="name"><?php echo $rs['author']; ?></span>
                </div>
                <div class="subItem">
                  <a href="" class="detailLink" title="View record detail description for this title">Record Detail</a>
                  <a href="/perpus-umb/index.php?p=show_detail&id=402&keywords=algoritma&inXML=true" class="xmlDetailLink" title="View record detail description in XML Format" target="_blank">XML Detail</a><a href="/perpus-umb/index.php?p=cite&id=402&keywords=algoritma" class="openPopUp citationLink" title="Citation for: Dasar-Dasar Algoritma Dan Pemrograman " target="_blank">Cite</a>
                </div>
              </div>
            </div>
        <?php endforeach;?>
      <?php endif; ?>
      </div>

      <div class="col-lg-4 col-sm-3 col-xs-12 animated fadeInUp delay4">

    </div>
  </div>
</div>

</section>
<?php else:?>
  <main id="content" class="s-main" role="main">

      <!-- Search form
      ============================================= -->
      <div class="s-main-search animated fadeInUp delay1">

        <div id="simply-search">

          <form action="index.php" autocomplete="off">
            <h1 class="animated fadeInUp delay2"><?php echo __('SEARCH'); ?></h1>
            <div class="marquee down">
              <p class="s-search-info">
              <?php echo __('start it by typing one or more keywords for title, author or subject'); ?>
            </p>
              <input type="text" class="s-search animated fadeInUp delay4" id="keyword" name="keyword"/>
              <button type="submit" name="search" value="search" class="s-btn animated fadeInUp delay4"><?php echo __('Search'); ?></button>
            </div>
          </form>

          <a href="#" class="s-search-advances" title="<?php echo __('Advanced Search') ?>"><?php echo __('Advanced Search') ?></a>

        </div>

      </div>

  </main>
  <?php include "object/adv_search.php";?>
<?php endif;?>


<!--End Main Content-->

<?php
  include_once 'object/footer.php';
 ?>
