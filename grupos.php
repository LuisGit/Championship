<?php
$xml = simplexml_load_file("xml/pRonda.xml",null,true) 
		   or die("Error: Cannot create object");
		   
	//Array to hold jornadas
	$arrJornadas = array();
	$index=0;		   

	foreach($xml->xpath('jornadas') as $jornadas){
		foreach($jornadas->children() as $jornada){
	  		echo "<strong>Jornada: ". $index.' '.$jornada['fecha']."</strong>";
			echo "<br />";
			
			foreach($jornada->children() as $encuentro => $data){
	  			$obj = (object) array('equipo1' => $data->equipo1['nombre'], 
									  'imgEquipo1' =>$data->equipo1['banderaImgPath'],
									  'golesEquipo1'=>$data->equipo1['goles'],
									  'equipo2' => $data->equipo2['nombre'],
									  'imgEquipo2' =>$data->equipo2['banderaImgPath'],
									  'golesEquipo2'=>$data->equipo2['goles']);
									  
				$arrJornadas[$index] = $obj;///$obj->property
				
				
				echo 'Equipo: <img src="'. $arrJornadas[$index]->imgEquipo1.'" height="24" width="24">'.' '. $arrJornadas[$index]->equipo1;
				echo ' Goles: '. $arrJornadas[$index]->golesEquipo1;
				echo "<br />";echo "<br />";
				
				echo 'Equipo: <img src="'. $arrJornadas[$index]->imgEquipo2.'" height="24" width="24">'.' '. $arrJornadas[$index]->equipo2;
				echo ' Goles: '. $arrJornadas[$index]->golesEquipo2;
				echo "<br />";echo "<br />";
			
				echo" hora: ".$data['hora'];
				echo "<br />";
				
				echo "Lugar: ". $data['lugar'];
				echo "<br />";
				echo "<br />";
				
				
				
			}
			$index = $index+1;
		}
	}
?>