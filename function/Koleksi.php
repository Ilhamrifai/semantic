<?php
//include_once "api/arc/ARC2.php";
require "api/config.php";

class Koleksi{
  var $remote_store;
  var $page_title;


  function __construct(){
    $this->remote_store=array('remote_store_endpoint'=>"http://localhost/perpus-umb/semantic/api/endpoint.php");
  }

  function basic_search($search_term){
    $store= ARC2::getRemoteStore($this->remote_store);
    $query=
      "PREFIX : <http://localhost/perpus-umb/ontology/ontobiblio#>
      PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
      select  distinct ?title ?author
      FROM <http://localhost/perpus-umb/ontology/ontobiblio.owl>
      where {
        <http://localhost/perpus-umb/ontology/ontobiblio.owl>
        ?x a :Biblio; :Biblio_title ?title ; :hasAuthor ?y; :hasPublisher ?z. FILTER REGEX (str(?title), '{$search_term}','i')
          OPTIONAL {
              ?y a :Author; :Author_name ?author. FILTER REGEX (str(?author), '{$search_term}','i')
          }
        ?y a :Author; :Author_name ?author.
        ?z a :Publisher ; :Publisher_name ?publisher.
      }
    ";

    /*UNION
    where{
      ?x a :Biblio; :Biblio_title ?title ; :hasAuthor ?y; :hasPublisher ?z.
      ?y a :Author; :Author_name ?author. FILTER REGEX (str(?title), '{$search_term}','i')
      ?z a :Publisher ; :Publisher_name ?publisher.
    }*/

    $rows=$store->query($query,'rows');
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

}
?>
