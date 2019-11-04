
		<?php
			require_once 'header.php';
			require_once '../classes/Ocorrencia.php';
		?>
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h2 class="display-1 text-uppercase text-center">Seja Bem-Vindo(a) <?php echo $_SESSION['NOME'] ?> </h2>
							
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-6">
									<div class="metric">
										<span class="icon"><i class="fa fa-bar-chart"></i></span>
										<p>
											<?php 
												$ocorrencia = new Ocorrencia;
												$total = $ocorrencia->contarNumOcorrencias();
												$totalPorMotorista = $ocorrencia->contarNumOcorrenciasPorMotorista($_SESSION['IDMOTORISTA']);
											?>
											<span class="title">Número Total de Ocorrências realizadas pelo SADI: </span>
											<span class="number"><?php echo $total ?></span>
										</p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="metric">
										<span class="icon"><i class="fa fa fa-bar-chart"></i></span>
										<p>
											<span class="title">Número Total de Ocorrência(s) Que Você Estava: </span>
											<span class="number"><?php echo $totalPorMotorista ?></span>
											
										</p>
									</div>
								</div>
							</div>
							<div class="row">
									<div class="col-md-6">
										<div class="metric">
											<span class="icon"><i class="fa fa-eye"></i></span>
											<p>
												<span class="number">274,678</span>
												<span class="title">Visits</span>
											</p>
										</div>
									</div>
									<div class="col-md-6">
										<div class="metric">
											<span class="icon"><i class="fa fa-bar-chart"></i></span>
											<p>
												<span class="number">35%</span>
												<span class="title">Conversions</span>
											</p>
										</div>
									</div>
								</div>	
							<div class="row">
								<!--<div class="col-md-9">
									<div id="headline-chart" class="ct-chart"></div>
								</div> #################GRAFICO##############-->
								
							</div>
						</div>
					</div>
					<!-- END OVERVIEW -->
					<div class="row">
						<div class="col-md-6">
							<!-- RECENT PURCHASES -->
							
							<!-- END RECENT PURCHASES -->
						</div>
						<div class="col-md-6">
							<!-- MULTI CHARTS -->
							
							<!-- END MULTI CHARTS -->
						</div>
					</div>
					<div class="row">
						<div class="col-md-7">
							
							<!-- END TODO LIST -->
						</div>
						<div class="col-md-5">
							<!-- TIMELINE -->
							
							<!-- END TIMELINE -->
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<!-- TASKS -->
							
							<!-- END TASKS -->
						</div>
						<div class="col-md-4">
							
							<!-- END VISIT CHART -->
						</div>
						<div class="col-md-4">
							<!-- REALTIME CHART -->
							
							<!-- END REALTIME CHART -->
						</div>
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
	<script src="assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
	<script>
	$(function() {
		var data, options;

		// headline charts
		data = {
			labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
			series: [
				[23, 29, 24, 40, 25, 24, 35],
				[14, 25, 18, 34, 29, 38, 44],
			]
		};

		options = {
			height: 300,
			showArea: true,
			showLine: false,
			showPoint: false,
			fullWidth: true,
			axisX: {
				showGrid: false
			},
			lineSmooth: false,
		};

		new Chartist.Line('#headline-chart', data, options);


		// visits trend charts
		data = {
			labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
			series: [{
				name: 'series-real',
				data: [200, 380, 350, 320, 410, 450, 570, 400, 555, 620, 750, 900],
			}, {
				name: 'series-projection',
				data: [240, 350, 360, 380, 400, 450, 480, 523, 555, 600, 700, 800],
			}]
		};

		options = {
			fullWidth: true,
			lineSmooth: false,
			height: "270px",
			low: 0,
			high: 'auto',
			series: {
				'series-projection': {
					showArea: true,
					showPoint: false,
					showLine: false
				},
			},
			axisX: {
				showGrid: false,

			},
			axisY: {
				showGrid: false,
				onlyInteger: true,
				offset: 0,
			},
			chartPadding: {
				left: 20,
				right: 20
			}
		};

		new Chartist.Line('#visits-trends-chart', data, options);


		// visits chart
		data = {
			labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
			series: [
				[6384, 6342, 5437, 2764, 3958, 5068, 7654]
			]
		};

		options = {
			height: 300,
			axisX: {
				showGrid: false
			},
		};

		new Chartist.Bar('#visits-chart', data, options);


		// real-time pie chart
		var sysLoad = $('#system-load').easyPieChart({
			size: 130,
			barColor: function(percent) {
				return "rgb(" + Math.round(200 * percent / 100) + ", " + Math.round(200 * (1.1 - percent / 100)) + ", 0)";
			},
			trackColor: 'rgba(245, 245, 245, 0.8)',
			scaleColor: false,
			lineWidth: 5,
			lineCap: "square",
			animate: 800
		});

		

	});
	</script>
</body>

</html>
