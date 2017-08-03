<?php
  include_once "function/Biblio.php";
  $biblio=new Biblio();
  $search_term=isset($_GET['s']) ? $_GET['s'] : '';

  if($_GET['p']=='basic' && $_GET['s']==$search_term){
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
  elseif($_GET['p']=='simple' && $_GET['s']==$search_term){
    echo "ini untuk Simple Search";
  }
  elseif($_GET['p']=='advanced' && $_GET['s']==$search_term){
    echo "ini untuk advanced search";
  }

?>
