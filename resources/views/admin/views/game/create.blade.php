@include('admin.layouts.header')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Register Game</h3>
                    </div>
                    <!-- /.box-header -->
                    @if(session()->has('created'))
                        <div class="alert alert-success">
                            <strong>Done!</strong> Game was saved correctly!
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
                    <form role="form" method="POST" action="{{action('GameController@store')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="box-body">
                            <div class="form-group">
                                <label>Name:</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-tag"></i>
                                    </div>
                                    <input type="text" class="form-control" name="game_name" placeholder="Mu Online" required>
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label>Desarrollador:</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-cog"></i>
                                    </div>
                                    <input type="text" class="form-control" name="game_developer" placeholder="K Dev, Inc."  required>
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label>Game Link:</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-link"></i>
                                    </div>
                                    <input type="text" class="form-control" name="game_link" placeholder="https://www.destiny-networks.com" required>
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label>Trailer Game:</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-youtube"></i>
                                    </div>
                                    <input type="text" class="form-control" name="game_trailer" placeholder="https://www.youtube.com" required>
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label>Release Date:</label>

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="date" class="form-control pull-right" name="game_release" id="datepicker" required>
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 control-label" for="image">Main Image</label>
                                <div class="col-md-12">
                                    <input id="image" name="image" class="input-file" type="file">
                                </div>
                                <br>
                                <br>
                            </div>
                            <div class="form-group">
                                <label>Short Description:</label>
                                    <textarea name="s_description" id="s_description" placeholder="Insert the short description">
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
                                    <textarea name="b_description" id="b_description" placeholder="Insert the complete description">
                                    </textarea>
                                    <script>
                                        // Replace the <textarea id="editor1"> with a CKEditor
                                        // instance, using default configuration.
                                        CKEDITOR.replace( 'b_description' );
                                        CKEDITOR.config.width = '100%';
                                    </script>
                                <!-- /.input group -->
                            </div>

                            <input name="user_id" type="hidden" value="{{Auth()->id()}}">

                            <!-- /.box-body -->

                            <div class="box-footer text-center">
                                    <button type="submit" class="btn btn-primary">Create</button>
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