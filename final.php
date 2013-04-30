<?php
//Header
	$cssPage ='firstRound';
	$title = 'Primera Ronda';
	$classBody="firstRound";
	$ifNav="yes";
	$backPage="index.php";
	include('includes/header.php');
	
?>
<?php
$xml = simplexml_load_file("xml/sRonda.xml",null,true) 
		   or die("Error: Cannot create object");
		   
	//properties.
	$arrPositions = array();
	
	
	//Array to hold jornadas
	$arrJornadas = array();
	$jornadaIndex=0;		   
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
	*/?>
	<div class="small-18 large-6 columns">
	<div class="section-container accordion" data-section="accordion">
	<?php foreach($xml->xpath('rondaFinal/jornada') as $jornada){
		$index=1;
		?>
					<section>
				    	<p class="title" data-section-title><a href="#panel<?php echo $index;?>"><?php echo $jornada['fecha'];?></a></p>
						<div class="content" data-section-content>
						
						<?php
		
		
		//Array to hold each encuentro on a Jornada
		$encuentros = array();
		$index =0;
		
		foreach($jornada->children() as $encuentro => $data){
			?>
				<ul>
					<li class="flag"><img class="left" src="<?php echo $data->equipo1['banderaImgPath'];?>" alt="<?php echo $data->equipo1['nombre']?>" /><span><?php echo $data->equipo1['nombre']?></span></li>
					<li>
						<ul class="gray">
							<li><?php echo $data->equipo1['goles'];?></li>
							<li><?php echo $data->equipo2['goles'];?></li>
						</ul>
						<ul>
							<li class="date"><?php echo $data['hora'];?></li>
							<li class="divider"></li>
							<li><?php echo $data['lugar'];?></li>
						</ul>
					</li>
					<li class="flag"><span><?php echo $data->equipo2['nombre'];?></span><img class="right" src="<?php echo $data->equipo2['banderaImgPath'];?>" alt="<?php echo $data->equipo2['nombre']?>"/></li>
				</ul>
				<?php 
				
				$index =$index+1;
			}
			?>
			</div>
			</section>
			
			<?php
	
		
		 
		$arrJornadas[$jornadaIndex] = $encuentros;
		$jornadaIndex = $jornadaIndex+1;
	}
	
	//echo $arrJornadas[1][0]->fecha;
	

	
	
?>
</div>
		</div>
	
		
<?php
	include('includes/footer.php');
?>