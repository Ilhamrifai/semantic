<?php
//include_once "api/arc/ARC2.php";
require "api/config.php";


class Koleksi{
  var $remote_store;
  var $page_title;



  function __construct(){
    $this->remote_store=array('remote_store_endpoint'=>"http://localhost/perpus-umb/semantic/api/endpoint.php");
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

  function clean($string) {
     $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
     $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

     return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
  }


  function basic_search($search_term){
    $store= ARC2::getRemoteStore($this->remote_store);
    $query=
      "
        PREFIX : <http://localhost/perpus-umb/ontology/ontobiblio#>
        PREFIX owl: <http://www.w3.org/2002/07/owl#>
        PREFIX xsd: <http://www.w3.org/2001/XMLSchema#>
        PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
        PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
        PREFIX foaf: <http://xmlns.com/foaf/0.1/>
        PREFIX dc: <http://purl.org/dc/elements/1.1/>
        PREFIX iddbpedia: <http://id.dbpedia.org/resource/>
        PREFIX dbpedia: <http://dbpedia.org/>
        PREFIX skos: <http://www.w3.org/2004/02/skos/core#>
        select  distinct ?title ?author ?topic
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
    ";

    $rows=$store->query($query,'rows');
    //$cl_rows=clean($rows);
    $contents=array_values($rows);
    return $contents;
  }

  function readAll(){
    $store= ARC2::getRemoteStore($this->remote_store);
    $query="
          PREFIX : <http://localhost/perpus-umb/ontologi/ontologi#>
          PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
          SELECT ?title ?author
          FROM <http://localhost/perpus-umb/ontologi/ontologi.owl>
          where{
            ?x a :Biblio; :Biblio_title ?title; :hasAuthor ?y; :hasPublisher ?z.
            ?y a :Author; :Author_name ?author.
            ?z a :Publisher ; :Publisher_name ?publisher.
          }
            ORDER BY DESC(?title)
    ";
    $rows=$store->query($query,'rows');
    $arr_str=array_values($rows);
    return $arr_str;
  }

  function getDataTopic(){
    $store=ARC2::getRemoteStore($this->remote_store);
    $query="
      PREFIX : <http://localhost/perpus-umb/ontology/ontobiblio#>
      PREFIX owl: <http://www.w3.org/2002/07/owl#>
      PREFIX xsd: <http://www.w3.org/2001/XMLSchema#>
      PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
      PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
      PREFIX foaf: <http://xmlns.com/foaf/0.1/>
      PREFIX dc: <http://purl.org/dc/elements/1.1/>
      PREFIX iddbpedia: <http://id.dbpedia.org/resource/>
      PREFIX dbpedia: <http://dbpedia.org/>
      PREFIX skos: <http://www.w3.org/2004/02/skos/core#>
      select distinct ?topic where {
        ?x a :Topic; :Topic_title ?topic .
      } ORDER BY ASC (?topic)";

      $rows=$store->query($query,'rows');
      $contents=array_values($rows);
      return $contents;
  }

  /*function adv_search($search_term){
    $store=ARC2::getRemoteStore($this->remote_store);
    $query=""
  }*/

}
?>
