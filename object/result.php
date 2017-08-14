<?php
  include_once "function/biblio.inc.php";
  $biblio=new Biblio();
  $search_term=isset($_GET['keyword']) ? $_GET['keyword'] : '';


?>

<div class="s-main-content container">
  <div class="row">
    <div class="col-lg-8 col-sm-9 col-xs-12 animated fadeInUp delay2">
    <?php
      if($_GET['keyword']==$search_term):
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
      <?php endforeach;
    endif;
    ?>
    </div>
  </div>
</div>
