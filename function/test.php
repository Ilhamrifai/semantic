<?php
  function getkeyword()
    {
        $stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
        $stemmer        = $stemmerFactory->createStemmer();

        $stopWordRemoverFactory = new \Sastrawi\StopWordRemover\StopWordRemoverFactory();
        $stopWordRemover        = $stopWordRemoverFactory->createStopWordRemover();
        $getStopWords           = $stopWordRemoverFactory->getStopWords();

        $collect = $this->getAllCollection();
        foreach ($collect as $cl):
            $title      = $cl['title'];
            $hitungkata = str_word_count($title, 1);
            //array_walk($hitungkata, array($this, 'filter'));
            $hitungkata = array_diff($hitungkata, $getStopWords);
            $wordCount  = array_count_values($hitungkata);
            //print_r($wordCount);

            $jumlahkata = count($wordCount);
            //  echo $title.'='.$jumlahkata.'<br/>';

            $jml_keyword        = 100;
            $judul              = ($jml_keyword / 100) * $jumlahkata;
            $jmlh_keyword_bulat = round($judul, 0);
            $ambil_keyword      = array_slice($wordCount, 0, $jmlh_keyword_bulat);

            echo "<h2>" . $title . "</h2>";
            echo "jumlah kata = " . $jumlahkata . '<br/>';
            echo "judul = " . $judul . '<br/>';
            echo "keyword=" . $jmlh_keyword_bulat . '<br/>';
            $idtitle = str_replace(" ", "_", $title);
            foreach ($ambil_keyword as $keykeyword => $valkey) {
                echo "$keykeyword<br/>$valkey<br/>";
                echo $title . '<br/>';
                echo $idtitle . '<br/>';
            }

            $output_remove = $stopWordRemover->remove(strtolower($title));
            $output_stem   = $stemmer->stem($output_remove);
            //pembobotan
            //jumlah array title;
            $n = $jumlahkata;

            echo "jumlah kata :" . $n . "<br/>";

            //jumlah array_keyword;
            echo "stopWordRemover : " . $output_remove . "<br/>";
            echo "stemming : " . $output_stem;

            //echo $ambil_keyword;
            //print_r($jumlahkata);
        endforeach;

        //$hitungkata=str_word_count($title,1);
        //array_walk($hitungkata,array($this ,'filter' ));
        //$hitungkata=array_diff($hitungkata,$this->stopword);

    }
?>