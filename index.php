<?php
include_once "function/Biblio.php";
$biblio=new Biblio();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo $page_title;?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1; minimum-scale=1; user-scalable=no;" />

    <link rel="shortcut icon" href="">

    <!-- ===================== MASTER CSS ===================== -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/dist/css/bootstrap.min.css">


    <!-- ===================== SITE CSS ===================== -->
<link rel="stylesheet" type="text/css" href="assets/css/widget.css">
    <link rel="stylesheet" type="text/css" href="assets/css/search.css">
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">

<!-- ===================== Font Awesome ===================== -->
<link rel="stylesheet" type="text/css" href="assets/font-awesome/css/font-awesome.min.css"/>

    <!-- ===================== SITE JS ===================== -->
    <script src="assets/js/jquery-1.11.1.min.js"></script>
    <script src="assets/css/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/application.js"></script>

</head>
<body style="background:#34495e">
 <div id="headerpane">
	<div class="container">
		<div class="tabs-search">
			<ul class="nav nav-tabs" role="tablist">
			    <li role="presentation" class="active"><a href="#basic" aria-controls="basic" role="tab" data-toggle="tab">Basic Search</a></li>
			    <li role="presentation"><a href="#simple" aria-controls="simple" role="tab" data-toggle="tab">Simple Search</a></li>
			    <li role="presentation"><a href="#advanced" aria-controls="simple" role="tab" data-toggle="tab">Advanced Search</a></li>
			</ul>
			<div class="tab-content">
		    <div role="tabpanel" class="tab-pane active" id="buku">
				<form class="form form-search searchform_buku" action="result.php" id="searchform">
					<div class="input-group">
              <input name="p" type="hidden" class="search_buku2 form-control" value="basic">
				      	<input name="s" type="text" class="search_buku2 form-control" placeholder="Masukkan kata kunci pencarian">

				      	<span class="input-group-btn">
				        	<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
				      	</span>
				    </div>
				    <p>
				    	Semantic Search Untuk Bibliografi Perpustakaan Universitas Muhammadiyah Bengkulu
				    </p>
				</form>
		    </div>
		    <div role="tabpanel" class="tab-pane" id="fasilitas">
		    	<form class="form form-search searchform_fasilitas" action="#" id="searchform">
					<div class="input-group">
						<input name="q" type="text" class="search_fasilitas1 form-control hidden-xs" placeholder="Contoh : Ruang Seminar, Ruang Diskusi, Ruang Baca">
				      	<input name="q" type="text" class="search_fasilitas2 form-control visible-xs" placeholder="Contoh : Ruang Seminar, Ruang Diskusi, Ruang Baca">
				      	<span class="input-group-btn">
				        	<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
				      	</span>
				    </div>
				    <p>

				    </p>
				</form>
		    </div>
		  </div>
		</div>
	</div>
</div>
     <footer>
        <div class="container">
            <p class="text-center"></p>
        </div>
    </footer>

</body>
</html>
