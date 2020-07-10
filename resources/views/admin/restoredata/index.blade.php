@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title" style="text-transform: capitalize;">
          <div class="panel-body">
              <form enctype="multipart/form-data" method="post" class="form-horizontal">
                  <div class="form-group">
                      <label class="col-sm-3 control-label">File Database (*.sql)</label>
                      <div class="col-sm-7">
                          <input type="text" name="nip" class="form-control" maxlength="16">
                          <input type="file" name="datafile" size="20" />
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="col-sm-offset-3 col-sm-5">
                          <button type="submit" name="restore" class="btn btn-danger">Restore Database</button>
                      </div>
                  </div>
              </form>
                                  </div>
      </div>
  </div>
</div>
</div>
@stop