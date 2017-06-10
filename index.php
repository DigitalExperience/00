<?php include_once("Model/consultas.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Family Clinics</title>

    <!-- Bootstrap -->
    <link href="View/assets/css/bootstrap.css" rel="stylesheet">
    <link href="View/assets/css/bootstrap-theme.css" rel="stylesheet">

    <script type="text/javascript" src="View/assets/css/sweet-alert.min.js"></script>
    <link  href="View/assets/css/sweet-alert.css" type="text/css" media="all" rel="stylesheet">
    
    <link href="View/assets/css/style.css" rel="stylesheet">
  </head>
  <body>

    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"> <img class="logo" src="http://familyclinics.com.mx/wp-content/uploads/2016/08/logo_final.png"> Family Clinics</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="sign_in.php">Sign in</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div id="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                  <form class="form-inline signup" role="form" method="POST">
                    <h1>Encuesta de satisfacción de servicio</h1>
                    <h2 class="subtitle">¿Cómo valorarías la atención que recibiste?</h2>
                    
                      <div class="form-group col-lg-12">
                        <table class="faces-table">
                          <tr>
                            <td><img class="emoji_img" data-id="1" src="View/assets/img/Very_Angry_Emoji.png" alt=""></td>
                            <td><img class="emoji_img" data-id="2" src="View/assets/img/Angry_Emoji.png" alt=""></td>
                            <td><img class="emoji_img" data-id="3" src="View/assets/img/Neutral_Face_Emoji.png" alt=""></td>
                            <td><img class="emoji_img" data-id="4" src="View/assets/img/Slightly_Smiling_Face_Emoji.png" alt=""></td>
                            <td><img class="emoji_img" data-id="5" src="View/assets/img/Smiling_Emoji_with_Eyes_Opened.png" alt=""></td>
                          </tr>
                          <tr>
                            <td><input type="radio" required name="satisfaccion" class="emoji_radio" id="emoji_1" value="1"></td>
                            <td><input type="radio" required name="satisfaccion" class="emoji_radio" id="emoji_2" value="2"></td>
                            <td><input type="radio" required name="satisfaccion" class="emoji_radio" id="emoji_3" value="3"></td>
                            <td><input type="radio" required name="satisfaccion" class="emoji_radio" id="emoji_4" value="4"></td>
                            <td><input type="radio" required name="satisfaccion" class="emoji_radio" id="emoji_5" value="5"></td>
                          </tr>
                        </table>
                      </div>

                    <h2 class="subtitle">Comentarios:</h2>  
                      <div class="form-group col-lg-12">
                        <table class="faces-table">
                          <tr>
                            <td colspan="5">
                              <textarea name="comentarios" class="comentarios" rows="3"></textarea>
                            </td>
                          </tr>
                        </table>
                      </div>
                      <center>
                        <button type="submit" class="btn btn-theme">Finalizar</button>
                      </center>
                  </form>                 
                </div>
                <!--div class="col-lg-4 col-lg-offset-1">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                      <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                      </ol-->                 
                      <!-- slides -->
                      <!--div class="carousel-inner">
                        <div class="item active">
                          <img src="View/assets/img/slide1.png" alt="">
                        </div>
                        <div class="item">
                          <img src="View/assets/img/slide2.png" alt="">
                        </div>
                        <div class="item">
                          <img src="View/assets/img/slide3.png" alt="">
                        </div>
                      </div>
                    </div>      
                </div-->
                
            </div>
        </div>
    </div>
    <div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
              <p class="copyright">Family Clinics <span class="reg">&reg;</span></p>
            </div>
            <div class="col-md-6" style="display: none;">
                <p class="copyright">&copy; Siimple Theme</p>
            </div>
            <div class="col-md-6" style="display: none;">
                <div class="credits">
                    <!-- 
                        All the links in the footer should remain intact. 
                        You can delete the links only if you purchased the pro version.
                        Licensing information: https://bootstrapmade.com/license/
                        Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Siimple
                    -->
                    <a href="https://bootstrapmade.com/free-business-bootstrap-themes-website-templates/">Business Bootstrap Themes</a> by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                </div>
            </div>
        </div>      
    </div>  
    </div>

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="View/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      $('.emoji_img').click(function(e){
        var id_item = this.getAttribute("data-id");
        var selector = '#emoji_'+ id_item;

        //$(selector).attr("checked", "checked");
        $(selector).prop('checked', true);
      });
    </script>

<?php 
if (sizeof($_POST)>0) {
  $inserted = nuevoRegistro(addslashes($_POST['satisfaccion']), addslashes($_POST['comentarios']), date('Y-m-d H:i:s'), $linkDB);

  if ($inserted) { ?>
    <script type="text/javascript">
      swal("Datos Guardados", "Gracias por tu respuesta.", "success");
    </script>
  <?php }
}


?>
</body>
</html>
