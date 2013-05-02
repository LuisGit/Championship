<?php
//Header
	$cssPage ='firstRound';
	$title = 'Primera Ronda';
	$classBody="firstRound";
	$ifNav="yes";
	$backPage="seleccionRonda.php";
	include('includes/header.php');
	
?>

<?php
$xml = simplexml_load_file("xml/pRonda.xml",null,true) 
		   or die("Error: Cannot create object");
		   
	//properties.
	$arrGrupoA = array();
	$arrGrupoB = array();
	$arrGrupoC = array();
	
	
	//Array to hold jornadas
	$arrJornadas = array();
	$jornadaIndex=0;		   

	
	//Parsing Teams.
	?>
	
    <div class="row">
  		<div class="large-6 columns"><img src="images/groupsSectionTitle.png" /></div>
	  <div class="large-6 columns"><img src="images/journeySectionTitle.png" /></div>
	</div>
    
	<div class="row">
    <div class="small-18 large-6 columns">
		<div class="section-container tabs" data-section>
		<?php
		parse_teams($xml,'grupos/grupoA',$arrGrupoA,'Grupo A');
		parse_teams($xml,'grupos/grupoB',$arrGrupoB,'Grupo B');
		parse_teams($xml,'grupos/grupoC',$arrGrupoC,'Grupo C');
		?>
		
		<?php
		function parse_teams($xml,$xmlPath,&$arr,$nombreGrupo){
			$index=1;?>
		
		  <section>
		    <p class="title" data-section-title><a href="#panel<?php echo $index;?>"><?php echo $nombreGrupo;?></a></p>
		    <div class="content" data-section-content>
		    	<table>
				  <thead>
				    <tr>
				      <th class="flag">&nbsp;</th>
				      <th>PJ</th>
				      <th>PG</th>
				      <th>PE</th>
				      <th>PP</th>
				      <th>PTS</th>
				    </tr>
				  </thead>
				  <tbody>	      
				<?php
				foreach($xml->xpath($xmlPath) as $grupoA){
					foreach($grupoA->children() as $equipo => $data){
						?>
						<tr>
					      <td class="flag"><img class="left" src="<?php echo $data->banderaImgPath;?>" alt="<?php echo $data->nombre;?>" /><p class="right"><?php echo $data->nombre;?></p></td>
					      <td><?php echo $data->pj;?></td>
					      <td><?php echo $data->pg;?></td>
					      <td><?php echo $data->pe;?></td>
					      <td><?php echo $data->pp;?></td>
					      <td><?php echo $data->pts;?></td>
					    </tr>
						<?php
						$index = $index+1;
					}
				}?>
				  </tbody>
			</table>
		    </div>
		  </section>
		  
				<?php 
			}
			?>
	
		</div>
		</div>
			<div class="small-18 large-6 columns">
				<div class="section-container accordion" data-section="accordion">

	<?php
	
	foreach($xml->xpath('jornadas') as $jornadas){
		foreach($jornadas->children() as $jornada){
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
	}
	
	//echo $arrJornadas[1][0]->fecha;
	
	
	
?>
			</div>
		</div>
	</div>
<?php
	include('includes/footer.php');
?>