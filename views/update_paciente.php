		<?php
			require_once 'header.php';
			require_once '../classes/Paciente.php';
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
									<h3 class="panel-title">Alterar dados do Paciente</h3>
											<?php 
												if(isset($_GET['id_update']))
												{
													$paciente = new Paciente();
													$dados = $paciente->pegarDadosPorId($_GET['id_update']);
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
										
				
										  </div>

										  
										  <button class="btn btn-success btn-block" name="btn-update">Enviar</button>
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
