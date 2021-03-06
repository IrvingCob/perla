<!DOCTYPE html>
<html>
<head>
    <title>LA PERLA</title>
    <link href="{{ asset('/css/login.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/css/font-awesome.css') }}" rel="stylesheet" type="text/css" />
    <style>
        video { 
          min-width: 100%;
          min-height: 100%;
          width: auto;
          height: auto;

          
          top: 50%;
          left: 50%;
          transform: translateX(-50%) translateY(-50%); 
              
          z-index: -100;
            
          background-size: cover;

        }
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

        #main {
            position: fixed;    
            background-color: green;

        }

        #formLogin{
            position: absolute;
              top: 50%;
              left: 50%;
              width: 1000px;
              margin: -100px 0px 0px -500px;
        }

        .zoom {
          background-color: green;
          transition: transform .2s; /* Animation */
          
        }

        .zoom:hover {
          transform: scale(1.5); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
        }

        a{
            color: white;
        }



    </style>
</head>
<body>
    <div  class="">    
        <video id="main" class="video-tablet
               video-desktop
               dexter-LazyImage" preload="metadata" playsinline="" muted="" autoreplay autoplay data-poster="https://cc-prod.scene7.com/is/image/CCProdAuthor/ccOverview-gradient-bg?$png$&amp;jpegSize=300&amp;wid=1440" poster="https://cc-prod.scene7.com/is/image/CCProdAuthor/ccOverview-gradient-bg?$png$&amp;jpegSize=300&amp;wid=1440">
               
               <source src="https://images-tv.adobe.com/mpcv3/7eabe451-7420-41ff-bd93-12b88675d221_1601409004.1920x1080at3000_h264.mp4" type="video/mp4">
        </video>
 
    <form action="{{ url('/register') }}" id="formLogin" method="POST">
        <div id="login-box">
            <h1>REGISTRAR </h1>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="item">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group has-feedback">
                    <i class="fa fa-user" aria-hidden="true" style="margin-right: 6px;"></i>
                 <input style="background-color:transparent;" type="text"  class="form-control" placeholder="Nombre" name="name" value="{{ old('name') }}"/>

                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="item">
                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                  <input style="background-color:transparent;" type="email" class="form-control" placeholder="Correo" name="email" value="{{ old('email') }}"/>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="item">
                    <i class="fa fa-key" aria-hidden="true"></i>
                    <input style="background-color:transparent;" type="password" class="form-control" placeholder="Contrase??a" name="password"/>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="item">
                    <i class="fa fa-key" aria-hidden="true"></i>
                    <input style="background-color:transparent;" type="password" class="form-control" placeholder="Repetir coontrase??a" name="password_confirmation"/>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
            </div>

             <div class="row">
                    <div class="col-xs-1">
                        <label>
                            <div class="checkbox_register icheck">
                                <label>
                                    <input required type="checkbox" name="terms"> Acepto t??rminos
                                </label>
                            </div>
                        </label>
                    </div><!-- /.col -->
                    
                    <div class="col-xs-4 col-xs-push-1">
                                   <a> <button type="submit" class="zoom">{{ trans('Registrar') }}</button></a>
                                   <br>
            <br>
             <a href="{{ url('/login') }}">Entrar</a>
                    </div><!-- /.col -->
                </div>


            
        </div>
    </form>






