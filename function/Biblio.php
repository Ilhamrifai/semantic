<?php
//include_once "api/arc/ARC2.php";
include_once "api/config.php";

class Biblio{
  var $remote_store;
  var $page_title;


  public function __construct(){
    $this->remote_store=array('remote_store_endpoint'=>"http://localhost/perpus-umb/semantic/api/endpoint.php");
  }

  public function basic_search($search_term){
    $this->page_title="Pencarian Basic";
    $store= ARC2::getRemoteStore($this->remote_store);
    $query="
      PREFIX : <http://localhost/perpus-umb/ontologi/ontologi#>
      PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
      select  distinct ?title ?author
      FROM <http://localhost/perpus-umb/ontologi/ontologi.owl>
      where {
        ?x a :Biblio; :Biblio_title ?title ; :hasAuthor ?y; :hasPublisher ?z. FILTER REGEX (?title, '{$search_term}','i')
        ?y a :Author; :Author_name ?author.
        ?z a :Publisher ; :Publisher_name ?publisher.
      } group by ?title
    ";

    $rows=$store->query($query,'rows');
    $arr_str=array_values($rows);
    return $arr_str;
  }

  public function readAll(){
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
