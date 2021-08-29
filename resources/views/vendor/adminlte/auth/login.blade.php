

<head>
    <meta charset="UTF-8">
    <title>LA PERLA</title>
     <link href="{{ asset('/css/login.css') }}" rel="stylesheet" type="text/css" />
     <link href="{{ asset('/css/font-awesome.css') }}" rel="stylesheet" type="text/css" />
  

    <style>
        input::-webkit-input-placeholder {
            color:white;
        }
        input::-moz-placeholder {
            /* Mozilla Firefox 19+ */
            color: white;
        }
        input:-moz-placeholder {
            /* Mozilla Firefox 4 to 18 */
            color: white;
        }
        input:-ms-input-placeholder {
            /* Internet Explorer 10-11 */
            color: white;
        }
    </style>
</head>

<body style="height: 10%">
    <div  class="" style="height: 100%">
        
        
            <video id="main" class="video-tablet
                   video-desktop
                   dexter-LazyImage" preload="metadata" playsinline="" muted="" autoreplay autoplay data-poster="https://cc-prod.scene7.com/is/image/CCProdAuthor/ccOverview-gradient-bg?$png$&amp;jpegSize=300&amp;wid=1440" poster="https://cc-prod.scene7.com/is/image/CCProdAuthor/ccOverview-gradient-bg?$png$&amp;jpegSize=300&amp;wid=1440">
                   
                   <source src="https://images-tv.adobe.com/mpcv3/7eabe451-7420-41ff-bd93-12b88675d221_1601409004.1920x1080at3000_h264.mp4" type="video/mp4">
            </video>
 <style type="text/css">  
    #main {
    height: 100vh;
    background-color: green;

}

.zoom {
  background-color: green;
  transition: transform .2s; /* Animation */
  
}

.zoom:hover {
  transform: scale(1.5); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
</style> 
    <form action="{{ url('/login') }}" action="#" method="POST" style="position: relative; bottom: 400px; left: 80px;" >
        <div id="login-box">
            <h1>INGRESAR </h1>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form">
                <div class="item">
                    <i class="fa fa-user" aria-hidden="true"></i>
                <input type="email" class="form-control" placeholder="{{ trans('Correo') }}" name="email"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
</div>
                <div class="item">
                    <i class="fa fa-key" aria-hidden="true"></i>
                   <input type="password" class="form-control" placeholder="{{ trans('Contraseña') }}" name="password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
            </div>

            <a ><button class="zoom" type="submit">Entrar</button></a>
            <br>
            <br>
             <a href="{{ url('/register') }}">Registrarme</a>
        </div>
    </form>






