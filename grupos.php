<?php
$xml = simplexml_load_file("xml/torneo.xml") 
		   or die("Error: Cannot create object");
		   
	foreach($xml->children() as $jornadas){
		foreach($jornadas->children() as $jornada){
	  		echo "Jornada: " . $jornada['fecha'];
			echo "<br />";
			
			foreach($jornada->children() as $encuentro => $data){
	  			echo "Grupo: ". $data['grupo'];  
	 	 		echo "<br />";
				
				echo "Lugar: ". $data['lugar'];
				echo "<br />";
				
				echo" hora: ".$data['hora'];
				echo "<br />";
				
				echo "Partido: " . $data->equipo1['nombre'] . " vs " .$data->equipo2['nombre'] ;
				echo "<br />";echo "<br />";

			}
		}
	}
?>