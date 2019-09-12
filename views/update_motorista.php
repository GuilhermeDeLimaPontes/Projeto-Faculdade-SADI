<?php
			require_once 'header.php';
			require_once '../classes/Motorista.php'
?>
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title">Elements</h3>
					<div class="row">
						<div class="col-md-12">
							<form action="../controllers/motorista/editar.php" method="POST">
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Alterar Dados - Motorista</h3>
									<?php 
										if(isset($_GET['id_update']))
										{
											$motorista = new Motorista();
											$dados = $motorista->pegarDadosPorId($_GET['id_update']);
										}else{
											header("location: update_motorista.php");
										}	
									?>
								</div>
								<div class="panel-body">
									<input type="hidden" id="custId" name="id_motorista" value="<?php echo $dados['IDMOTORISTA']?>">
									<label class="">Nome Completo</label>
									<input type="text" name="nome_update" class="form-control" placeholder="Insira seu nome" value="<?php echo $dados['NOME']?>" required>
									<br>
									<label class="">Email</label>
									<input type="email" name="email_update" class="form-control" placeholder="Insira seu Email" value="<?php echo $dados['EMAIL']?>" required>
									<br>
									<button class="btn btn-success btn-block" name="btn-update">Alterar Dados</button>
								</div>
							</div>
							</form>	
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
</body>

</html>
