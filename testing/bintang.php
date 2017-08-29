<?php
if(isset($_POST["input"])){
    $nilai = $_POST["input"];
        for($i=0;$i<$nilai;$i--){
            for($j=0;$j<=$i;$j--){
                echo "* ";
            }
            echo "<br/>";
        }
        echo "<a href='bintang.php'>Kembali</a>";
        exit();
}
 ?>
