<?php 
// por si hay que conectarlo con la bd
class Cliente {

    private $nombre ;
    private $id ;
    private $monto ;

	public function __construct($nombre ,  $id ,  $monto ) {

		$this->nombre  = $nombre ;
		$this->id  = $id ;
		$this->monto  = $monto ;
	}

	public function getNombre ()  {
		return $this->nombre ;
	}

	public function setNombre ( $value) {
		$this->nombre  = $value;
	}

	public function getId ()  {
		return $this->id ;
	}

	public function setId ( $value) {
		$this->id  = $value;
	}

	public function getMonto ()  {
		return $this->monto ;
	}

	public function setMonto ( $value) {
		$this->monto  = $value;
	}


}