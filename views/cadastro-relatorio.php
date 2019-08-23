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
										
										<div class="row">
						<div class="col-md-12">
							
							  <div class="form-row">
							    <div class="form-group col-md-12">
							      <label for="NomePaciente">Nome do Solicitante</label>
							      <input type="text" name="NomePaciente" class="form-control" id="NomePaciente" placeholder="Nome">
							    </div>
							  </div>

							  <div class="form-row">
							    <div class="form-group col-md-4">
							      <label for="NomePaciente">Data do Fato</label>
							      <input type="date" name="NomePaciente" class="form-control" id="NomePaciente" placeholder="Nome">
							    </div>
							    <div class="form-group col-md-4">
							      <label for="RG">Hora da Comunicação</label>
							      <input type="time" name="rg" class="form-control" id="RG" placeholder="RG">
							    </div>
							    <div class="form-group col-md-4">

							  		<label for="">Como Foi Solicitado o atendimento </label>
							  		<label class="form control radio-inline"><input type="radio" name="optradio" checked>Via Central</label>
									<label class="form control radio-inline"><input type="radio" name="optradio">Diretamente</label>
									<label class="form control radio-inline"><input type="radio" name="optradio">Deparou</label>
							  	</div>
							  </div>

							  <div class="form-row">
							    <div class="form-group col-md-8">
							      <label for="NomePaciente">Natureza da Ocorrência</label>
							      <input type="text" name="NomePaciente" class="form-control" id="NomePaciente" placeholder="Nome">
							    </div>
							    <div class="form-group col-md-2">
							      <label for="RG">Prefixo da AMB</label>
							      <input type="text" name="rg" class="form-control" id="RG" placeholder="RG">
							    </div>
								<div class="form-group col-md-2">
							      <label for="RG">RA Nº</label>
							      <input type="text" name="rg" class="form-control" id="RG" placeholder="RG">
							    </div>
							  </div>

							  <div class="form-row">
							    <div class="form-group col-md-2">
							      <label for="NomePaciente">KM inicial</label>
							      <input type="text" name="NomePaciente" class="form-control" id="NomePaciente" placeholder="Nome">
							    </div>
							    <div class="form-group col-md-2">
							      <label for="RG">KM FINAL</label>
							      <input type="text" name="rg" class="form-control" id="RG" placeholder="RG">
							    </div>
								<div class="form-group col-md-2">
							      <label for="RG">KM RODADO</label>
							      <input type="text" name="rg" class="form-control" id="RG" placeholder="RG">
							    </div>
								<div class="form-group col-md-2">
							      <label for="RG">HORA DO FATO</label>
							      <input type="time" name="rg" class="form-control" id="RG" placeholder="RG">
							    </div>
								<div class="form-group col-md-2">
							      <label for="RG">HORA LOCAL</label>
							      <input type="time" name="rg" class="form-control" id="RG" placeholder="RG">
							    </div>
								<div class="form-group col-md-2">
							      <label for="RG">HORA FINAL</label>
							      <input type="time" name="rg" class="form-control" id="RG" placeholder="RG">
							    </div>
							  </div>

							  <div class="form-row">
							    <div class="form-group col-md-8">
							      <label for="NomePaciente">Nome do Paciente</label>
							      <input type="text" name="NomePaciente" class="form-control" id="NomePaciente" placeholder="Nome">
							    </div>
							    <div class="form-group col-md-4">
							      <label for="RG">RG</label>
							      <input type="text" name="rg" class="form-control" id="RG" placeholder="RG">
							    </div>
							  </div>

							  <div class="form-row">
								    <div class="form-group col-md-4">
								      <label for="Cartão SUS">Cartão SUS</label>
								      <input type="text" class="form-control" id="Cartão SUS">
								    </div>
								   <div class="form-check form-inline col-md-4">
										<label for="inputEmail4">Sexo</label>
											<label class="fancy-radio">
												<input id="sexo" name="sexo" value="Masculino" type="radio">
												<span><i></i>Masculino</span>
											</label>
											<label class="fancy-radio">
												<input id="sexo" name="sexo" value="Feminino" type="radio">
												<span><i></i>Feminino</span>
											</label>
									</div>
								    <div class="form-group col-md-4">
								      <label for="inputCEP">Data de Nascimento</label>
								      <input type="date" name="bairro" class="form-control" id="BAIRRO">
								    </div>
							  </div>

							  <div class="form-group col-md-12">
							    <label for="inputAddress">Endereço</label>
							    <input type="text" class="form-control" id="inputAddress" placeholder="Rua dos Bobos, nº 0">
							  </div>

							  <div class="form-row">
							    <div class="form-group col-md-6">
							      <label for="inputCity">Cidade</label>
							      <input type="text" class="form-control" id="inputCity">
							    </div>
							    <div class="form-group col-md-4">
							      <label for="inputEstado">Estado</label>
							      <select id="inputEstado" class="form-control">
							        <option selected>Escolher...</option>
							        <option value="SP">SP</option>
							      </select>
							    </div>
							    <div class="form-group col-md-2">
							      <label for="inputCEP">BAIRRO</label>
							      <input type="text" name="bairro" class="form-control" id="BAIRRO">
							    </div>
							  </div>

							  <div class="form-group col-md-12">
  								<label for="comment">Observação</label>
 								<textarea class="form-control" rows="5" id="comment"></textarea>
							  </div>
						</div>
				</div>
											  				  
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
