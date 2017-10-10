<?php 

namespace Hcode;

use Rain\Tpl;

class Page {

	// variáveis 
	
	private $tpl;
	private $options =  [];
	private $defaults = [
		"data" => []
	];

	// Metodo Construtor
	
	public function __construct ($opts = array(), $tpl_dir = "/views/") {
		 
		 $this-> options = array_merge($this->defaults, $opts); 
		// config
		$config = array(
			"tpl_dir" 		=> $_SERVER["DOCUMENT_ROOT"] . $tpl_dir,
			"cache_dir"     => $_SERVER["DOCUMENT_ROOT"] . "/views-cache/",
			"debug"         => False // set to false to improve the speed
		);

		Tpl::configure( $config );

		$this -> tpl = new Tpl; 

		$this -> setData($this->options["data"]);

		$this->tpl->draw("header");
  		
	}
	 
	//Metodos gerais 
	//
	public function setData($data = array()) {

		foreach ($data as $key => $value) {
			$this->tpl->assign($key,$value);
		}		
	}
	
	public  function setTpl ($name,$data = array(), $returnHTML = False) {

		$this->setData($data);
		return $this->tpl->draw($name,$returnHTML);
	}

	// Metodo Destrutor 
	// 

	public function __destruct ()  {

		$this->tpl->draw("footer");
	}
	

}


 ?>