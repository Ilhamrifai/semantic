<?php
$var_1 = "quran";
$var_2 = "alquran";

similar_text($var_1, $var_2, $percent);

echo $percent;
echo "<br/>";
// 27.272727272727

similar_text($var_2, $var_1, $percent);

echo $percent;
// 18.181818181818



$string="contoh kalimat string 43%^%^&%^";

echo"<br/>". $dok = preg_replace('/[^A-Za-z0-9\-]/', '', $string);


// include composer autoloader
//require_once './'__DIR__ . 'api/vendor/autoload.php';

// create stemmer
// cukup dijalankan sekali saja, biasanya didaftarkan di service container

/*$stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();

$dictionary = $stemmerFactory->createDefaultDictionary();
$dictionary->addWordsFromTextFile(__DIR__.'/my-dictionary.txt');
$dictionary->add('internet');
$dictionary->remove('desa');

$stemmer = new \Sastrawi\Stemmer\Stemmer($dictionary);

var_dump($stemmer->stem('internetan')); //internet
*

//$stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
$stemmer  = $stemmerFactory->createStemmer();

// stem
$sentence = 'Perekonomian Indonesia sedang dalam pertumbuhan yang membanggakan';
$output   = $stemmer->stem($sentence);

echo $output . "\n";
// ekonomi indonesia sedang dalam tumbuh yang bangga

echo $stemmer->stem('Mereka meniru-nirukannya') . "\n";

$stopWordRemoverFactory = new \Sastrawi\StopWordRemover\StopWordRemoverFactory();
$stopWordRemover  = $stopWordRemoverFactory->createStopWordRemover();
$getStopWords=$stopWordRemoverFactory->getStopWords();

$output_remove=$stopWordRemover->remove($output);
//$stopwords = $factory->get_stop_words();

print_r($getStopWords);
echo "<br/>";
print_r($output_remove);

?>*/
?>
<html>
<head>
    <title>Mencetak Bintang</title>
</head>
<body>
<form action="bintang.php" method="post">
<table>
<tr>
    <th>
        <label for="input">Masukkan Nilai</label>
    </th>
        <td>
                <input type="text" name="input" id="input">
        </td>
    </tr>
    <tr>
        <td>
                <button type="submit">Buat Bintang</button>
        </td>
    </tr>
</table>
</form>
</body>

    </html>
