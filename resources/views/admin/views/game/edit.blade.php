@include('admin.layouts.header')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content">

      <div class="row">
        <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Game</h3>
                </div>
                <!-- /.box-header -->
                  @if(session()->has('updated'))
                      <div class="alert alert-success">
                          <strong>Done!</strong> Game was updated correctly!
                      </div>
                      @php(session()->forget('registered'))
                  @endif
                  @if (count($errors) > 0)
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
              @endif
                <!-- form start -->
                  <form role="form" method="POST" action="{{action('GameController@update',$game->id)}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                  <div class="box-body">
                      <div class="text-center" style="height: 18em;">
                      <img src="{{$game->game_img}}" class="img-responsive img-circle" style="margin: auto; height: 100%;" width="30%" height="30%">
                      </div>
                      <div class="form-group">
                          <label>Name:</label>

                          <div class="input-group">
                              <div class="input-group-addon">
                                  <i class="fa fa-tag"></i>
                              </div>
                              <input type="text" class="form-control" name="game_name" value="{{$game->game_name}}" required>
                          </div>
                          <!-- /.input group -->
                      </div>
                      <div class="form-group">
                          <label>Desarrollador:</label>

                          <div class="input-group">
                              <div class="input-group-addon">
                                  <i class="fa fa-cog"></i>
                              </div>
                              <input type="text" class="form-control" name="game_developer" value="{{$game->game_developer}}"  required>
                          </div>
                          <!-- /.input group -->
                      </div>
                      <div class="form-group">
                          <label>Game Link:</label>

                          <div class="input-group">
                              <div class="input-group-addon">
                                  <i class="fa fa-link"></i>
                              </div>
                              <input type="text" class="form-control" name="game_link"  value="{{$game->game_link}}"required>
                          </div>
                          <!-- /.input group -->
                      </div>
                      <div class="form-group">
                          <label>Trailer Game:</label>

                          <div class="input-group">
                              <div class="input-group-addon">
                                  <i class="fa fa-youtube"></i>
                              </div>
                              <input type="text" class="form-control" name="game_trailer"  value="{{$game->game_trailer}}" required>
                          </div>
                          <!-- /.input group -->
                      </div>
                      <div class="form-group">
                          <label>Release Date:</label>

                          <div class="input-group date">
                              <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                              </div>
                              <input type="date" class="form-control pull-right" name="game_release" id="datepicker" value="{{date('Y-m-d',strtotime($game->game_release))}}" required>
                          </div>
                          <!-- /.input group -->
                      </div>
                      <div class="form-group">
                          <label class="col-md-12 control-label" for="m-image">Main Image</label>
                          <div class="col-md-12">
                              <input id="m-image" name="image" class="input-file" type="file">
                          </div>
                          <br>
                          <br>
                      </div>
                      <div class="form-group">
                          <label>Short Description:</label>
                          <textarea name="s_description" id="s_description">
                              {!! $game->game_description !!}
                          </textarea>
                          <script>
                              // Replace the <textarea id="editor1"> with a CKEditor
                              // instance, using default configuration.
                              CKEDITOR.replace( 's_description' );
                              CKEDITOR.config.removePlugins = 'elementspath'
                              CKEDITOR.config.width = '100%';
                          </script>
                          <!-- /.input group -->
                      </div>
                      <div class="form-group">
                          <label>Complete Description:</label>
                          <textarea name="b_description" id="s_description">
                              {!! $game->game_big_description !!}
                          </textarea>
                          <script>
                              // Replace the <textarea id="editor1"> with a CKEditor
                              // instance, using default configuration.
                              CKEDITOR.replace( 'b_description' );
                              CKEDITOR.config.width = '100%';
                          </script>
                          <!-- /.input group -->
                      </div>
                  <!-- /.box-body -->

                  <div class="box-footer text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                  </div>
                </form>
              </div>
            </div>
      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->
  @include('admin.layouts.footer')