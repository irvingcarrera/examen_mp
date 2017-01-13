<?php
	
	class ClearPar{
		
		protected $charInicio;
		protected $charFin;
		
		public function __construct() {
			$this->charInicio = "(";
			$this->charFin = ")";
		}
		
		public function build($cadena) {
		
			$arrayInput=(str_split($cadena));
			$charAnterior='';
			$charActual='';
			$agregarPar=false;
			$parActual='';
			$strRespuesta='';
			
			foreach ($arrayInput as $char){
				
				if($char!=$this->charInicio && $char!=$this->charFin ){
					continue;
				}
				
				$charActual=$char;
				
				if($charActual!= $charAnterior){
					if($parActual==''){
						if($charActual==$this->charInicio){
							$parActual=$charActual;
						}
					}else{
						if($charActual==$this->charFin){
							$parActual.=$charActual;
							$agregarPar=true;
						}
					}
				}
				
				if($agregarPar){
					$strRespuesta.=$parActual;
					$parActual='';
					$agregarPar=false;
				}
				
				$charAnterior=$char;
			}
			
			return $strRespuesta;
			
		}
		
	}
	
	
	$clrPar = new ClearPar();
	
	$entrada="()())()";
	$salida=$clrPar->build($entrada);	
	echo "entrada:'".$entrada."' salida:'".$salida."' <br>";

	
	$entrada="()(()";
	$salida=$clrPar->build($entrada);	
	echo "entrada:'".$entrada."' salida:'".$salida."' <br>";

	
	$entrada=")(";
	$salida=$clrPar->build($entrada);	
	echo "entrada:'".$entrada."' salida:'".$salida."' <br>";

	$entrada="((()";
	$salida=$clrPar->build($entrada);	
	echo "entrada:'".$entrada."' salida:'".$salida."' <br>";

