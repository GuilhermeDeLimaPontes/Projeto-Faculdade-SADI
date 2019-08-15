		<?php
			require_once 'header.php';
		?>
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title">Elements</h3>
					<div class="row">
						<div class="col-md-12">
							<!-- BUTTONS -->
							
							
							<!-- END BUTTONS -->
							<!-- INPUTS -->
							<form action="" method="POST">
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Cadastro de Relatório</h3>
								</div>
								<div class="panel-body">
									<label class="">Nome do Solicitante</label>
									<input type="text" class="form-control" placeholder="text field">
									<br>
									<label class="">Data do fato</label>
									<input type="date" class="form-control" value="">
									<br>
									<label class="">Hora da Comunicação</label>
									<br>
									<input type="time"  name="appt" min="00:00" max="23:59" required>
									
									<!--<textarea class="form-control" placeholder="textarea" rows="4"></textarea>-->
									<br>
									<br>
									<label for="">Como Foi Solicitado o atendimento</label>
									<label class="fancy-radio">
										<input id="viacentral" name="solicitamento" value="Via Central" type="radio">
										<span><i></i>Via Central</span>
									</label>
									<label class="fancy-radio">
										<input id="diretamente" name="solicitamento" value="Diretamente" type="radio">
										<span><i></i>Diretamente</span>
									</label>
									<label class="fancy-radio">
										<input id="deparou" name="solicitamento" value="Deparou" type="radio">
										<span><i></i>Diretamente</span>
									</label>

								</div>
							</div>
							<button class="btn btn-success btn-block">Enviar</button>
							</form>
							<!-- END INPUTS -->
							<!-- INPUT SIZING -->
							
							<!-- END INPUT SIZING -->
						
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
