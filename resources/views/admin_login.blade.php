
<!DOCTYPE html>
<html lang="en">
    

<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PhiLongGear - Admin</title>

        <!-- Bootstrap -->
        <link href="{{asset('backend/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('backend/css/waves.min.css')}}" type="text/css" rel="stylesheet">
        <link href="{{asset('backend/')}}css/style.css" type="text/css" rel="stylesheet">
        <link href="{{asset('backend/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

    </head>
    <body class="account">
        <div class="container">
            <div class="row">
                <div class="account-col text-center">
                    <h1>PhiLongGear</h1>
                    <h3>Đăng Nhập</h3>
                    <form action="{{URL::to('/admin-dashboard')}}" method="post">
                        @csrf
                        @foreach ($errors->all() as $val)
                            <ul>
                                <li>{{$val}}</li>
                            </ul>
                        @endforeach
                         <div class="form-group">
                            <input type="text" class="form-control" name="admin_email" placeholder="E-MAIL">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="admin_password" placeholder="PASSWORD">
                        </div>
                        <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<p class="text-alert">'.$message.'</p>';
                                Session::put('message',null);
                            }
                        ?>
                        <button type="submit" value="Đăng Nhập" name="login" class="btn btn-primary btn-block ">Login</button>
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="{{asset('backend/js/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('backend/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('backend/js/pace.min.js')}}"></script>
    </body>

<!-- Mirrored from themeforestdemo.com/templates/shapebootstrap/html/be-admin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 May 2017 03:24:12 GMT -->
</html>
