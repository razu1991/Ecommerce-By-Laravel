
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ecommerce</title>

        <!-- Google Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{URL::to('css/bootstrap.min.css')}}">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="css/font-awesome.min.css">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="{{URL::to('css/owl.carousel.css') }}">
        <link rel="stylesheet" href="{{URL::to('css/style.css') }}">
        <link rel="stylesheet" href="{{URL::to('css/responsive.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>


        <div class="col-md-offset-2 col-md-8">
            <div class="panel panel-info" style="margin-top: 200px;">
                <div class="panel-heading"><h3>Thanks For Purchasing Product From Us. Your Order Reach Your Destination In 24-72 Hours</h3></div>
            </div>
            <h5>Page Will Be Redirect After 5 Seconds</h5>
        </div>
        <script type="text/javascript">
            setTimeout(function () {
                window.location.href = "http://localhost/ecommerce/public/index"
            }, 5000);
        </script> 


    </body>
</html>