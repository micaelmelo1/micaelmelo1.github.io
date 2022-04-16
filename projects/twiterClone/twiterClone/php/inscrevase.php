<?php
	$erro_usuario = isset($_GET['erro_usuario']) ? $_GET['erro_usuario'] : 0;
	$erro_email   = isset($_GET['erro_email']) ? $_GET['erro_email'] : 0;
?>
<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Twitter clone</title>
		
		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<link rel="stylesheet" href="teste.css">
		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	
		<link rel="icon" href="../imagens/icone_twitter.png">
	</head>

	<body>

		<!-- Static navbar -->
	    <nav class="navbar navbar-default navbar-static-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <img src="../imagens/icone_twitter.png" />
	        </div>
	        
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
	            <li><a href="index.php">Voltar para Home</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>


	    <div class="container">
	    	
	    	<br /><br />

	    	<div class="col-md-4"></div>
	    	<div class="col-md-4">
	    	<div class="formulario">
	    		<h3>Inscreva-se já.</h3>
	    		<br />
				<form method="POST" action="registra_usuario.php" id="formCadastrarse">
					<div class="form-group">
						<label>Usúario</label>
						<input type="text" class="form-control" id="usuario" name="usuario" placeholder="" required="requiored">
						<?php
							if($erro_usuario){
								echo'<font style="color:#FF0000">Úsuario ja existe.</font>';
							}
						?>
					</div>

					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="" required="requiored">
					
						<?php
							if($erro_email){
								echo'<font style="color:#FF0000">Email ja existe.</font>';
							}
						?>
					</div>
					
					<div class="form-group">
						<label>Senha</label>	
						<input type="password" class="form-control" id="senha" name="senha" placeholder="" required="requiored">
					</div>
					
					<button type="submit" class="btn btn-primary form-control">Inscreva-se</button>
				</form>
			</div>
			</div>
			<div class="col-md-4"></div>

			<div class="clearfix"></div>
			<br />
			<div class="col-md-4"></div>
			<div class="col-md-4"></div>
			<div class="col-md-4"></div>

		</div>


	    </div>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>