<head>
    <meta charset="utf-8">
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- jQuery -->
    <script src="/js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/js/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="/js/raphael.min.js"></script>
    <script src="/js/morris.min.js"></script>
    <script src="/js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="/js/sb-admin-2.js"></script>
</head>

<body>

    <div class="container" style="margin-top:10%">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="/authenticate">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" id="email" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="password" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button class="btn btn-lg btn-success btn-block">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>


<!--<!DOCTYPE html>-->
<!--<html>-->
<!--<head>-->
<!--	<title></title>-->
<!--</head>-->
<!--<body>-->
<!--	<form method="POST" action="/authenticate">-->

<!--    <div>-->
<!--      Email-->
<!--      <input type="email" name="email" id="email">-->
<!--    </div>-->

<!--    <div>-->
<!--      Password-->
<!--      <input type="password" name="password" id="password">-->
<!--    </div>-->

<!--    <div>-->
<!--      <button type="submit">Login</button>-->
<!--      <a href="{{url('/register')}}">회원가입</a>-->
<!--    </div>-->
<!--  </form>-->
<!--</body>-->
<!--</html>-->