<?php
//Header
	$cssPage ='';
	$title = 'Primera Ronda';
	$classBody="firstRound";
	$ifNav="yes";
	include('includes/header.php');
	
	$xml = simplexml_load_file("xml/pRonda.xml",null,true)
	or die("Error: Cannot create object");
	
?>

<div class="section-container auto" data-section>
<?php 
	$i=0;
	foreach($xml->children() as $child)
	{?>
		<section>
		<p class="title" data-section-title><a href="#panel<?php echo $i?>">Grupo A</a></p>
		
		<?php if( $child->longURL == $encodeURL){
			$hint="true";
			return $child->shortURL;
		}
	}
	?>
  <section>
    <p class="title" data-section-title><a href="#panel1">Grupo A</a></p>
    <div class="content" data-section-content>
      <table>
		  <thead>
		    <tr>
		      <th width="200">Table Header</th>
		      <th>Table Header</th>
		      <th width="150">Table Header</th>
		      <th width="150">Table Header</th>
		    </tr>
		  </thead>
		  <tbody>
		    <tr>
		      <td>Content Goes Here</td>
		      <td>This is longer content Donec id elit non mi porta gravida at eget metus.</td>
		      <td>Content Goes Here</td>
		      <td>Content Goes Here</td>
		    </tr>
		    <tr>
		      <td>Content Goes Here</td>
		      <td>This is longer Content Goes Here Donec id elit non mi porta gravida at eget metus.</td>
		      <td>Content Goes Here</td>
		      <td>Content Goes Here</td>
		    </tr>
		    <tr>
		      <td>Content Goes Here</td>
		      <td>This is longer Content Goes Here Donec id elit non mi porta gravida at eget metus.</td>
		      <td>Content Goes Here</td>
		      <td>Content Goes Here</td>
		    </tr>
		  </tbody>
		</table>
    </div>
  </section>
  <section>
    <p class="title" data-section-title><a href="#panel2">Grupo B</a></p>
    <div class="content" data-section-content>
      <ul class="side-nav">
        <li><a href="#">Link 1</a></li>
        <li><a href="#">Link 2</a></li>
        <li><a href="#">Link 3</a></li>
        <li class="divider"></li>
        <li><a href="#">Link 1</a></li>
      </ul>
    </div>
  </section>
  <section>
    <p class="title" data-section-title><a href="#panel2">Grupo C</a></p>
    <div class="content" data-section-content>
      <ul class="side-nav">
        <li><a href="#">Link 1</a></li>
        <li><a href="#">Link 2</a></li>
        <li><a href="#">Link 3</a></li>
        <li class="divider"></li>
        <li><a href="#">Link 1</a></li>
      </ul>
    </div>
  </section>
</div>



<?php

		   
	//properties.
	$arrGrupoA = array();
	$arrGrupoB = array();
	$arrGrupoC = array();
	
	
	//Array to hold jornadas
	$arrJornadas = array();
	$jornadaIndex=0;		   

	foreach($xml->xpath('jornadas') as $jornadas){
		foreach($jornadas->children() as $jornada){
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
	}
	
	//echo $arrJornadas[1][0]->fecha;
	
	//Parsing Teams.
	parse_teams($xml,'grupos/grupoA',$arrGrupoA);
	parse_teams($xml,'grupos/grupoB',$arrGrupoB);
	parse_teams($xml,'grupos/grupoC',$arrGrupoC);
	
	function parse_teams($xml,$xmlPath,&$arr){
		$index=0;
		foreach($xml->xpath($xmlPath) as $grupoA){
			foreach($grupoA->children() as $equipo => $data){
				$obj = (object) array('nombre'=> $data->nombre,
									'image'=> $data->banderaImgPath,
									'pj'=> $data->pj,
									'pg'=> $data->pg,
									'pe'=> $data->pe,
									'pp'=> $data->pp,
									'pts'=> $data->pts);
				$arr[$index] = $obj;	
				$index = $index+1;
			}
		}	
	}
	
	echo "nombre: " .$arrGrupoA[0]->nombre;	
	echo "image: " .$arrGrupoA[0]->image;	
	echo "pts: " .$arrGrupoA[0]->pts;
	
	echo "nombre: " .$arrGrupoB[0]->nombre;	
	echo "image: " .$arrGrupoB[0]->image;	
	echo "pts: " .$arrGrupoB[0]->pts;
	
	
?>
<?php
	include('includes/footer.php');
?>