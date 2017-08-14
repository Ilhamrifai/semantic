<?php
include_once "function/Biblio.php";

$module = $_GET[modul];
$act = $_GET[act];
$result=$_GET[s];
$search_term = isset($result) ? $ $result:'';


if($act='simple' and $result==$search_term){
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
