<?php
			require_once 'header.php';
		?>
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title">Elements</h3>
					<p class="lead text-center text-primary pt-2 pb-2">
								<?php
									if(isset($_SESSION['emailJaCadastrado'])){

										echo $_SESSION['emailJaCadastrado'];
										unset($_SESSION['emailJaCadastrado']);

									}else if(isset($_SESSION['success'])){
										echo $_SESSION['success'];
										unset($_SESSION['success']);
									}
								?>
					</p>
					<div class="row">
						<div class="col-md-12">
							<form action="../controllers/motorista/cadastro.php" method="POST">
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Cadastro de Motorista</h3>
								</div>
								<div class="panel-body">
									<label class="">Nome Completo</label>
									<input type="text" name="nome" class="form-control" placeholder="Insira seu nome" required>
									<br>
									<label class="">Email</label>
									<input type="email" name="email" class="form-control" placeholder="Insira seu Email" value="" required>
									<br>
									<label class="">Senha</label>
									<br>
									<input type="password" name="senha"  class="form-control" placeholder="**********"  required>
									<br>
									<button class="btn btn-success btn-block">Enviar</button>
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
