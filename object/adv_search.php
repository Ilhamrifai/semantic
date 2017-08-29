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
          <label class="label">ISBN/ISSN</label>
          <div class="controls">
            <input type="text" name="isbn" class="form-control" placeholder="ISBN/ISSN" />
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="control-group">
        <label class="label">Topic</label>
        <div class="controls">
          <select name="topic" class="form-control">
          <?php $gtTopic=$biblio->getDataTopic();
            foreach($gtTopic as $topic):
          ?>
              <<option value="<?php echo $topic['topic']?>"><?php echo $topic['topic']?></option>
              <?php endforeach;?>
          </select>

        </div>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="col-sm-6">
        <div class="control-group">
          <label></label>
          <div class="controls">
            <input type="hidden" name="searchtype" value="advance" />
            <button type="submit" name="search" value="adv_search" clas="btn btn-danger btn-block">Search</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
