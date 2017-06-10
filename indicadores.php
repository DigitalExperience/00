<?php include_once("Model/consultas.php"); 

if ($_POST['Usuario'] == 'Administrador' && $_POST['Contrasena'] == 'admin2017') { 
  
}else{ ?>
<script type="text/javascript">
  window.history.back();
</script>
<?php } ?>
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
    <script src="View/assets/js/fusioncharts.js"></script>
    <script src="View/assets/js/fusioncharts.charts.js"></script> 
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
                <div class="col-lg-12 col-lg-offset-0">
                  <form class="form-inline signup" role="form" method="POST" action="indicadores.php">
                    <center>
                      <h1>Indicadores</h1>
                    </center>
                      <div class="form-group col-lg-12">
                        <div id="G0" class="col-md-6"></div>
                        <div id="G1" class="col-md-6"></div>
                        <div id="G2" class="col-md-8"></div>
                        <div id="G3" class="col-md-4"></div>
                              <script type="text/javascript">
                                FusionCharts.ready(function () {
                                    var myChart = new FusionCharts({
                                      "type": "Column2D",
                                      "renderAt": "G0",
                                      "width": "500",
                                      "height": "180",
                                      "dataFormat": "xml"
                                    });        
                                  myChart.setDataURL("Controller/pie.xml.php");
                                  myChart.render();
                                });

                                FusionCharts.ready(function () {
                                    var myChart = new FusionCharts({
                                      "type": "Pie3D",
                                      "renderAt": "G1",
                                      "width": "500",
                                      "height": "180",
                                      "dataFormat": "xml"
                                    });        
                                  myChart.setDataURL("Controller/pie.xml.php");
                                  myChart.render();
                                });
                              FusionCharts.ready(function () {
                                    var myChart = new FusionCharts({
                                      "type": "StackedColumn2D",
                                      "renderAt": "G2",
                                      "width": "580",
                                      "height": "250",
                                      "dataFormat": "xml"
                                    });        
                                  myChart.setDataURL("Controller/time.xml.php?t=semana");
                                  myChart.render();
                                });
                              FusionCharts.ready(function () {
                                    var myChart = new FusionCharts({
                                      "type": "StackedColumn2D",
                                      "renderAt": "G3",
                                      "width": "300",
                                      "height": "280",
                                      "dataFormat": "xml"
                                    });        
                                  myChart.setDataURL("Controller/time.xml.php?t=mes");
                                  myChart.render();
                                });
                              </script>
                      </div>
                  </form>                 
                </div>                
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
  

  if ($inserted) { ?>
    <script type="text/javascript">
      swal("Datos Guardados", "Gracias por tu respuesta.", "success");
    </script>
  <?php }
}


?>
</body>
</html>
