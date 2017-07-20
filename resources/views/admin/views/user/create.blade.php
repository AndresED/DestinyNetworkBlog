@include('admin.layouts.header')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Register User</h3>
                    </div>
                    <!-- /.box-header -->
                    @if(session()->has('registered'))
                        <div class="alert alert-success">
                            <strong>Done!</strong> User was saved correctly!
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
                    <form role="form" method="POST" action="{{action('UserController@store')}}">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="user_login">User login</label>
                                <input type="text" class="form-control" id="user_login" name="user_login" required
                                       placeholder="Enter User Login">
                            </div>
                            <div class="form-group">
                                <label for="user_email">Email address</label>
                                <input name="user_email" type="email" class="form-control" id="user_email" required
                                       placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input name="password" type="password" class="form-control" id="exampleInputPassword1"
                                       required placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group" style="padding: 0.5em">
                            <label>Gender</label>
                            <select id="gender" name="user_gender" class="form-control" required>
                                <option value="masculino">Masculino</option>
                                <option value="femenino">Femenino</option>
                            </select>
                        </div>
                        <div class="form-group" style="padding: 0.5em">
                            <label>Birthday</label>
                            <input name="user_birth" type="date" class="form-control" id="user_birth"
                                   placeholder="Birthday">
                        </div>
                        <div class="form-group" style="padding: 0.5em">
                            <label>Rol</label>
                            <select name="user_rol" class="form-control">
                                <option value="member">Member</option>
                                <option value="admin">Administrator</option>
                            </select>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer text-center">
                                <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->
@include('admin.layouts.footer')