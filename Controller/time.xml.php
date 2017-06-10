<?php include("../Model/consultas.php"); ?>

<?php 

 	$etiquetas = array("", "Muy Mala", "Mala", "Regular", "Buena", "Muy Buena");
 	$color = array("", "#F44336", "#FF9800", "#00bcd4", "#8bc34a", "#4caf50");

if ($_GET[t]=='mes') {
	$total = 12;
	$int_qry = "MONTH";
}else{
	$total = 52;
	$int_qry = "WEEK";
}

 ?>

<chart showsum='1' showBorder='0' bgColor='FFFFFF' showlegend='1' useRoundEdges='1' showValues='0' showLabels='1' >
  <categories>
  <?php if ($_GET[t]!='mes') { ?>
    <?php for ($i=1; $i <= $total; $i++) { ?>
      <category label='W<?php echo $i; ?>' />    
    <?php } ?>
    <?php }else{ ?>
    <?php for($i=1; $i<=$total; $i++){
    	$temp = date('Y-'.str_pad($i, 2, "0", STR_PAD_LEFT).'-d');
    	$date = date_create($temp);
    	$temp = date_format($date, "F");
    	?>
		<category label='<?php echo $temp; ?>' />
	<?php }?>
	<?php } ?>
  </categories>
  <?php for ($estado=1; $estado <=5 ; $estado++) { ?>
    <dataset seriesname="<?php echo $etiquetas[$estado]; ?>" color="<?php echo $color[$estado]; ?>" alpha="90" dashed="0">
      <?php for ($i=1; $i <= $total; $i++) {
      		$consulta = "SELECT *, COUNT(*) AS Total FROM `encuesta`
							WHERE valor = $estado AND $int_qry(fecha_registro) = $i LIMIT 1";
			$resultado = array();

			//echo $consulta;
			if ($result = mysqli_query( $linkDB, $consulta)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		}

       ?>
        <set value="<?php echo $resultado[0][Total]; ?>" />
        <?php } ?>
    </dataset>
  <?php } ?>
</chart>