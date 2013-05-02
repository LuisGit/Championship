<?php
//Header
	$cssPage ='firstRound';
	$title = 'Primera Ronda';
	$classBody="final";
	$ifNav="yes";
	$backPage="seleccionRonda.php";
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
		?>
		<div class="row">
			<div class="small-18 large-6 columns">
				<h2><span>Tabla Final</span></h2>
		<?php
		foreach($xml->xpath($xmlPath) as $position){
			foreach($position->children() as $equipo => $data){
				if($index==0){
				?><div class="row firstPlace">
					<ul class="small-block-grid-3 large-block-grid-3">
					  <li class="number"><?php echo $data->lugar;?></li>
					  <li><img src="<?php echo $data->banderaImgPath;?>" /></li>
					  <li><?php echo $data->nombre;?></li>
					</ul>
					</div>
					<div class="row secondPlace">
						
				<?php
				}elseif($index==1 || $index==2){
				?>
				<div class="small-6 large-6 columns n<?php echo $index;?>">
						<ul class="small-block-grid-3 large-block-grid-3">
						  <li class="number"><?php echo $data->lugar;?></li>
						  <li><img src="<?php echo $data->banderaImgPath;?>" /></li>
						  <li><?php echo $data->nombre;?></li>
						</ul>
						</div>
				<?php
				}elseif($index==3){?>
					
					</div>
					<div class="row places">
						<div class="small-4 large-4 columns">
							<ul class="small-block-grid-3 large-block-grid-3">
							  <li class="number"><?php echo $data->lugar;?></li>
							  <li><img src="<?php echo $data->banderaImgPath;?>" /></li>
							  <li><?php echo $data->nombre;?></li>
							</ul>
						</div>
						<?php }else{?>
						<div class="small-4 large-4 columns">
							<ul class="small-block-grid-3 large-block-grid-3">
							  <li class="number"><?php echo $data->lugar;?></li>
							  <li><img src="<?php echo $data->banderaImgPath;?>" /></li>
							  <li><?php echo $data->nombre;?></li>
							</ul>
						</div>
				<?php }
				$index = $index+1;
			}
		}
	}
	?>
				</div>
			</div>
<div class="small-18 large-6 columns">
	<h2><span>Jornadas</span></h2>
  <div class="section-container accordion" data-section="accordion">
    <?php foreach($xml->xpath('rondaFinal/jornada') as $jornada){
		$index=1;
		?>
    <section <?php if ($index ==1) echo 'class="active"' ?> >
      <p class="title" data-section-title><a href="#panel<?php echo $index;?>"><?php echo $jornada['fecha'];?></a></p>
      <div class="content" data-section-content>
        <?php
		
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
            
            <?php if ($data['penales'] =='true'){
								echo '<div>'.$data->equipo1['penales'].' Penales '. $data->equipo2['penales'].'</div>';
							
							}?>
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
	
	}
	
	//echo $arrJornadas[1][0]->fecha;
	
?>
</div>
  </div>
</div>
<?php
	include('includes/footer.php');
?>