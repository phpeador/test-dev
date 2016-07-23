<?php
  session_start();

  require_once("inc/autoload.inc.php");
  
  //unset($_SESSION['carros']);
  //$_SESSION['carros'] = null; 
  
  //echo '<pre>'; print_r($_SESSION['carros']); echo '</pre>';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Controle dos Carros</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Controle de Carros">
    <meta name="author" content="Diego Raphael - diegoraphael.php@gmail.com">

    <script src="assets/js/jquery-2.1.4.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="assets/css/datatables.min.css"/> 
	<script type="text/javascript" src="assets/js/datatables.min.js"></script>
    
    <script src="assets/js/carros.js"></script>

    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  </head>
  <body>
  <div id="divConsulta" style="text-align:left;">
    <div>
        <div class="panel panel-default">
            <div class="panel-heading">Consulta de Carros</div>
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example"></table>
                </div>                
                <div class="dataTable_wrapper">
                    <table class="table table-bordered table-hover" id="consultar-carros"></table>
                </div>                
            </div>
        </div>
    </div>    
  </div>
  <div id="divFormulario" style="text-align:left;">
    <form id="form-carros" name="form-carros" role="form" method="POST">
        <input type="hidden" name="hddId" id="hddId" value="" />
        <div class="panel-heading">Formul&aacute;rio de Carros</div>
        <div class="control-group">
          <label class="control-label" for="selMarca">Marca</label>
          <div class="controls">
            <select id="CAR_Marca" name="CAR_Marca" class="input-large">
              <option value="">Selecione</option>
              <option value="Marca 1">Marca 1</option>
              <option value="Marca 2">Marca 2</option>
              <option value="Marca 3">Marca 3</option>
            </select>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="selModelo">Modelo</label>
          <div class="controls">
            <select id="CAR_Modelo" name="CAR_Modelo" class="input-large">
              <option value="">Selecione</option>
              <option value="Modelo 1">Modelo 1</option>
              <option value="Modelo 2">Modelo 2</option>
              <option value="Modelo 3">Modelo 3</option>
            </select>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="CAR_Ano">Ano</label>
          <div class="controls">
            <select id="CAR_Ano" name="CAR_Ano" class="input-small">
              <option>2000</option>
              <option>2001</option>
              <option>2002</option>
              <option>2003</option>
              <option>2004</option>
            </select>
          </div>
        </div>
        <div class="control-group">
          <div class="controls">
            <button type="submit" id="btnSalvar" name="btnSalvar" class="btn btn-primary" onclick="mLibSalvar();">Salvar</button>            
            <button id="btnCancelar" name="btnCancelar" class="btn btn-danger" onclick="mLibConsultarCarros();">Cancelar</button>
          </div>
        </div>
    </form>
  </div>
  <script data-main="assets/js/main-built.js" src="assets/js/lib/require.js" ></script>
  <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    
      ga('create', 'UA-13083321-13', 'minikomi.github.io');
      ga('send', 'pageview');

      mLibConsultarCarros();
  </script>
  </body>
</html>