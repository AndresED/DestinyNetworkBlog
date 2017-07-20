@include('admin.layouts.header')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Post</h3>
                    </div>
                    <!-- /.box-header -->
                    @if(session()->has('updated'))
                        <div class="alert alert-success">
                            <strong>Done!</strong> Post was updated correctly!
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

                    <form role="form" method="POST" action="{{action('PostController@update',$post->id)}}"
                          enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <section class="content">
                            <div class="text-center" style="height: 18em;">
                                <img src="{{$post->post_img}}" class="img-responsive img-circle" style="margin: auto; height: 100%;" width="30%" height="30%">
                            </div>
                            <div class="form-group">
                                <label>Title:</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-tag"></i>
                                    </div>
                                    <input type="text" class="form-control" name="post_title"
                                           placeholder="Mu Online" value="{{$post->post_title}}"
                                           required>
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label>Game</label>
                                <select name="game_id"
                                        class="form-control select2 select2-hidden-accessible"
                                        style="width: 100%;"
                                        tabindex="-1" aria-hidden="true">
                                    <option selected value="{{$post->game_id}}">{{$post->game->game_name}}</option>
                                @foreach ($games as $g)
                                    @if($g->id != $post->game_id)
                                        <option value="{{$g->id}}">{{$g->game_name}}</option>
                                    @endif
                                @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12 control-label" for="image">Main Image</label>
                                <div class="col-md-12">
                                    <input id="image" name="image" class="input-file" type="file">
                                </div>
                                <br>
                                <br>
                            </div>
                            <!-- /.box-header -->
                            <div class="form-group">
                                <label>Post Content:</label>
                                <textarea name="post_content" id="post_content"
                                          placeholder="Insert the complete description">
                                {{$post->post_content}}
                                </textarea>
                                <script>
                                    // Replace the <textarea id="editor1"> with a CKEditor
                                    // instance, using default configuration.
                                    CKEDITOR.replace('post_content');
                                    CKEDITOR.config.width = '100%';
                                </script>
                                <!-- /.input group -->
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer text-center">
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </div>
                            <!-- /.box -->
                            <!-- /.col-->
                        </section>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Main content -->
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@include('admin.layouts.footer')