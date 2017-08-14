<?php
  include_once "function/biblio.inc.php";
  $biblio=new Biblio();
  $search_term=isset($_GET['keyword']) ? $_GET['keyword'] : '';

  if($_GET['keyword']==$search_term){
    $result=$biblio->basic_search($search_term);
    echo "<table border=1><th>No</th><th>title</th><th>Author</th>";
    $no=1;
    foreach ($result as $rs) {
        echo '<tr><td>'.$no++.'</td>';
        echo '<td>'.$rs['title'].'</td>';
        echo '<td>'.$rs['author'].'</td></tr>';
    }
    echo "</table>";
  }


?>
