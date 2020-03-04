<?php
			require_once 'header.php';
			require_once '../classes/Paciente.php';
			require_once '../classes/Ocorrencia.php';
?>
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title">Lista de Pacientes</h3>
					<p class="lead text-center text-primary pt-2 pb-2">
								<?php
									if(isset($_SESSION['Success'])){

										echo $_SESSION['Success'];
										unset($_SESSION['Success']);

									}else if(isset($_SESSION['Warning'])){
										echo $_SESSION['Warning'];
										unset($_SESSION['Warning']);
										
									}else if(isset($_SESSION['ErrorEditarRegistro'])){
										echo $_SESSION['ErrorEditarRegistro'];
										unset($_SESSION['ErrorEditarRegistro']);
									}
								?>
					</p>		
					<div class="row">
						<div class="col-md-12">
							<!-- TABLE HOVER -->
							<div class="panel">
							  <div class="row"> 
							  	<div class="col-md-3 d-none d-sm-block">
								  	<div class="panel-heading">
										<a href="cadastro-relatorio.php" class="btn btn-success btn-sm">Registrar Atendimento</a>
									</div>
							 	</div>
							  	<div class="col-md-9">
								  <form class="navbar navbar-right" style="margin-top: 15px;" method="GET" action="relatorios.php?search=<?php !isset($_GET['search'])? '': $_GET['search'] ?>" >
									<div class="col-md-8 col-sm-12">
											<div class="input-group">
												<?php 
								
													  $stringPesquisa = (!empty($_GET['search'])) ? $_GET['search'] : '';
													  $stringPesquisa = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_SPECIAL_CHARS);
													  		
												?>

												<input type="text" name="search" value="<?php echo  $stringPesquisa ?>" class="form-control" placeholder="Nome,RG ou Cartão SUS">
												<span class="input-group-btn"><button type="submit" class="btn btn-dark">Pesquisar</button></span>
											</div>
									</div>
								  </form>
								</div>
							  </div>	
								<div class="panel-body">
									<div class="table-responsive table-responsive-sm"> 
									<table class="table">
										<thead>
											<tr>
												<th>#</th>
												<th>Nome</th>
												<th>Data de Nascimento</th>
                                                <th>Sexo</th>
                                                <th>RG</th>
                                                <th>Cartão SUS</th>
                                                <th width="250px">Ações</th>
											</tr>
										</thead>
										<tbody>
											<?php 
												$paciente = new Paciente();
												$ocorrencia = new Ocorrencia();

												define('QTDE_REGISTROS', 10);   
 												define('RANGE_PAGINAS', 1);
												$pagina_atual = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;
												$linha_inicial = ($pagina_atual -1) * QTDE_REGISTROS; 
												$dadosPaginacao = $paciente->paginacao($linha_inicial, QTDE_REGISTROS);

												$sqlContador = $paciente->contarQtdTotalDePacientes();
												
												/* Idêntifica a primeira página */  
												$primeira_pagina = 1;   
												
												/* Cálcula qual será a última página */  
												$ultima_pagina  = ceil($sqlContador/ QTDE_REGISTROS);   
												
												/* Cálcula qual será a página anterior em relação a página atual em exibição */   
												$pagina_anterior = ($pagina_atual > 1) ? $pagina_atual -1 : "" ;   
												
												/* Cálcula qual será a pŕoxima página em relação a página atual em exibição */   
												$proxima_pagina = ($pagina_atual < $ultima_pagina) ? $pagina_atual +1 : "" ;  
												
												/* Cálcula qual será a página inicial do nosso range */    
												$range_inicial  = (($pagina_atual - RANGE_PAGINAS) >= 1) ? $pagina_atual - RANGE_PAGINAS : 1 ;   
												
												/* Cálcula qual será a página final do nosso range */    
												$range_final   = (($pagina_atual + RANGE_PAGINAS) <= $ultima_pagina ) ? $pagina_atual + RANGE_PAGINAS : $ultima_pagina ;   
												
												/* Verifica se vai exibir o botão "Primeiro" e "Pŕoximo" */   
												$exibir_botao_inicio = ($range_inicial < $pagina_atual) ? 'mostrar' : 'esconder'; 
												
												/* Verifica se vai exibir o botão "Anterior" e "Último" */   
												$exibir_botao_final = ($range_final > $pagina_atual) ? 'mostrar' : 'esconder';
												
												$dados = $paciente->listar();
												if(!isset($_GET['search']))
												{
							
													if(count($dadosPaginacao) > 0)
													{
														for ($i=0; $i < count($dadosPaginacao) ; $i++) 
														{ 
															echo "<tr>";
															foreach ($dadosPaginacao[$i] as $k => $v) 
															{
																if($k != "FK_ID_ENDERECO")
																{
																	echo "<td>$v</td>";
																}
													
															}
												
											?>
												  	<?php $id = $ocorrencia->pegarIdOcorrenciaPorPaciente($dadosPaginacao[$i]['IDPACIENTE']); ?>
														<td>
																<a href="update_paciente.php?id_update=<?php echo $dadosPaginacao[$i]['IDPACIENTE'] ?>&id_endereco_update=<?php echo $dadosPaginacao[$i]['FK_ID_ENDERECO']?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Editar</a> 
                                                               <!-- <a href="#" class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i> Excluir</a>-->
                                                                <a href="../registro-atendimento-pdf/registro-atendimento.php?id_paciente=<?php echo $dadosPaginacao[$i]['IDPACIENTE'] ?>&id_ocorrencia=<?php echo $id ?>" target="_blank" class="btn btn-danger btn-sm" ><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Relatório</a>
														</td>

														<?php echo "</tr>";
														}
													}
												}else{
													$pesquisa = $paciente->pesquisar($stringPesquisa);
													if(count($pesquisa) > 0)
													{
														for ($i=0; $i < count($pesquisa) ; $i++) 
														{ 
															echo "<tr>";
															foreach ($pesquisa[$i] as $k => $v) 
															{
																if($k != "FK_ID_ENDERECO")
																{
																	echo "<td>$v</td>";
																}
													
															}
												
											?>
												  	<?php $id = $ocorrencia->pegarIdOcorrenciaPorPaciente($pesquisa[$i]['IDPACIENTE']); ?>
														<td>
																<a href="update_paciente.php?id_update=<?php echo $pesquisa[$i]['IDPACIENTE'] ?>&id_endereco_update=<?php echo $pesquisa[$i]['FK_ID_ENDERECO']?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Editar</a> 
                                                                <!--<a href="#" class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i> Excluir</a>-->
                                                                <a href="../registro-atendimento-pdf/registro-atendimento.php?id_paciente=<?php echo $pesquisa[$i]['IDPACIENTE'] ?>&id_ocorrencia=<?php echo $id ?>" target="_blank" class="btn btn-success btn-sm" ><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Relatório</a>
														</td>

														<?php echo "</tr>";
														}
													}else{
														echo '<h4 class="lead text-center text-danger">Paciente não encontrado</h4>';
													}
												}
											?>
											
										</tbody>
										
									</table>
									<div class='box-paginacao'>     
												     
									<ul class="pagination">
												<?php if(isset($_GET['page']) && $_GET['page'] != 1){ ?>
													<li class="page-item"><a class='page-link <?=$exibir_botao_inicio?>' href="http://localhost/sadi/views/relatorios.php?page=<?=$pagina_anterior?>" title="Página Anterior">Anterior</a></li>
									</ul>
												<?php  } ?>
												<?php
												  
												/* Loop para montar a páginação central com os números */   
												for ($i=$range_inicial; $i <= $range_final; $i++):   
													$destaque = ($i == $pagina_atual) ? 'destaque' : '' ;  
												?>
												<ul class="pagination justify-content-center">   
													<li class="page-item"><a class='page-link <?=$destaque?>' href="http://localhost/sadi/views/relatorios.php?page=<?=$i?>"><?=$i?></a></li>
												</ul>    
												<?php endfor; ?>
												<?php if(isset($_GET['page']) && $_GET['page'] != $range_final){ ?>
												<ul class="pagination">
													<li class="page-item"><a class='page-link <?=$exibir_botao_final?>' href="http://localhost/sadi/views/relatorios.php?page=<?=$proxima_pagina?>" title="Próxima Página">Próxima</a></li>
												</ul>
												<?php  } ?>    
    										 </div>  
									</div>
									
								</div>
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