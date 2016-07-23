<?php
  // codificação utf-8
  class Carros{
    private $intId;
    private $intMarcaId;
    private $intModeloId;
    private $intAno;
    public static $instance;        

    private function __contruct( $intId = "", $intMarcaId = "", $intModeloId = "", $intAno = ""){
      $this->intId       = $intId;
      $rhis->intMarcaId  = $intMarcaId;
      $this->intModeloId = $intModeloId;
      $this->intAno      = $intAno;
	}

	public static function singleton() {
	  if (!isset(self::$instance)) {			
	    self::$instance = new Carros();
	  }
      return self::$instance;
	}

    public function setId($intId){
      $this->intId = $intId;
    }

    public function getId(){
      return $this->intId;
    }
    
    public function setMarcaId($intMarcaId){
      $this->intMarcaId = $intMarcaId;
    }

    public function getMarcaId(){
      return $this->intMarcaId;
    }
    
    public function setModeloId($intModeloId){
      $this->intModeloId = $intModeloId;
    }

    public function getModeloId(){
      return $this->intModeloId;
    }
    
    public function setAno($intAno){
      $this->intAno = $intAno;
    }

    public function getAno(){
      return $this->intAno;
    }
  }
?>