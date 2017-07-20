@include('admin.layouts.header')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{\DestinyH\User::all()->count()}}</h3>

                        <p>Users</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-people"></i>
                    </div>
                    <a href="{{action('UserController@index')}}" class="small-box-footer">List all users <i
                                class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{\DestinyH\Post::all()->count()}}</h3>

                        <p>Posts</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-copy"></i>
                    </div>
                    <a href="{{action('PostController@index')}}" class="small-box-footer">List all Posts <i
                                class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{\DestinyH\Game::all()->count()}}</h3>

                        <p>Games</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-game-controller-b"></i>
                    </div>
                    <a href="{{action('GameController@index')}}" class="small-box-footer">List all games <i
                                class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{{\DestinyH\Subscriber::all()->count()}}</h3>

                        <p>Subscribers</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <div class="small-box-footer">Good job!</div>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <section class="content">
            <div class="row">
                <div class="col-md-6">
                    <!-- USERS LIST -->
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Latest Members</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <ul class="users-list clearfix">
                                @php$users = DestinyH\User::orderBy('created_at', 'desc')->take(8)->get()@endphp
                                @foreach($users as $u)
                                    <li>
                                        <img src="{{$u->user_avatar}}" alt="User Image">
                                        <a class="users-list-name"
                                           href="{{route('profile',$u->user_slug)}}">{{$u->user_nicename}}</a>
                                        <span class="users-list-date">{{date('F d, Y',strtotime($u->created_at))}}</span>
                                    </li>
                                @endforeach
                            </ul>
                            <!-- /.users-list -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-center">
                            <a href="{{action('UserController@index')}}" class="uppercase">View All Users</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!--/.box -->
                </div>
                <!-- /.col -->

                <div class="col-md-6">
                    <!-- USERS LIST -->
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">Latest Comments</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <ul class="users-list clearfix">
                                @php $comments = \DestinyH\Comment::OrderBy('created_at','desc')->take(8)->get()@endphp
                                @foreach($comments as $c)
                                    <li>
                                        <img src="{{$c->user->user_avatar}}" alt="User Image">
                                        <a class="users-list-name" href="{{route('sPost',$c->post->post_slug)}}">{{$c->post->post_title}}</a>
                                        <span class="users-list-date">{{date('F d, Y',strtotime($c->created_at))}}</span>
                                    </li>
                                @endforeach
                            </ul>
                            <!-- /.users-list -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-center">
                            <a href="{{action('PostController@index')}}" class="uppercase">View All Posts</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!--/.box -->
                </div>
                <!-- /.col -->
            </div>
        </section>
        <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@include('admin.layouts.footer')