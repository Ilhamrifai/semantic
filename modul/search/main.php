
<main id="content" class="s-main" role="main">
    <!-- Search form
    ============================================= -->
    <div class="s-main-search animated fadeInUp delay1">
      <div id="simply-search">
        <form action="result.php" method="get" autocomplete="off">
          <h1 class="animated fadeInUp delay2">SEARCH</h1>
          <div class="marquee down">
            <p class="s-search-info">
            start it by typing one or more keywords for title, author or subject            </p>
            <input type="text" class="s-search animated fadeInUp delay4" name="s"/>
            <button type="submit" value="search" class="s-btn animated fadeInUp delay4">Search</button>
          </div>
        </form>
        <a href="#" class="s-search-advances" title="Advanced Search">Advanced Search</a>
      </div>
    </div>
</main>
<div id="advance-search" class="container">
  <div class="hamburger hamburger--3dy is-active" id="hide-advance-search" role="navigation">
    <div class="hamburger-box">
      <div class="hamburger-inner"></div>
    </div>
  </div>
  <h2>Advance Search</h2>
  <div class="row">
    <form action="index.php" method="get" class="form-horizontal form-search">
      <div class="col-sm-6">
        <div class="control-group">
          <label class="label">Title</label>
          <div class="controls">
            <input type="text" name="title" class="form-control" />
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="control-group">
          <label class="label">Author(s)</label>
          <div class="controls">
            <input type="text" name="author" class="form-control" />
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="col-sm-6">
        <div class="control-group">
          <label class="label">Subject(s)</label>
          <div class="controls">
            <input type="text" name="subject" class="form-control" />
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="control-group">
          <label class="label">ISBN/ISSN</label>
          <div class="controls">
            <input type="text" name="isbn" class="form-control" placeholder="ISBN/ISSN" />
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="col-sm-6">
        <div class="control-group">
          <label class="label">Collection Type</label>
          <div class="controls">
            <select name="colltype" class="form-control"><option value="0">All Collections</option><option value="Fiction">Fiction</option><option value="Reference">Reference</option><option value="Textbook">Textbook</option></select>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="control-group">
          <label class="label">Location</label>
          <div class="controls">
            <select name="location" class="form-control"> <option value="0">All Locations</option><option value="My Library">My Library</option></select>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="col-sm-6">
        <div class="control-group">
        <label class="label">GMD</label>
        <div class="controls">
          <select name="gmd" class="form-control"><option value="0">All GMD/Media</option><option value="Art Original">Art Original</option><option value="Cartographic Material">Cartographic Material</option><option value="CD-ROM">CD-ROM</option><option value="Chart">Chart</option><option value="Computer File">Computer File</option><option value="Computer Software">Computer Software</option><option value="Digital Versatile Disc">Digital Versatile Disc</option><option value="Diorama">Diorama</option><option value="Electronic Resource">Electronic Resource</option><option value="Equipment">Equipment</option><option value="Filmstrip">Filmstrip</option><option value="Flash Card">Flash Card</option><option value="Game">Game</option><option value="Globe">Globe</option><option value="Kit">Kit</option><option value="Manuscript">Manuscript</option><option value="Map">Map</option><option value="Microform">Microform</option><option value="Microscope Slide">Microscope Slide</option><option value="Model">Model</option><option value="Motion Picture">Motion Picture</option><option value="Multimedia">Multimedia</option><option value="Music">Music</option><option value="Picture">Picture</option><option value="Realia">Realia</option><option value="Slide">Slide</option><option value="Sound Recording">Sound Recording</option><option value="Technical Drawing">Technical Drawing</option><option value="Text">Text</option><option value="Transparency">Transparency</option><option value="Video Recording">Video Recording</option></select>
        </div>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="col-sm-6">
        <div class="control-group">
          <label></label>
          <div class="controls">
            <input type="hidden" name="searchtype" value="advance" />
            <button type="submit" name="search" value="search" clas="btn btn-danger btn-block">Search</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>

<script type="text/javascript">

</script>
