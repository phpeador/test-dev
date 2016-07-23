<?php
  // codificação utf-8
  class FachadaCarros{
    private static $objInstance;
    private function __construct() {}

    public static function getInstance(){
      if(self::$objInstance == null){
        self::$objInstance = new FachadaCarros();
      } 
      return self::$objInstance;
    }

    public function consultarCarros($arrStrDados){ 
      return NegCarros::getInstance()->consultar($arrStrDados);
    }
    
    public function salvarCarros($arrStrDados){ 
      return NegCarros::getInstance()->salvar($arrStrDados);
    }
    
    public function excluirCarros($arrStrDados){ 
      return NegCarros::getInstance()->excluir($arrStrDados);
    }
  }
?>