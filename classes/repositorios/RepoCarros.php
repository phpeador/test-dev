<?php
  //codificação utf-8
  class RepoCarros{
    private static $objInstance;
    private function __construct() {}
    public static function getInstance(){
    
      if(self::$objInstance == null){
        self::$objInstance = new RepoCarros();
      }
      return self::$objInstance;
    }
    
    public function consultar($arrStrDados){      
      return $arrStrDados;
    }

    public function salvar($arrStrDados){

      $_SESSION['carros'][$arrStrDados['CAR_ID']] = array(
        $arrStrDados['CAR_ID'],
        $arrStrDados['CAR_Marca'],
        $arrStrDados['CAR_Modelo'],
        $arrStrDados['CAR_Ano']
      );

      return true;
    }
    
    public function excluir($arrStrFiltros){      
      if (isset($_SESSION['carros'][$arrStrFiltros['CAR_ID']])){        
        unset($_SESSION['carros'][$arrStrFiltros['CAR_ID']]);
      }
      return true;
    }          
  }
?>