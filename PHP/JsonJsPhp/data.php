<?php
	$cn = mssql_connect("TUXITODEB","sa","123");
	$rs = mssql_select_db("minishop",$cn); 

	$procedure = mssql_init("USP_S_Productos",$cn);

	$sql = mssql_execute($procedure);

	$idtable = "tbconcepto";

	$metodolistar = "ListarConcepto";
	                                 
	$opciones['funcionesjs'][0]= "ConfirmaEliminaConcepto";
	$opciones['imagenes'][0] = "images/delete.png"; 

	$opciones['funcionesjs'][1]= "EditarProducto";
	$opciones['imagenes'][1] = "images/editar.png";	

	$nroopc = count($opciones['funcionesjs']);  //Nro de Opciones
	$nroCamposSql = mssql_num_fields($sql); //Nro de Campos de la Consula SQL
	$cposOcultos = 0;
    $ctascol = $nroCamposSql - $cposOcultos;   //Cantidad de campos a dibujar, menos los dos ultimos		
?>
<table id="<?php print $idtable; ?>" style="margin:auto;width: 50%">
<thead>
<tr style="text-transform: uppercase;">
<?php
for ($i = 0; $i < $ctascol; $i++) {
	?>
	<th>
		<center><?php print utf8_encode(mssql_field_name($sql, $i)) ?></center>
	</th>
	<?php
}
if ($nroopc != NULL && $nroopc > 0) {
	?>
	<th colspan="<?php echo $nroopc; ?>">
		<center>Opciones</center>
	</th>
	<?php }
		$arr = array();	
	 ?>  
</tr>
</thead>
<tbody>
	<?php
	while ($fila = mssql_fetch_assoc($sql)) {
		$temp = array();
		foreach ($fila as $key => $value) {
			$temp[$key] = utf8_encode($value);
		}
		$json = json_encode($temp);
		$arr[] = json_encode($temp).'<br>';
		?>
		<tr id='id-<?php echo $temp['nProCodigo']; ?>' data-json='<?php echo $json; ?>'>
			<?php
			for ($i = 0; $i < $ctascol; ++$i) {
				$namecol = mssql_field_name($sql, $i);
				$campo = mb_convert_encoding($fila[$namecol], 'UTF-8');
				?>
				<td>

					<?php
					if ($campo == null) {
						?>&nbsp;<?php
					} else {
						print utf8_decode($campo);
					}
					?>

				</td>
				<?php
			}
			for ($i=0; $i < $nroopc; $i++) {
				$metodo = $opciones['funcionesjs'][$i];
				$imagen = $opciones['imagenes'][$i];
				$more = $opciones['more'][$i];
				?> 
				<td style='width: 20px'>
					<center>
						<a style='cursor:pointer;'>
							<img src="<?php echo $imagen; ?>"border='0' alt='' onclick='<?php echo $metodo . '(' . $json . ');' ?>' title='' style='vertical-align: middle'/>
						</a>
					</center>
				</td>

				<?php
			}
			?>
		</tr>
		<?php
/*		$NroRegistros = $fila['row_count'];
		unset($fila);*/
	}
	?>

</tbody>
</table>	
<?php
echo "data json<br>";
print_r($arr);
?>
