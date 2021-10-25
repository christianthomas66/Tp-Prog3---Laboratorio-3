<?php
	include_once("./backend/validarSesion.php");
	ValidarSesion("./login.html");
?>
<!doctype html>
<html>
<head>
	<title>EMPLEADOS ARCHIVO Y AJAX</title>
	<script type="text/javascript" src="./javascript/funciones.js"></script>
</head>
<body bgcolor=" #E8F5C1 ">
	<div class="container">
		<div class="page-header">
			<h1>Empleados - Archivo y Ajax</h1>      
		</div>
		<div class="CajaInicio animated bounceInRight" style="width:1100px">
			<h4 style="border:solid; padding:8px; background:#7BB371; color:red; border-color:black;"><font size="4">Christian Thomás Suárez Grecoo</font></h4>
			<table>
				<tbody>
					<tr>
						<td width="95%">
							<div id="divFrm" style="height:600px; overflow:auto; border-style:solid; border-color:black;">
						</td>
						<td rowspan="2">
							<div id="divEmpleados" style="height:600px; overflow:auto; border-style:solid; border-color:black;">
							</div>
						</td>
					</tr>
				</tbody>
			</table>
			<h6 style="display:block;border:solid;padding:10px;">
			<a href="./backend/cerrarSesion.php"><font size="3">Cerrar Sesion</font></a>
			<br/>
			<a href="./backend/convertirPDF.php"><font size="3">Convertir a formato PDF</font></a>
			</h6>
		</div>
	</div>
</body>
</html>