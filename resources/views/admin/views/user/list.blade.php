@include('admin.layouts.header')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <!-- USERS LIST -->
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Latest Members</h3>
                    </div>
                    @if(session()->has('deleted'))
                        <div class="alert alert-success">
                            <strong>Done!</strong> User was deleted correctly!
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
                <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <form action="#" method="get" class="sidebar-form" style="margin-bottom: 2em;">
                            <div class="input-group">
                                <input type="text" name="q" onkeypress="searchUser()" id="search_User"
                                       class="form-control" placeholder="Search member">
                                <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                                        class="fa fa-search"></i>
                            </button>
                          </span>
                            </div>
                        </form>
                        <ul class="users-list clearfix" id="list-user">
                            @foreach($users as $u)
                                <li>
                                    <img src="{{$u->user_avatar}}" alt="{{$u->user_nicename}}">
                                    <a class="users-list-name"
                                       href="{{route('profile',$u->user_slug)}}">{{$u->user_nicename}}</a>
                                    <span class="users-list-date">{{date('F d, Y',strtotime($u->created_at))}}</span>
                                    <a href="{{action('UserController@edit',$u->id)}}">
                                        <button type="button" class="btn btn-info"><i class="fa fa-pencil"></i></button>
                                    </a>
                                    <a href="{{action('UserController@destroy', $u->id)}}">
                                        <button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i>
                                        </button>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <!-- /.users-list -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                        <ul class="pagination">{{ $users->links() }}</ul>

                    </div>
                    <!-- /.box-footer -->
                </div>
                <!--/.box -->
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->
@include('admin.layouts.footer')