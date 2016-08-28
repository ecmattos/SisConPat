<?php
    include '../config/params.php';
    include '../config/conexaobd.php';

    echo $cfg_Now_Y_m_d_H_i_s;
    
	$qry = "SELECT
		*
		FROM
		Ceasa_Poa_Imoveis
		WHERE
		Incorporação = '0000'";
	echo $qry;
	
	$Registros = $cfg_exec_qry ($qry, $conexaoDB);
	while($rs = $cfg_fields ($Registros))
		{
			$CODE 	= $rs['Nr_Novo'];
			echo "CODE: ".$CODE."<br>";
		}	
?>
