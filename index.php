<!Interfaz gráfica que permite al usuario el logueo al sistema.>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="shorcut icon type=" href="favicon.png"/>
        <title>Fundación | Conconcreto</title>
        <script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="css/bootstrap-responsive.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="css/global.css" rel="stylesheet" type="text/css" media="screen"/>
    </head>
    <body>

        <div class="container-fluid content-wrapper2">
            <br><br><br><br><br>
            <!--.Logo Bar & Login-->
            <div class="row-fluid">
                <div class="logobar">
                    <div class="logo pull-left">
                        <a href=""><img src="img/fundacion_logo.png" alt="Premio Maestros para la Vida" style="width: 290px;"></a>              
                    </div>
                </div>
            </div>
            <br>
            <br>

            <!-- CONTENIDO PRINCIPAL -->
            <div class="row-fluid">                
                <div class="breadcrumb">
                    <div class="tab-content"> 

                        <form  method="POST" class="form-horizontal" id="frmIngreso">     
                            <div class="tab-pane">
                                <legend><center><h2>Iniciar Sesión</h2></center></legend> 

                                <div style="margin-left: 30px;">
                                    <div class="control-group">
                                        <label for="tipo">Usuario:</label>
                                        <div class="input-prepend">
                                            <span class="add-on"><i class="icon-user"></i></span><input class="span2" name="user" placeholder="Usuario" id="user" size="16" type="text">
                                        </div>       
                                    </div>
                                    <div class="control-group">
                                        <label for="tipo">Contraseña:</label>
                                        <div class="input-prepend">
                                            <span class="add-on"><i class="icon-lock"></i></span><input class="span2" name="password" placeholder="Contraseña" id="password" size="16" type="password">
                                        </div> 
                                    </div>
                                </div>
                                <br>
                                <legend></legend>
                                <center>
                                    <button type="button" class="btn btn-primary" id="ingresar" name="ingresar"><b>Ingresar</b></button> 
                                </center>  
                            </div>
                        </form>
                    </div>
                </div>
            </div>       
        </div>

        <!--/.Content Wrapper-->
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>  
        <script type="text/javascript" src="js/jquery.ui.widget.js"></script> 
        <script src="js/funciones.js" type="text/javascript"></script>
        <script src="js/funcionesLogin.js" type="text/javascript"></script>
        <script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.2.4/angular.min.js'></script>

        <input id="PUBLIC_PATH" name="PUBLIC_PATH" type="hidden" value="/">
        <div id="LoadingImage" class="ajax-loader" style="display:none;"></div>

    </body>
</html>

<div class="modal fade" id="exampleconfirmacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 8000;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">New message</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <p id="modal-message">New message</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>