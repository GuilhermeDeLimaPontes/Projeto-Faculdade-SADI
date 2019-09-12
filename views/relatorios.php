<?php
			require_once 'header.php';
			require_once '../classes/Paciente.php'
		?>
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title">Lista de Pacientes</h3>
					<div class="row">
						<div class="col-md-12">
							<!-- TABLE HOVER -->
							<div class="panel">
								<div class="panel-heading">
									<a href="cadastro-relatorio.php" class="btn btn-success">Cadastrar Relatório</a>
								</div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>#</th>
												<th>Nome</th>
												<th>Data de Nascimento</th>
                                                <th>Sexo</th>
                                                <th>RG</th>
                                                <th>Cartão SUS</th>
                                                <th width="310px">Ações</th>
											</tr>
										</thead>
										<tbody>
											<?php 
												$paciente = new Paciente();
												
												$dados = $paciente->listar();

												if(count($dados) > 0)
												{
													for ($i=0; $i < count($dados) ; $i++) 
													{ 
														echo "<tr>";
														foreach ($dados[$i] as $k => $v) 
														{
															echo "<td>$v</td>";
														}
														echo '<td>
																<a href="#" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Editar</a> 
                                                                <a href="#" class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i> Excluir</a>
                                                                <a href="#" class="btn btn-success btn-sm" ><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Relatório</a>
															 </td>';
														echo "<tr>";
													}
												}
			
											?>
										</tbody>
									</table>
								</div>
							</div>
							<!-- END TABLE HOVER -->
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