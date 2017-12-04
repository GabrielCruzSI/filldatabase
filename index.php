<?php require_once "global.php"?>
<!doctype html>
<html lang="pt-br">
	<head>
		<title>Gerador de Scripts SQL</title>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	</head>
	<body>
	
		<div class="container">
			<br>
			<div class="row">
				<div class="col-md-12">
					<h3>Configuração do Banco</h3>
				<div>
				<div class="col-md-12">
					<form  action="setups.php" method="post" >
						<div class="form-row">
							<div class="form-group col-md-3">
								<label for="host">host</label>
								<input type="text" class="form-control" name="host" id="host" value='<?= isset($_SESSION['host']) ? $_SESSION['host'] : ""  ?>' placeholder="Host do Mysql">
							</div>
							<div class="form-group col-md-3">
								<label for="usuario">usuário</label>
								<input type="text" class="form-control" name="usuario" id="usuario" value="<?php if(isset($_SESSION['usuario'])) echo $_SESSION['usuario']  ?>" placeholder="Usuário do Mysql">
							</div>
							<div class="form-group col-md-3 ">
								<label for="senha">senha</label>
								<input type="password" class="form-control" name="senha" id="senha" value="<?php if(isset($_SESSION['senha'])) echo $_SESSION['senha']  ?>" placeholder="Senha do Mysql">
							</div>
							<div class="form-group col-md-3 ">
								<label for="nome_banco">banco</label>
								<input type="text" class="form-control" name="banco" id="banco" value="<?php if(isset($_SESSION['banco'])) echo $_SESSION['banco']  ?>" placeholder="Nome do Banco">
							</div>

							<div class="form-group col-md-12 align-self-center">
								<span class="badge <?= isset($_SESSION['sucesso'])?"badge-success":"badge-warning" ?>">
									<?= isset($_SESSION['sucesso'])?"conectado":"conexão pendente" ?>
								</span>
								<button id="submit" class="btn badge badge-dark align-self-center" type="submit">
									<?= isset($_SESSION['sucesso'])?"logout":"conectar" ?>
								</button>
								<?php if(isset($_SESSION['preenchimento'])): ?>
									<small class="text-danger text-xs">Preencha Todos os Campos;</small>
								<?php endif ?>
								<?php if(isset($_SESSION['erro-conexao'])): ?>
									<small class="text-danger text-xs">Falha na conexão: revise os dados informados e tente novamente;</small>
								<?php endif ?>
							</div>
						</div>
					</form>
				</div><!-- Final Col md 12 -->
			</div><!-- Final Row -->
		
			<div class="row">
				<div class="col-md-12">
					<h3>Montagem da Query</h3>
				<div>

				<div class="col-md-12">
		
					<form action="">
						<div class="col-md-4">
							<div class="form-row">
								<label for="">Tabela</label>
								<?php if(isset($_SESSION['sucesso'])) $tabelas =  Consulta::retorna_tabelas(); ?>
								<select class="form-control" name="tabelas" id="tabelas">
									<?php foreach($tabelas as $tabela):?>
										<option class="form-control" value="<?php echo $tabela ?>"><?php echo $tabela ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
					</form>
					<br>
					<div id="campos">
						<?php /*if(isset($_SESSION['sucesso'])) $campos =  Consulta::retorna_campos("nomes")?> 
						<div class="form-row">
						<?php foreach($campos as $campo): ?> 
							<div class="form-group col-md-3">
								<label><?php echo $campo ?></label>
								<select class="form-control col-md-12" >
									<option value=""></option>
								</select>
							</div>
						<?php endforeach */?>
						</div>
					</div>
				</div>

			</div>
			<br>
			<div class="row">
				<div class="col-md-12">
					<h3>Query</h3>
				<div>

				<div class="col-md-12">
					<form action="">
						<textarea disabled class="form-control" name="querys" id="querys" cols="30" rows="5"></textarea>
					</form>
				</div>
			</div>

		</div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.1.0.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>
