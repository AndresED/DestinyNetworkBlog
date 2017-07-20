@include('admin.layouts.header')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          List of post
      </h1>
    </section>

    <!-- Main content -->
      <section class="content">
          @if(session()->has('deleted'))
              <div class="alert alert-success">
                  <strong>Done!</strong> Post was deleted correctly!
              </div>
              @php(session()->forget('deleted'))
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
          <div class="row">
              <div class="col-xs-12">
                  <div class="box">
                      <div class="box-header">
                          <h3 class="box-title">All posts</h3>
                          <div class="box-tools">
                              <div class="input-group input-group-sm" style="width: 180px;">
                                  <input type="text" id="search_post" onkeypress="searchPost_admin()" name="table_search" class="form-control pull-right"
                                         placeholder="Search">

                                  <div class="input-group-btn">
                                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body table-responsive no-padding">
                          <table class="table" style="border-collapse: separate; border-spacing: 0.2em">
                          <tbody>
                            <thead>
                              <tr>
                                  <th>ID</th>
                                  <th>Post</th>
                                  <th>Description</th>
                                  <th>Date</th>
                                  <th>Actions</th>
                              </tr>
                            </thead>
                            <tbody id="list-post">
                              @foreach ($posts as $p)
                                <tr>
                                      <td style="padding: 2em">{{$p->id}}</td>
                                      <td style="padding: 2em">{{str_limit($p->post_title,20)}}</td>
                                      <td style="padding: 2em">{!! str_limit($p->post_content,70) !!}
                                      </td>
                                      <td style="padding: 2em">{{date('F d, Y',strtotime($p->created_at))}}</td>
                                      <td style="padding: 2em;">
                                          <a href="{{action('PostController@edit',$p->id)}}">
                                              <button type="button" class="btn btn-info" style=" font-size: 14px; padding: 4px 8px;"><i class="fa fa-pencil"></i>
                                              </button>
                                          </a>
                                          <a href="{{action('PostController@destroy', $p->id)}}">
                                              <button type="button" class="btn btn-danger" style=" font-size: 14px; padding: 4px 8px;"><i class="fa fa-trash-o"></i>
                                              </button>
                                          </a></td>
                                  </tr>
                              @endforeach
                              </tbody>
                          </table>
                          <div class="box-footer text-center">{{$posts->links()}}</div>
                      </div>
                      <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
              </div>
          </div>
      </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('admin.layouts.footer')