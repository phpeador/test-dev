<?php
  // codificação utf-8
  session_start();
  
  require_once("../inc/autoload.inc.php");

  $strAcao = trim($_POST["strAcao"]);

  $intI                     = 0;
  $intErros                 = 0;
  $boolSemRegistros         = true;
  $arrStrJson               = null;
  $arrStrCarros             = null;
  $arrStrDados              = null;   
  $arrStrJson["sucesso"]    = "false";
  $arrStrJson["titulo"]     = "ATEN&Ccedil;&Atilde;O!";
  $arrStrJson["mensagem"]   = "Mensagem não informada.";  

  if($strAcao == "acaoConsultarCarros"){

    $arrObjCarros = FachadaCarros::getInstance()->consultarCarros($_SESSION['carros']);

    if(count($arrObjCarros) > 0){
      if($arrObjCarros[1][0] != ""){
        $arrStrJson["sucesso"]  = "true";
        $arrStrJson["titulo"]   = "";
        $arrStrJson["mensagem"] = "";

        $boolSemRegistros = false;

        for($intI=0;$intI<count($arrObjCarros);$intI++){
          
          $strPosicao = $intI + 1;
            
          $arrStrDados["CAR_ID"]     = $arrObjCarros[$strPosicao][0];
          $arrStrDados["CAR_Marca"]  = utf8_encode($arrObjCarros[$strPosicao][1]);
          $arrStrDados["CAR_Modelo"] = utf8_encode($arrObjCarros[$strPosicao][2]);
          $arrStrDados["CAR_Ano"]    = $arrObjCarros[$strPosicao][3];

          //guarda o registro
          $arrStrJson["rows"][$intI] = $arrStrDados;
        }
        //Obtem o total de registros referente a consulta
        $arrStrJson["num_rows"] = count($arrObjCarros); 
      }else{
        $boolSemRegistros = true;  
      }
    }else{
      $boolSemRegistros = true;
    }

    if ($boolSemRegistros){
      $arrStrJson["titulo"]   = "ATENÇÃO";
      $arrStrJson["mensagem"] = "Não há dados para visualização.";
    }

  }elseif($strAcao == "acaoSalvarCarros"){
    $intCodigoCarro = trim($_POST['CAR_ID']);
    
    if (!isset($_SESSION['carros'])){
      $_SESSION['carros'] = null;  
      $intCodigoCarro = 1;
    }
    
    if ($intCodigoCarro == null || $intCodigoCarro == ''){
      $intCodigoCarro = count($_SESSION['carros']) + 1;
    }

    $arrStrFiltros["CAR_ID"]     = $intCodigoCarro;    
    $arrStrFiltros["CAR_Marca"]  = trim($_POST['CAR_Marca']);
    $arrStrFiltros["CAR_Modelo"] = trim($_POST['CAR_Modelo']);    
    $arrStrFiltros["CAR_Ano"]    = trim($_POST['CAR_Ano']);

    if (FachadaCarros::getInstance()->salvarCarros($arrStrFiltros, $objConexao)){
      $arrStrJson["sucesso"]  = "true"; 
      $arrStrJson["titulo"]   = "Sucesso";
      $arrStrJson["mensagem"] = "Registro cadastrado com sucesso.";
    }

  }elseif($strAcao == "acaoExcluirCarros"){
  
    $arrStrFiltros['CAR_ID'] = $_POST['CAR_ID'];
    
    if (FachadaCarros::getInstance()->excluirCarros($arrStrFiltros)){
      $arrStrJson["sucesso"]  = "true"; 
      $arrStrJson["titulo"]   = "Sucesso";
      $arrStrJson["mensagem"] = "Registro excluído com sucesso.";
    }
  }

  echo json_encode($arrStrJson);
?>