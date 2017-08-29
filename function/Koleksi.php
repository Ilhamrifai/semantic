<?php
//include_once "api/arc/ARC2.php";
require "api/config.php";

$search_term = str_replace("'", " ", $search_term);
$search_term = str_replace("-", " ", $search_term);
$search_term = str_replace(")", " ", $search_term);
$search_term = str_replace("(", " ", $search_term);
$search_term = str_replace("\"", " ", $search_term);
$search_term = str_replace("/", " ", $search_term);
$search_term = str_replace("=", " ", $search_term);
$search_term = str_replace(".", " ", $search_term);
$search_term = str_replace(",", " ", $search_term);
$search_term = str_replace(":", " ", $search_term);
$search_term = str_replace(";", " ", $search_term);
$search_term = str_replace("!", " ", $search_term);
$search_term = str_replace("?", " ", $search_term);

class Koleksi
{
    public $remote_store;
    public $page_title;
    public $prefix;

    public function __construct()
    {
        $this->remote_store = array('remote_store_endpoint' => "http://localhost/perpus-umb/semantic/api/endpoint.php");
        $this->prefix       = "
      PREFIX : <http://localhost/perpus-umb/ontology/ontobiblio#>
      PREFIX owl: <http://www.w3.org/2002/07/owl#>
      PREFIX xsd: <http://www.w3.org/2001/XMLSchema#>
      PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
      PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
      PREFIX foaf: <http://xmlns.com/foaf/0.1/>
      PREFIX dc: <http://purl.org/dc/elements/1.1/>
      PREFIX iddbpedia: <http://id.dbpedia.org/resource/>
      PREFIX dbpedia: <http://dbpedia.org/>
      PREFIX skos: <http://www.w3.org/2004/02/skos/core#>";

        /*
    $this->prefix="
    PREFIX : <http://localhost/perpus-umb/ontology/ontobiblio#>
    PREFIX owl: <http://www.w3.org/2002/07/owl#>
    PREFIX xsd: <http://www.w3.org/2001/XMLSchema#>
    PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
    PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
    PREFIX foaf: <http://xmlns.com/foaf/0.1/>
    PREFIX dc: <http://purl.org/dc/elements/1.1/>
    PREFIX : <http://dbpedia.org/resource/>
    PREFIX dbpedia2: <http://dbpedia.org/property/>
    PREFIX dbpedia: <http://dbpedia.org/>
    PREFIX skos: <http://www.w3.org/2004/02/skos/core#>";
     */
    }

    public function getkeyword()
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

    public function getAllCollection()
    {
        $store        = ARC2::getRemoteStore($this->remote_store);
        $prefix_query = $this->prefix;

        $select = "select distinct ?title ?author";
        $where  = "  where {
      {
         ?x a :Biblio; :Biblio_title ?title ; :hasAuthor ?y; :hasTopic ?xy.
         ?y a :Author; :Author_name ?author; :IsAuthorOf ?x.

      } union {
        ?x a :Biblio; :Biblio_title ?title ; :hasTopic ?xy.
        ?y a :Author; :Author_name ?author; :IsAuthorOf ?x.
     }
   }";
        $query = $prefix_query . $select . $where;

        $rows = $store->query($query, 'rows');
        //$cl_rows=clean($rows);
        $contents = array_values($rows);

        return $contents;

    }


    public function basic_search($search_term)
    {
        $store = ARC2::getRemoteStore($this->remote_store);
        $label = $this->getSKOSConcept();

        $prefix_query = $this->prefix;

        $select = "select  distinct ?title ?author where";
        /*$where=
        "
        where {
        {
        ?x a :Biblio; :Biblio_title ?title ; :hasAuthor ?y; :hasTopic ?xy. FILTER REGEX (str(?title), '{$search_term}','i')
        ?y a :Author; :Author_name ?author; :IsAuthorOf ?x.
        ?xy a :Topic; :Topic_title ?topic; :IsTipicOf ?x.
        } union {
        ?x a :Biblio; :Biblio_title ?title ; :hasTopic ?xy.
        ?y a :Author; :Author_name ?author; :IsAuthorOf ?x.
        ?xy a :Topic; :Topic_title ?topic ; :IsTopicOf ?x. FILTER REGEX (str(?topic),'{$search_term}','i')
        }union {
        ?x a :Biblio; :Biblio_title ?title ; :hasTopic ?xy.
        ?y a :Author; :Author_name ?author; :IsAuthorOf ?x.FILTER REGEX (str(?author),'{$search_term}','i')
        ?xy a :Topic; :Topic_title ?topic ; :IsTopicOf ?x.
        }
        }
        ";*/

        $condition1 = "{
          {
               ?x a :Biblio; :Biblio_title ?title ; :hasAuthor ?y; :hasTopic ?xy. FILTER REGEX (str(?title), '{$search_term}','i')
               ?y a :Author; :Author_name ?author; :IsAuthorOf ?x.

            }
        }";

        $condition2 =
            "
          {
            {
               ?x a :Biblio; :Biblio_title ?title ; :hasAuthor ?y; :hasTopic ?xy. FILTER REGEX (str(?title), '{$search_term}','i')
               ?y a :Author; :Author_name ?author; :IsAuthorOf ?x.

            } union {
              ?x a :Biblio; :Biblio_title ?title ; :hasTopic ?xy.
              ?y a :Author; :Author_name ?author; :IsAuthorOf ?x.FILTER REGEX (str(?author),'{$search_term}','i')
            }
          }
        ";

        $query = $prefix_query . $select . $condition1;

        $rows = $store->query($query, 'rows');
        //$cl_rows=clean($rows);
        $contents = array_values($rows);

        return $contents;
    }

    public function getSKOSAltLabel()
    {
        $store        = ARC2::getRemoteStore($this->remote_store);
        $prefix_query = $this->prefix;
        $select       = "select ?altLabel where";
        $condition    = "
        {
          ?skos a skos:Concept; skos:prefLabel ?preflabel;
          skos:altLabel ?altlabel.
        }";

        $rows=$store->query($prefix.$select.$condition,'rows');
        $contents=array_values($rows);
        return $contents;

    }

    public function readAll()
    {
        $store = ARC2::getRemoteStore($this->remote_store);
        $query = "
        PREFIX: < http: //localhost/perpus-umb/ontologi/ontologi#>
        PREFIXrdf: < http: //www.w3.org/1999/02/22-rdf-syntax-ns#>
        SELECT ? title ? author
        FROM < http : //localhost/perpus-umb/ontologi/ontologi.owl>
        where {
            ? xa : Biblio; : Biblio_title ? title; : hasAuthor ? y; : hasPublisher ? z .
            ? ya : Author; : Author_name ? author .
            ? za : Publisher; : Publisher_name ? publisher .
        }
        ORDERBYDESC( ? title)
        ";
        $rows    = $store->query($query, 'rows');
        $arr_str = array_values($rows);
        return $arr_str;
    }

    public function getDataTopic()
    {
        $store = ARC2::getRemoteStore($this->remote_store);
        $query = "
        PREFIX :  < http : //localhost/perpus-umb/ontology/ontobiblio#>
        PREFIXowl: < http: //www.w3.org/2002/07/owl#>
        PREFIXxsd: < http: //www.w3.org/2001/XMLSchema#>
        PREFIXrdfs: < http: //www.w3.org/2000/01/rdf-schema#>
        PREFIXrdf: < http: //www.w3.org/1999/02/22-rdf-syntax-ns#>
        PREFIXfoaf: < http: //xmlns.com/foaf/0.1/>
        PREFIXdc: < http: //purl.org/dc/elements/1.1/>
        PREFIXskos: < http: //www.w3.org/2004/02/skos/core#>
        selectdistinct ? topicwhere {
            ? xa : Topic; : Topic_title ? topic .
        }ORDERBYASC( ? topic)";

        $rows     = $store->query($query, 'rows');
        $contents = array_values($rows);
        return $contents;
    }

    public function getSKOSConcept()
    {
        $store        = ARC2::getRemoteStore($this->remote_store);
        $prefix_query = $this->prefix;
        $select       = "selectdistinct ? preflabel ? altlabel";
        $where        = "
        where {
            ? skosaskos : Concept;
            skos : prefLabel ? preflabel;
            skos : altLabel ? altlabel .
        }";
        $query = $prefix_query . $select . $where;
        /*$query2="PREFIX :  < http : //localhost/perpus-umb/ontology/ontobiblio#>
        PREFIXowl :  < http : //www.w3.org/2002/07/owl#>
        PREFIXxsd: < http: //www.w3.org/2001/XMLSchema#>
        PREFIXrdfs: < http: //www.w3.org/2000/01/rdf-schema#>
        PREFIXrdf: < http: //www.w3.org/1999/02/22-rdf-syntax-ns#>
        PREFIXfoaf: < http: //xmlns.com/foaf/0.1/>
        PREFIXdc: < http: //purl.org/dc/elements/1.1/>
        PREFIXskos: < http: //www.w3.org/2004/02/skos/core#>

        selectdistinct ? preflabel ? altlabel
        where {
        ? skosaskos : Concept;
        skos : prefLabel ? preflabel;
        skos : altLabel ? altlabel .
        }";*/
        $rows     = $store->query($query, 'rows');
        $contents = array_values($rows);
        return $contents;
    }

}
