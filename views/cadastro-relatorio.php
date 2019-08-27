		<?php
			require_once 'header.php';
			require_once '../classes/Motorista.php';
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
						<form action="../controllers/relatorio/cadastro.php" method="POST">
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Cadastro de Relatório</h3>
								</div>
							<div class="panel-body">
										
								<div class="row">
									<div class="col-md-12">
										
										  <div class="form-row">
										    <div class="form-group col-md-12">
										      <label for="NomeSolicitante">Nome do Solicitante</label>
										      <input type="text" name="NomeSolicitante" class="form-control" id="NomeSolicitante" placeholder="Nome Do Solicitante" required>
										    </div>
										  </div>

										  <div class="form-row">
										    <div class="form-group col-md-4">
										      <label for="dataFato">Data do Fato</label>
										      <input type="date" name="dataFato" class="form-control" id="dataFato" max="2099-12-25">
										    </div>
										    <div class="form-group col-md-4">
										      <label for="HoraComunicacao">Hora da Comunicação</label>
										      <input type="time" name="HoraComunicacao" class="form-control" id="RG">
										    </div>
										    <div class="form-group col-md-4">

										  		<label for="">Como Foi Solicitado o atendimento </label>
										  		<label class="form control radio-inline"><input type="radio" name="solicitamento" value="VIA CENTRAL" checked>Via Central</label>
												<label class="form control radio-inline"><input type="radio" name="solicitamento" value="DIRETAMENTE">Diretamente</label>
												<label class="form control radio-inline"><input type="radio" name="solicitamento" value="DEPAROU">Deparou</label>
										  	</div>
										  </div>

										  <div class="form-row">
										    <div class="form-group col-md-8">
										      <label for="naturezaOcorrencia">Natureza da Ocorrência</label>
										      <input type="text" name="naturezaOcorrencia" class="form-control" id="naturezaOcorrencia" placeholder="Natureza da Ocorrência">
										    </div>
										    <div class="form-group col-md-2">
										      <label for="amb">Prefixo da AMB</label>
										      <input type="text" name="amb" class="form-control" id="amb" placeholder="Prefixo da AMB">
										    </div>
											<div class="form-group col-md-2">
										      <label for="RA">RA Nº</label>
										      <input type="text" name="RA" class="form-control" id="RA" placeholder="RA">
										    </div>
										  </div>

										  <div class="form-row">
										    <div class="form-group col-md-2">
										      <label for="kmInicial">KM inicial</label>
										      <input type="text" name="kmInicial" class="form-control" id="kmInicial">
										    </div>
										    <div class="form-group col-md-2">
										      <label for="kmFinal">KM FINAL</label>
										      <input type="text" name="kmFinal" class="form-control" id="kmFinal" >
										    </div>
											<div class="form-group col-md-2">
										      <label for="kmRodado">KM RODADO</label>
										      <input type="text" name="kmRodado" class="form-control" id="kmRodado" >
										    </div>
											<div class="form-group col-md-2">
										      <label for="horaFato">HORA DO FATO</label>
										      <input type="time" name="horaFato" class="form-control" id="horaFato" >
										    </div>
											<div class="form-group col-md-2">
										      <label for="horaLocal">HORA LOCAL</label>
										      <input type="time" name="horaLocal" class="form-control" id="horaLocal" >
										    </div>
											<div class="form-group col-md-2">
										      <label for="horaFinal">HORA FINAL</label>
										      <input type="time" name="horaFinal" class="form-control" id="horaFinal" >
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
											      <input type="text" name="cartao_sus" class="form-control" id="Cartão SUS">
												</div>
											    <div class="form-check  col-md-4">
													<label for="sexo">Sexo</label>
														<label class="fancy-radio">
															<input id="sexo" name="sexo" value="M" type="radio">
															<span><i></i>Masculino</span>
														</label>
														<label class="fancy-radio">
															<input id="sexo" name="sexo" value="F" type="radio">
															<span><i></i>Feminino</span>
														</label>
												</div>
											    <div class="form-group col-md-4">
											      <label for="dataNascimento">Data de Nascimento</label>
											      <input type="date" name="dataNascimento" class="form-control" id="dataNascimento">
											    </div>
										  	</div>
										 <div class="form-row">
											<div class="form-group col-md-10">
												<label for="endereco">Endereço</label>
												<input type="text" name="endereco" class="form-control" id="endereco" placeholder="Ex: Rua dos bobos">
											</div>
											<div class="form-group col-md-2">
												<label for="numero">Número</label>
												<input type="number" name="numero" class="form-control" id="numero" placeholder="numero">
											</div>
										 </div>	
										  <div class="form-row">
										    <div class="form-group col-md-6">
										      <label for="cidade">Cidade</label>
										      <input type="text" name="cidade" class="form-control" id="cidade">
										    </div>
										    <div class="form-group col-md-4">
										      <label for="estado">Estado</label>
										      <select id="estado" name="estado" class="form-control">
										        <option selected>Escolher...</option>
										        <option value="SP">SP</option>
										      </select>
										    </div>
										    <div class="form-group col-md-2">
										      <label for="bairro">BAIRRO</label>
										      <input type="text" name="bairro" class="form-control" id="bairro">
										    </div>
										  </div>

										  <div class="form-row">
										    <div class="form-group col-md-8">
										      <label for="Destino">Destino</label>
										      <input type="text" name="destino" class="form-control" id="Destino" placeholder="Destino">
										    </div>
										    <div class="form-group col-md-4">
										      <label for="Motorista">Motorista Responsavel pela Ocorrencia</label>
										      <select id="motorista" name="motorista" class="form-control">
										        <?php
													$motorista = New Motorista();

													$dados = $motorista->listarNomes();
													 
													for ($i=0; $i < count($dados) ; $i++) 
													{ 
														foreach ($dados[$i] as $k => $v) 
														{
															echo "<option>$v</option>";
														}
													}
												?>
										      </select>
										    </div>
										  </div>

										  <div class="form-group col-md-12">
			  								<label for="observacao">Observação</label>
			 								<textarea class="form-control" name="observacao" rows="5" id="observacao"></textarea>
										  </div>
										  <button class="btn btn-success btn-block">Cadastrar</button>
									</div>
								</div>			  				  
							</div>
						</div>
								
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
