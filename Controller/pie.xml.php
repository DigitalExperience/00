<?php include("../Model/consultas.php"); ?>
<chart useRoundEdges='1' showYaxisValues='0' showLegend='0' bgColor='FFFFFF' showBorder='0' showvalues='1' 	palettecolors="#F44336,#FF9800,#00bcd4,#8bc34a,#4caf50">
<?php
	$query = "SELECT *, COUNT(*) AS Total FROM `encuesta`
			WHERE valor > 0
			GROUP BY valor ORDER BY valor ASC";

	echo $query;


	$resultado = array();

	if ($result = mysqli_query( $linkDB, $query)) {
	    while ($row = $result->fetch_assoc()) {
				$resultado[] = $row;
		}
	}

	$etiquetas = array("Muy Mala", "Mala", "Regular", "Buena", "Muy Buena");

	for ($i=0; $i < sizeof($resultado); $i++) { ?>
		<set label='<?=mb_strtoupper($etiquetas[($resultado[$i][valor]-1)])?>' value='<?=$resultado[$i][Total]?>' />
	<?php } ?>
</chart>