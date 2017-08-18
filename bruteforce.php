<?php
	// demo.php

	// include composer autoloader
	require_once __DIR__ . '/api/vendor/autoload.php';

	// create stemmer
	// cukup dijalankan sekali saja, biasanya didaftarkan di service container
	$stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
	$stemmer  = $stemmerFactory->createStemmer();

	// stem
	$sentence = 'ekonomi indonesia sedang dalam bertumbuh yang membanggakan';
	$output   = $stemmer->stem($sentence);

	echo $output . "\n";
	// ekonomi indonesia sedang dalam tumbuh yang bangga

	//echo $stemmer->stem('penelitian') . "\n";
	// mereka tiru
?>
