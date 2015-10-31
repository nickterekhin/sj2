<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="/css/admin.css" rel="stylesheet" />

    <script src="/js/jquery-2.1.4.min.js" type="application/javascript"></script>
    <script src="/js/bootstrap.min.js" type="application/javascript"></script>
    <script type="text/javascript">

    </script>
</head>
<body class="admin-login">
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4">
                <div class="container-form-login">
                    <img class="profile-img center-block" src="/images/logo.footer.png"  alt="">
                    <form class="form-login" method="POST" action="">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Email" name="email" autofocus>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Пароль" name="password">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="remember-me"/>Запомнить меня
                            </label>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Вход</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>