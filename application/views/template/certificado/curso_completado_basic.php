<!DOCTYPE html>
<html>
<body>
	<div style="width:800px; height:600px; padding:20px; text-align:center; border: 10px solid #787878">
		<div style="width:750px; height:550px; padding:20px; text-align:center; border: 5px solid #787878">
		       <span style="font-size:50px; font-weight:bold">Dr-Teach Educational Platform</span>
		       <br><br>
		       <span style="font-size:25px"><i>Certifica que</i></span>
		       <br><br>
		       <span style="font-size:30px"><b><?php print($nombres_apellidos) ?></b></span><br/><br/>
		       <span style="font-size:25px"><i>Ha Completado satisfactoriamente el curso de</i></span> <br/><br/>
		       <span style="font-size:30px"><?php print($curso) ?></span> <br/><br/>
		       <span style="font-size:20px">con un porcentaje de aprobacion de <b> <?php print($resultado) ?>%</b></span> <br/><br/><br/><br/>
		       <b>Código Certificado</b><br><?php print($codigo) ?><br/><br/><br/>
		       <span style="font-size:25px"><i></i></span><?php print($preFirma) ?><br><br>
		    <center><span style="font-size:12px"><img src="static/certificado/img/firmaJGQP.png"/><?php print($firma) ?></span></center>  
		</div>
	</div>
</body>
</html>