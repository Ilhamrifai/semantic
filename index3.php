<?php
define('INDEX_AUTH', '1');

function findDuplicates($count)
{
    return $count > 1;
}

include "../sysconfig.inc.php";
include "function/Koleksi.php";
include 'function/Finder.php';

require_once __DIR__ . '/api/vendor/autoload.php';

$page_title = $sysconf['library_semantic_subname'] . ' | ' . $sysconf['library_semantic_name'];

?>
<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#" xmlns="http://www.w3.org/1999/xhtml">
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
$biblio = new Koleksi();

?>
        <!--Main Content-->
        <?php if (isset($_GET['search']) || isset($_GET['p'])):

?>
        <section class="s-main-page" id="content" role="main">
            <!-- Search on Front Page
  ============================================= -->
            <div class="s-main-search">
                <?php
if (isset($_GET['p'])) {
    switch ($_GET['p']) {
        case '':$page_title = __('Collections');
            break;
        case 'show_detail':$page_title = __("Record Detail");
            break;
        case 'member':$page_title = __("Member Area");
            break;
        case 'member':$page_title = __("Member Area");
            break;
        default:$page_title;
            break;}
} else {
    $page_title = __('Collections');
}
?>
                <h1 class="s-main-title animated fadeInUp delay1">
                    <?php echo $page_title ?>
                </h1>
                <form action="index.php" autocomplete="off" method="get">
                    <input class="s-search animated fadeInUp delay4" id="keyword" lang="<?php echo $sysconf['default_lang']; ?>" name="keywords" role="search" type="text" value="">
                        <button class="s-btn animated fadeInUp delay4" name="search" type="submit" value="search">
                            <?php echo __('Search'); ?>
                        </button>
                    </input>
                </form>
                <a class="s-search-advances" height="500" href="#" title="<?php echo __('Advanced Search') ?>" width="800">
                    <?php echo __('Advanced Search') ?>
                </a>
            </div>
            <!-- Mai
  ============================================= -->
            <div class="s-main-content container">
                <div class="row">
                    <!-- Show Result
      ============================================= -->
                    <div class="col-lg-12 col-sm-12 col-xs-12 animated fadeInUp delay2">
                        <?php
$search_term = '';

if (isset($_GET['keyword'])) {
    $search_term = trim(strip_tags(urldecode($_GET['keyword'])));
}

if ($search_term && $_GET['search'] == 'basic'):
    $search_term=trim(stripslashes(strip_tags($_GET['keyword'])));
    

    print_r($search_term);
    //$search_term = trim(strip_tags(strtolower($_GET['keyword'])));

    $result = $biblio->basic_search($search_term);


    

    foreach ($result as $rs):


    ?>
    
    
        <div class="item biblioRecord"">
        <hr>
            <div class="cover-list">
            </div>
            <div class="detail-list">
                <h4>
                    <a class="titleField" href="" itemprop="name" property="name" title="<?php echo $rs['title']; ?>">
                        <?php echo $rs['title']; ?>
                    </a>
                </h4>
                <div class="author" itemprop="author" itemscope="" itemtype="http://schema.org/Person" property="author">
                    <span class="author-name" itemprop="name" property="name">
                        <?php echo $rs['author']; ?>
                    </span>
                </div>
                <div class="subItem">
                    <a class="detailLink" href="" title="View record detail description for this title">
                        Record Detail
                    </a>
                    <a class="xmlDetailLink" href="/perpus-umb/index.php?p=show_detail&id=402&keywords=algoritma&inXML=true" target="_blank" title="View record detail description in XML Format">
                        XML Detail
                    </a>
                    <a class="openPopUp citationLink" href="/perpus-umb/index.php?p=cite&id=402&keywords=algoritma" target="_blank" title="Citation for: Dasar-Dasar Algoritma Dan Pemrograman ">
                        Cite
                    </a>
                </div>
            </div>
        </div>
        <?php
    //endfor;
    endforeach;?>


    <?php endif;?>
                    </div>
                    <div class="col-lg-4 col-sm-3 col-xs-12 animated fadeInUp delay4">
                    </div>
                </div>
            </div>
        </section>
        <?php else: ?>
        <main class="s-main" id="content" role="main">
            <!-- Search form
      ============================================= -->
            <div class="s-main-search animated fadeInUp delay1">
                <div id="simply-search">
                    <form action="index.php" autocomplete="off">
                        <h1 class="animated fadeInUp delay2">
                            <?php echo __('SEARCH'); ?>
                        </h1>
                        <div class="marquee down">
                            <p class="s-search-info">
                                <?php echo __('start it by typing one or more keywords for title, author or subject'); ?>
                            </p>
                            <input class="s-search animated fadeInUp delay4" id="keyword" name="keyword" type="text"/>
                            <button class="s-btn animated fadeInUp delay4" name="search" type="submit" value="basic">
                                <?php echo __('Search'); ?>
                            </button>
                        </div>
                    </form>
                    <a class="s-search-advances" href="#" title="<?php echo __('Advanced Search') ?>">
                        <?php echo __('Advanced Search') ?>
                    </a>
                </div>
            </div>
        </main>
        <?php include "object/adv_search.php";?>
        <?php endif;?>
        <!--End Main Content-->
        <?php
include_once 'object/footer.php';
?>
    </body>
</html>