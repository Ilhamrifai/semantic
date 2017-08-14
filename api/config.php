<?php
define("PATH_ROOT", dirname(__FILE__));
include PATH_ROOT."/arc/ARC2.php"; // path to the file ARC2.php

// SQL database configuration for storing the postings:
$arc_config = array(
  /* MySQL database settings */
  'db_host' => '127.0.1.1',
  'db_user' => 'root',
  'db_pwd' => '',
  'db_name' => 'db_ontologi',

  /* ARC2 store settings */
  'store_name' => 'sandbox',


  /* SPARQL endpoint settings */
  'endpoint_features' => array(
    'select', 'construct', 'ask', 'describe', // allow read
    'load', 'insert', 'delete',               // allow update
    'dump'                                    // allow backup
  ),
  'endpoint_timeout' => 60, /* not implemented in ARC2 preview */
  'endpoint_read_key' => '', /* optional */
  'endpoint_write_key' => '', /* optional */
  'endpoint_max_limit' => 1000, /* optional */



);
