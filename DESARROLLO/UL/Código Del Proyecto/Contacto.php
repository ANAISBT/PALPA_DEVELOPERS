<!doctype html>
<!--[if lte IE 9]>
<html lang="en" class="oldie">
<![endif]-->
<!--[if gt IE 9]><!-->
<html lang="en">
<!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Contactanos</title>
  <link rel="icon" href="./images/2344031.png">
  <link rel="stylesheet" media="all" href="./CSS/main.css" />
</head>
<body>
<div class="container">
	<div class="row">
			<h1>CONTACTANOS</h1>
	</div>
	<div class="row">
			<h4 style="text-align:center">Nos encantaria que sea parte de nosotros</h4>
	</div>
    <form method="POST" action="EnviarCorreo.php">
	<div class="row input-container">
            <input type="hidden" name="correo" value="anaisbustamantetorres@gmail.com"/>
			<div class="col-xs-12">
				<div class="styled-input wide">
					<input type="text" name="nombre" required />
					<label>Nombre</label> 
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="styled-input">
					<input type="email" name="email" required />
					<label>Correo Electrónico</label> 
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="styled-input" style="float:right;">
					<input type="text" name="numero" required />
					<label>Numero Telefónico</label> 
				</div>
			</div>

            <h4 style="text-align:center">Información del Fallecido</h4>

            <div class="col-xs-12">
				<div class="styled-input wide">
					<input type="text" name="nombre_fallecido" required />
					<label>Nombres y Apellidos</label> 
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="styled-input">
					<input type="text" name="seccion" required />
					<label>Sección donde fue enterrado</label> 
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="styled-input" style="float:right;">
					<input type="text" name="fecha" required />
					<label>Fecha de Defunción</label> 
				</div>
			</div>

            <div class="col-md-6 col-sm-12">
				<div class="styled-input">
					<input type="text" name="latitud" required />
					<label>Latitud</label> 
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="styled-input" style="float:right;">
					<input type="text" name="longitud" required />
					<label>Longitud</label> 
				</div>
			</div>

			<div class="col-xs-12">
				<div class="styled-input wide">
					<textarea name="msg" required></textarea>
					<label>Información Adicional que desea que sepamos</label>
				</div>
			</div>
			<div class="col-xs-12">
				<input type="submit" class="btn-lrg submit-btn" name="enviar">
			</div>
	</div>
    </form>
</div>
</body>
</html>