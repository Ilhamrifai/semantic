<?php
    $result = array( 
  "0" => array ("title type" => "literal" ,"title" => "Dasar-Dasar Web Dinamis Menggunakan PHP", "author type" => "literal", "author" => "Anonim"),
  "1" => array ("title type" => "literal" ,"title" => "Pemrograman Web Mencakup HTML, CSS, Javascript, & PHP", "author type" => "literal", "author" => "Anonim"),
  "2" => array ("title type" => "literal" ,"title" => "Mudah Menjadi Programer PHP", "author type" => "literal", "author" => "Anonim")
 );
 
  /* Mengakses nilai array dua dimensi secara manual */
  echo "<b>Cetak Nilai secara manual</b>"."</br>";
  // Untuk resu
  echo "Koleksi Pertama : ".$result['0']['title']." dan Pengarang : ".$result['0']['author']. "<br />" ;
  echo "Koleksi Kedua : ".$result['1']['title'] . " dan Pengarang : ".$result['1']['author']. "<br />" ;
  echo "Koleksi Ketiga : ".$result['2']['title'] . " dan Pengarang : ".$result['2']['author']. "<br />" ;
  //echo "Nilai Doni dalam mata pelajaran Matematika : ".$result['0']['Matematika'] . "<br />" ; 
  //echo "Nilai Doni dalam mata pelajaran Kimia : ".$result['0']['Matematika'] . "<br />" ; 
  
 /* foreach ($result as $mahasiswa => $nilai)
 {
   
   foreach ($nilai as $result => $value)
   {
    //echo "Nilai".$mahasiswa." alam mata pelajaran ".$value."<br>";
     echo "Nilai"." ".$mahasiswa." dalam mata pelajaran ".$result." adalah"." ".$value."<br>";
   }   
 }
 */

//foreach($result as $

$values = ['say  ', '  bye', ' ', ' to', ' spaces ', '   '];
 
$words = array_filter(array_map('trim', $values));
print_r($words); // ['say', 'bye', 'to', 'spaces']

$letters = ['a', 'a', 'a', 'a', 'b', 'b', 'c', 'd', 'd', 'd', 'd', 'd'];
 
$values = array_count_values($letters); // get key to count array
arsort($values); // sort descending preserving key
$top = array_slice($values, 0, 3); // get top 3
 
print_r($top);
// Array
// (
//     [d] => 5
//     [a] => 4
//     [b] => 2
// )


$fruits = [
    'banana' => 'yellow',
    'apple' => 'green',
    'orange' => 'orange',
];
 
array_walk($fruits, function(&$value, $key) {
    $value = "$key is $value";
});
 
print_r($fruits);
 echo "<br/>";

$cities = ['Berlin', 'KYIV', 'Amsterdam', 'Riga'];
$aliases = array_map('strtolower', $cities);
 
print_r($aliases); // ['berlin', 'kyiv, 'warsaw', 'riga']
 
$numbers = [1, -2, 3, -4, 5];
$squares = array_map(function($number) {
    return $number ** 2;
}, $numbers);
 
print_r($squares);


$array1 = ['a' => 'a', 'b' => 'b', 'c' => 'c'];
$array2 = ['a' => 'A', 'b' => 'B', 'D' => 'D'];
 
$merge = array_merge($array1, $array2);
print_r($merge);
// Array
// (
//     [a] => A
//     [b] => B
//     [c] => c
//     [D] => D
// )


  $kota = array("nabire", "sorong", "manokwari", "merauke","nabire","jayapura");
  $kota2 = array_unique($kota);
  print_r($kota2);



$foo = array("bob", "fred", "jussi", "jouni", "egon", "marliese"); 
$bar = each($foo); 
print_r($bar);
echo "<br/>"; 
next($foo); 
$bar = each($foo); 
print_r($bar); 
echo "<br/>"; 
end($foo); 
$bar = each($foo); 
print_r($bar); 
echo "<br/>"; 

$os = array("Mac", "NT", "Irix", "Linux"); 
if (in_array("gogole", $os)) 
{ 
echo "Got Irix"; 
} 
if (in_array("mac", $os)) 
{ 
echo "Got mac"; 
} 
//hasilnya adalah : Got irix 
?>