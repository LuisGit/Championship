<?php
$xml = simplexml_load_file("xml/sRonda.xml",null,true) 
		   or die("Error: Cannot create object");
		   
	//properties.
	$arrPositions = array();
	
	
	//Array to hold jornadas
	$arrJornadas = array();
	$jornadaIndex=0;		   

	foreach($xml->xpath('rondaFinal/jornada') as $jornada){
		echo "<strong>Jornada: ". $jornadaIndex.' '.$jornada['fecha']."</strong>";
		echo "<br />";
		
		
		//Array to hold each encuentro on a Jornada
		$encuentros = array();
		$index =0;
		
		foreach($jornada->children() as $encuentro => $data){
			$obj = (object) array('fecha'=> $jornada['fecha'],
								  'hora'=> $data['hora'],
								  'lugar'=>$data['lugar'],
								  'equipo1' => $data->equipo1['nombre'], 
								  'imgEquipo1' =>$data->equipo1['banderaImgPath'],
								  'golesEquipo1'=>$data->equipo1['goles'],
								  'equipo2' => $data->equipo2['nombre'],
								  'imgEquipo2' =>$data->equipo2['banderaImgPath'],
								  'golesEquipo2'=>$data->equipo2['goles']);
								  
			$encuentros[$index] = $obj;
			
			
			echo 'Equipo: <img src="'. $encuentros[$index]->imgEquipo1.'" height="24" width="24">'.' '. $encuentros[$index]->equipo1;
			echo ' Goles: '. $encuentros[$index]->golesEquipo1;
			echo "<br />";echo "<br />";
			
			echo 'Equipo: <img src="'. $encuentros[$index]->imgEquipo2.'" height="24" width="24">'.' '. $encuentros[$index]->equipo2;
			echo ' Goles: '. $encuentros[$index]->golesEquipo2;
			echo "<br />";echo "<br />";
		
			echo" hora: ".$encuentros[$index]->hora;
			echo "<br />";
			
			echo "Lugar: ".$encuentros[$index]->lugar;
			
			echo "<br />";
			echo "<br />";
			
			$index =$index+1;
		}
		$arrJornadas[$jornadaIndex] = $encuentros;
		$jornadaIndex = $jornadaIndex+1;
	}
	
	//echo $arrJornadas[1][0]->fecha;
	
	//Parsing Teams.
	parse_positions($xml,'tablaPosiciones',$arrPositions);
	
	function parse_positions($xml,$xmlPath,&$arr){
		$index=0;
		foreach($xml->xpath($xmlPath) as $position){
			foreach($position->children() as $equipo => $data){
				$obj = (object) array('nombre'=> $data->nombre,
									'position'=> $data->lugar,
									'image'=> $data->banderaImgPath);					
								
				$arr[$index] = $obj;	
				$index = $index+1;
			}
		}	
	}
	/*
	echo "nombre: " .$arrPositions[0]->nombre;	
	echo " posicion: " .$arrPositions[0]->position;	
	echo " image: " .$arrPositions[0]->image;
	
	echo "<br>";
	
	echo "nombre: " .$arrPositions[2]->nombre;	
	echo " posicion: " .$arrPositions[2]->position;	
	echo " image: " .$arrPositions[2]->image;
	*/
	
	
?>