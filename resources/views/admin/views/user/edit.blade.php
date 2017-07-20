@include('admin.layouts.header')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Profile User</h3>
                    </div>
                    <!-- /.box-header -->
                    @if(session()->has('updated'))
                        <div class="alert alert-success">
                            <strong>Done!</strong> User was updated correctly!
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
                    <form role="form" method="POST" action="{{action('UserController@update',$user->id)}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="box-body">
                            <img src="{{$user->user_avatar}}" alt="{{$user->user_nicename}}"
                                 class="img-responsive img-circle center-block">

                            <div class="form-group">
                                <label for="user_login">User login</label>
                                <input type="text" class="form-control" id="user_login" name="user_login" required
                                       value="{{$user->user_login}}">
                            </div>
                            <div class="form-group">
                                <label for="user_email">Email address</label>
                                <input name="user_email" type="email" class="form-control" id="user_email" required
                                       value="{{$user->user_email}}">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input name="password" type="password" class="form-control" id="exampleInputPassword1"
                                       placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group" style="padding: 0.5em">
                            <label>Gender</label>
                            <select name="user_gender" class="form-control">
                                <option value="{{$user->user_gender}}">{{$user->user_gender}}</option>
                                <option value="masculino">Masculino</option>
                                <option value="femenino">Femenino</option>
                            </select>
                        </div>
                        <div class="form-group" style="padding: 0.5em">
                            <label>Birthday</label>
                            <input name="user_birthday" type="date" class="form-control" id="exampleInputPassword1"
                                   value="{{$user->user_birthday}}">
                        </div>
                        <div class="form-group" style="padding: 0.5em">
                            <label>Rol</label>
                            <select name="user_rol" class="form-control">
                                <option value="{{$user->user_rol}}">{{$user->user_rol}}</option>
                                <option value="member">Member</option>
                                <option value="admin">Administrator</option>
                            </select>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer" style="text-align: center">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <button data-toggle="modal" data-target="#myModal" type="button"
                                    class="btn btn-primary">Delete
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->
@include('admin.layouts.footer')