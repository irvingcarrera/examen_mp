<?php
	
	class ChangeString{
		
		protected $arrayAbecedario;
		protected $lengthArrayAbecerdario;
		
		public function __construct() {
			$this->arrayAbecedario =array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'ñ', 'o', 'p', 'q', 'r','s', 't', 'u','v', 'w', 'x', 'y', 'z');
			$this->lengthArrayAbecerdario = count($this->arrayAbecedario);
		}
		
		public function build($cadena) {
			
			$arrayInput=str_split($cadena);
						
			$strRespuesta='';
			
			foreach ($arrayInput as $char){
				
				if(!in_array(strtolower($char),$this->arrayAbecedario) ){
					$strRespuesta.=$char;
					continue;
				}
				
				$esMayuscula=false;
				if(ctype_upper( $char )){
					$esMayuscula=true;
					$char=strtolower($char);
				}
				
				$posicion=0;
				$encontroPosicion=false;
				for($x = 0; $x < $this->lengthArrayAbecerdario; $x++) {
					if($this->arrayAbecedario[$x]==$char){
						$posicion=$x;
						$encontroPosicion=true;
					}
				}
				
				if(!$encontroPosicion){
					continue;
				}
				++$posicion;
				
				if($posicion==$this->lengthArrayAbecerdario){
					//// se hallo en la ultima posicion el siguiente debe ser el inicial
					$posicion=0;
				}
				
				/// cambiar el char actual para agregarlo
				$nuevoChar=$this->arrayAbecedario[$posicion];
				/// cambiar a mayuscula si es el caso
				if($esMayuscula){
					$nuevoChar=strtoupper($nuevoChar);
				}
				
				
				$strRespuesta.=$nuevoChar;
				
			}
			
			return $strRespuesta;
			
		}
		
	}
	
		
	$cString = new ChangeString();
	
	$entrada="123 abcd*3";
	$salida=$cString->build($entrada);	
	echo "entrada:'".$entrada."' salida:'".$salida."' <br>";

	
	$entrada="**Casa 52";
	$salida=$cString->build($entrada);	
	echo "entrada:'".$entrada."' salida:'".$salida."' <br>";
	
	
	$entrada="**Casa 52Z";
	$salida=$cString->build($entrada);
	echo "entrada:'".$entrada."' salida:'".$salida."' <br>";
	
	