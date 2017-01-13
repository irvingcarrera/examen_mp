<?php
	
	class CompleteRange{
		
		protected $arrayRespuesta;
		
		public function __construct() {
			
		}
		
		public function build($arrayInput) {
		
			$numAnterior=0;
			$numActual=0;
			$diferencia=1;
			$valoresIniciales=true;
			$this->arrayRespuesta=array();
			
			foreach ($arrayInput as $num){
			
				if(!is_int($num) ){
					continue;  // es entero
				}
				if($num < 1){
					continue;  /// mayor que cero
				}
				
				$numActual=$num;
				if($valoresIniciales){
					$numAnterior=$num;
					$valoresIniciales=false;
					$this->arrayRespuesta[]=$numActual;
				}
				
				$diferencia=($numActual-$numAnterior);
				
				if($diferencia < 1 ){
					continue;   /// no son consecutivos
				}
				
				for($i=1;$i<=$diferencia;++$i){
					$this->arrayRespuesta[]=$numAnterior+$i;
				}
				
				$numAnterior=$num;
				
			}
			return $this->arrayRespuesta;
			
		}
		
	}
	
	$cRange = new CompleteRange();
	
	$entrada=array(1, 2, 4, 5);
	$salida=$cRange->build($entrada);	
	echo "entrada:<br>";
	var_dump($entrada);
	echo "salida:<br>";
	var_dump($salida);	
	
	$entrada=array(2, 4, 9);
	$salida=$cRange->build($entrada);	
	echo "entrada:<br>";
	var_dump($entrada);
	echo "salida:<br>";
	var_dump($salida);	
	
	$entrada=array(55, 58, 60);
	$salida=$cRange->build($entrada);	
	echo "entrada:<br>";
	var_dump($entrada);
	echo "salida:<br>";
	var_dump($salida);	
	