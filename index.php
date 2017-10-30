<?php
define('INDEX_AUTH', '1');
include "../sysconfig.inc.php";
include "function/Koleksi.php";
require_once __DIR__ . '/api/vendor/autoload.php';

$page_title = $sysconf['library_semantic_subname'] . ' | ' . $sysconf['library_semantic_name'];

?>



<!DOCTYPE html>
<html>
    <head>
        <?php
include_once "object/meta.php";
?>
    </head>
    <body>
       <?php
//include_once 'object/header.php';
$biblio         = new Koleksi();
$stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
$stemmer        = $stemmerFactory->createStemmer();

$stopWordRemoverFactory = new \Sastrawi\StopWordRemover\StopWordRemoverFactory();
$stopWordRemover        = $stopWordRemoverFactory->createStopWordRemover();
$getStopWords           = $stopWordRemoverFactory->getStopWords();

?>
        <div id="headerpane">
            <div class="container">
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
//$search_term=preg_replace('/\s+/', ' ', $_GET['q']);
if (isset($_GET['q'])) {

    //$search_term=urldecode(preg_replace("![^a-z0-9]+!i", "-",$_GET['q']));
    $search_term         = trim(strip_tags(urldecode($_GET['q'])));
    $remove_stopword     = $stopWordRemover->remove(strtolower($search_term));
    $search_term_af_stem = $stemmer->stem($remove_stopword);

}

if ($search_term):

    print_r($remove_stopword);

    $result = "";
    if ($_GET['search'] == 'keywords'):
        //$search_term=trim(stripslashes(strip_tags($_GET['q'])));
        //print_r($search_term_af_stem);
        $result = $biblio->keyword_search($remove_stopword);
        //print_r($result['title']);
        //print_r($getStopWords);

    elseif ($_GET['search'] == 'basic'):
        $selected = $_GET['option'];
        $result   = $biblio->basic_search($remove_stopword, $selected);
    endif;

    /*if(empty($result)):
    $result=$biblio->multiple_keyword_search($search_term_af_stem);
    endif;*/
    echo "<div>".count($result)."</div>";

    foreach ($result as $rs):
        //print_r($biblio->checkSimilarity($search_term_af_stem,$rs['title']));
        $search_term_af_title = $stemmer->stem($rs['title']);
        //if(in_array($search_term_af_stem,$search_term_af_title)):
        ?>  


                <div></div>
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
        //endif;
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
                <div class="tengah">
                    <div class="tabs-search">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="active" role="presentation">
                                <a aria-controls="keyword" data-toggle="tab" href="#keyword" role="tab">
                                    Keyword
                                </a>
                            </li>
                            <li role="presentation">
                                <a aria-controls="basic" data-toggle="tab" href="#basic" role="tab">
                                    Basic Search
                                </a>
                            </li>
                            <li role="presentation">
                                <a aria-controls="adv" data-toggle="tab" href="#adv" role="tab">
                                    Advanced Search
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="keyword" role="tabpanel">
                                <form action="index.php" class="form form-search" id="searchform" method="GET">
                                    <div class="input-group">
                                       <input class="form-control input-lg" name="q" placeholder="Masukkan kata kunci pencarian berdasarkan Judul, Pengarang atau Penerbit.." type="text" >
                                                <span class="input-group-btn">
                                                    <button class="btn btn-default btn-lg" name="search" type="submit" value="keywords">
                                                        <i class="fa fa-search">
                                                        </i>
                                                    </button>
                                                </span>
                                            </input>
                                        </input>
                                    </div>
                                    <p>
                                    </p>
                                </form>
                            </div>
                            <div class="tab-pane" id="basic" role="tabpanel">
                                <form action="index.php" class="form form-search searchform_buku" id="searchform">
                                    <div class="input-group">
                                        <div class="col-md-3" style="padding-right: 0px;padding-left: 0px;
">
                                            <select class="form-control input-lg" name="option">
                                                <option selected="" value="title">
                                                    Judul
                                                </option>
                                                <option value="author">
                                                    Pengarang
                                                </option>
                                                <option value="topic">
                                                    Topic
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-md-8" style="/*padding-left: 0px;*/padding-right: 0px;
">
                                             <input class="form-control input-lg" name="q" placeholder="Masukkan kata kunci pencarian berdasarkan Judul, Pengarang atau Penerbit.." type="text" >

                                            </input>

                                        </div>
                                        <div "="" 0px;="" class="col-md-1 style=" padding-left:="" style="padding-left: 0px;
">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default btn-lg" name="search" style="width: 150%;" type="submit" value="basic">
                                                    <i class="fa fa-search">
                                                    </i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                    <p>
                                    </p>
                                </form>
                            </div>
                            <div class="tab-pane" id="adv" role="tabpanel">
                                <form action="#" class="form form-search searchform_buku" id="searchform">
                                    <div class="input-group">
                                        <input class="search_buku1 form-control input-lg hidden-xs" name="q" placeholder="Masukkan kata kunci sesuai dengan parameter yang dipilih" type="text">
                                            <input class="search_buku2 form-control input-lg visible-xs" name="q" placeholder="Masukkan kata kunci sesuai dengan parameter yang dipilih" type="text">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-default btn-lg" type="submit" name="search" value="keyword">
                                                        <i class="fa fa-search">
                                                        </i>
                                                    </button>
                                                </span>
                                            </input>
                                        </input>
                                    </div>
                                    <p>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif;?>
            </div>
        </div>
    </body>
</html>
