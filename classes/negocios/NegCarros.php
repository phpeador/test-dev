<?php
  // codificação utf-8
  class NegCarros{
    private static $objInstance;
    private function __construct() {}

    public static function getInstance(){
      if(self::$objInstance == null){
        self::$objInstance = new NegCarros();
      }
      return self::$objInstance;
    }

    public function consultar($arrStrDadosSessao){  
      $arrObjCarros = null;
      $arrStrDados  = RepoCarros::getInstance()->consultar($arrStrDadosSessao);
      
      /*if ($arrStrDados != null){
        if (count($arrStrDados) > 0){
          for ($intI=0;$intI<count($arrStrDados);$intI++){
            $arrObjCarros[$intI] = $this->factoryCarros($arrStrDados[$intI]);
          }        
        }
      }*/
      
      //echo '<pre>'; print_r($arrStrDados); echo '</pre>'; exit(' xxxxx');
      
      return $arrStrDados; //$arrObjCarros;
    }

    public function salvar($arrStrDados){
      return RepoCarros::getInstance()->salvar($arrStrDados);
    }
    
    public function excluir($arrStrFiltros){
      return RepoCarros::getInstance()->excluir($arrStrFiltros);
    }

    public function factoryCarros($arrStrDados){  
      $objCarros = new Carros();

      $objCarros->setId($arrStrDados["CAR_ID"]);
      $objCarros->setMarcaId($arrStrDados["CAR_Marca"]);
      $objCarros->setModeloId($arrStrDados["CAR_Modelo"]);
      $objCarros->setAno($arrStrDados["CAR_Ano"]);

      return $objCarros;
    }
  }
?>