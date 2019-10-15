		<?php
			require_once 'header.php';
			require_once '../classes/Paciente.php';
			require_once '../classes/Endereco.php';
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
						<form action="../controllers/relatorio/editar.php" method="POST">
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Alterar dados do Paciente</h3>
											<?php 
												if(isset($_GET['id_update']) && isset($_GET['id_endereco_update']))
												{
													$paciente = new Paciente();
													$endereco = new Endereco();
													$dados = $paciente->pegarDadosPorId($_GET['id_update']);
													$dadosEndereco = $endereco->pegarDadosPorId($_GET['id_endereco_update']);

							
												}else{
													header("location: update_paciente.php");
												}			
											?>
								</div>
							<div class="panel-body">
										
								<div class="row">
									<div class="col-md-12">
										  <div class="form-row">
										    <div class="form-group col-md-8">
											  <input type="hidden" id="custId" name="id_paciente" value="<?php echo $dados['IDPACIENTE']?>">
										      <label for="NomePaciente">Nome do Paciente</label>
										      <input type="text" name="NomePaciente_update" class="form-control" id="NomePaciente" placeholder="Nome" value="<?php echo $dados['NOME']?>">
										    </div>
										    <div class="form-group col-md-4">
										      <label for="RG">RG</label>
										      <input type="text" name="rg_update" class="form-control" id="RG" placeholder="RG" value="<?php echo $dados['RG']?>">
										    </div>
										  </div>

										  <div class="form-row">
											    <div class="form-group col-md-4">
											      <label for="Cartão SUS">Cartão SUS</label>
											      <input type="text" name="cartao_sus_update" class="form-control" id="Cartão SUS" value="<?php echo $dados['CARTAO_SUS']?>">
												</div>
											    <div class="form-check  col-md-4">
													<label for="sexo">Sexo</label>
														<label class="fancy-radio">
															<input id="sexo" name="sexo_update" value="M" type="radio" <?php echo isset($dados['SEXO']) && $dados['SEXO'] == "M" ? 'checked' : '' ?>>
															<span><i></i>Masculino</span>
														</label>
														<label class="fancy-radio">
															<input id="sexo" name="sexo_update" value="F" type="radio" <?php echo isset($dados['SEXO']) && $dados['SEXO'] == "F" ? 'checked' : '' ?>>
															<span><i></i>Feminino</span>
														</label>
												</div>
											    <div class="form-group col-md-4">
											      <label for="dataNascimento">Data de Nascimento</label>
											      <input type="date" name="dataNascimento_update" class="form-control" id="dataNascimento" value="<?php echo $dados['DATA_NASCIMENTO']?>">
											    </div>
										   </div>
										   <div class="form-group col-md-12">
			  								<label for="observacao">Observação</label>
			 								<textarea class="form-control" name="observacao_update" rows="5" id="observacao"><?php echo $dados['OBSERVACAO']?></textarea>
										  </div>
										  
										  <div class="form-row">
											<div class="form-group col-md-10">
											<input type="hidden" id="custId" name="id_endereco" value="<?php echo $dadosEndereco['IDENDERECO']?>">
												<label for="endereco">Endereço</label>
												<input type="text" name="endereco_update" class="form-control" id="endereco" value="<?php echo $dadosEndereco['RUA']?>">
											</div>
											<div class="form-group col-md-2">
												<label for="numero">Número</label>
												<input type="number" name="numero_update" class="form-control" id="numero" value="<?php echo $dadosEndereco['NUMERO']?>">
											</div>
										 </div>	
										  <div class="form-row">
										    <div class="form-group col-md-6">
										      <label for="cidade">Cidade</label>
										      <input type="text" name="cidade_update" class="form-control" id="cidade" value="<?php echo $dadosEndereco['CIDADE']?>">
										    </div>
										    <div class="form-group col-md-4">
										      <label for="estado">Estado</label>
										      <select id="estado" name="estado_update" class="form-control">
										        <option value="SP">SP</option>
										      </select>
										    </div>
										    <div class="form-group col-md-2">
										      <label for="bairro">BAIRRO</label>
										      <input type="text" name="bairro_update" class="form-control" id="bairro" value="<?php echo $dadosEndereco['BAIRRO']?>">
										    </div>
										  </div>
										  </div>

										  
										  <button class="btn btn-success btn-block" name="btn-update">Alterar Dados</button>
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
