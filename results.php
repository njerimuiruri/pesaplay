<?php include('includes/header.php'); ?>
<!-- Casino Jackpots Start -->
<section id="jackpots" class="jackpots tour-jack back-dark section">
	<div class="container">
		<div class="row justify-content-center text-center">
			<div class="col-lg-6">
				<div class="heading">
					<h2>Updated Results & Winners </h2>
					<img src="images/heading-border-effect.png" class="img-fluid" alt="effect">
				</div>
			</div>
		</div>
		<div class="row">

			<div class="col-lg-9">
				<div class="sub-heading">
					<h3 style="color: #ffcc00; font-weight: bold;">Lottery Results</h3>
				</div>
				<div class="row mb-3">
	<div class="col-md-6 col-12 mb-2">
		<input type="text" id="searchInput" class="form-control" placeholder="Search...">
	</div>
	<div class="col-md-3 col-12 mb-2">
		<input type="text" id="dateRange" class="form-control" placeholder="Select date range">
	</div>
	<div class="col-md-3 col-12" style="display: flex; gap: 10px; justify-content: space-between;">
		<button class="btn btn-primary me-2" onclick="printTable()" style="width: 100px; height: 30px;">Print</button>
		<button class="btn btn-secondary" onclick="downloadTable()" style="width: 100px; height: 30px;">Download</button>
	</div>
</div>

				<div style="position: relative; padding-top: 20px;">
					<table class="table" style="position: relative; z-index: 1; color: #ffffff; font-family: 'YourFontFamily'; font-weight: normal; border-collapse: collapse;">
						<thead style="background: none;">
							<tr>
								<th style="border: none;">DRAW ID</th>
								<th style="border: none;">Date & Time</th>
								<th style="border: none;">Winning Numbers</th>
								<th style="border: none;">Winners</th>
							</tr>
						</thead>
						<tbody id="lotteryTableBody">
						</tbody>
					</table>
					<img src="images/taunament-border.png" alt="border" class="img-fluid jack-bor" style="position: absolute; top: 0; left: 0; width: 100%; height: auto; z-index: 0;">
				</div>
			</div>
		</div>



	</div>
</section>
<!-- Casino Jackpots End -->

<!-- How to Start -->
<section id="start" class="how-start back-light section">
	<div class="container">
		<div class="row justify-content-center text-center">
			<div class="col-lg-6">
				<div class="heading">
					<h2>Countdown to next weekly draw in </h2>
					<img src="images/heading-border-effect.png" class="img-fluid" alt="effect">
				</div>
			</div>


			<!-- test 1 -->


			<div class="row ">

				<div class="col-md-4">

					<div class="coundown">
						<span class="count-down"></span>
						<p>Hours</p>
					</div>

				</div>


				<div class="col-md-4">
					<div class="coundown count-dot">
						<span class="count-down2"></span>
						<p>Mins</p>
					</div>
				</div>


				<div class="col-md-4">
					<div class="coundown">
						<span class="count-down3"></span>
						<p>Secs</p>
					</div>
				</div>

			</div>


			<!-- test 2 -->


		</div>
	</div>
</section>
<!-- How to Start -->

<!-- Control Start -->

<section id="control" class="control back-light section">
	<div class="container">
		<div class="row justify-content-center text-center">
			<div class="col-lg-6">
				<div class="heading">
					<h2>How draws & results are determined </h2>
					<img src="images/heading-border-effect.png" class="img-fluid" alt="effect">
				</div>
			</div>
			<div class="row ">
				<div class="col-lg-6 col-md-12">
					<div class="row control-inner cont-bot">
						<div class="col-lg-3 col-md-2 col-4">
							<div class="control-img">
								<i class="fa flaticon-bill"></i>
							</div>
						</div>
						<div class="col-lg-9 col-md-10 col-8">
							<div class="control-text">
								<h3>Payment Limitation</h3>
								<p>Lorem ipsum dolor sit amet, consecteturt, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. sum dolor sit amet, consectetur adipisicing.</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-12">
					<div class="row control-inner">
						<div class="col-lg-3 col-md-2 col-4">
							<div class="control-img">
								<i class="fa flaticon-money"></i>
							</div>
						</div>
						<div class="col-lg-9 col-md-10 col-8">
							<div class="control-text">
								<h3>Profit Limitation</h3>
								<p>Lorem ipsum dolor sit amet, consecteturt, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. sum dolor sit amet, consectetur adipisicing.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row control-pad">
				<div class="border-effect1">
					<img src="images/border-effect.png" class="img-fluid" alt="effect">
				</div>
				<div class="border-effect2">
					<img src="images/border-effect.png" class="img-fluid" alt="effect">
				</div>
			</div>

			<div class="row">
				<div class="col-lg-6 col-md-12">
					<div class="row control-inner cont-bot">
						<div class="col-lg-3 col-md-2 col-4">
							<div class="control-img">
								<i class="fa flaticon-loss"></i>
							</div>
						</div>
						<div class="col-lg-9 col-md-10 col-8">
							<div class="control-text">
								<h3>Loss Limitation</h3>
								<p>Lorem ipsum dolor sit amet, consecteturt, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. sum dolor sit amet, consectetur adipisicing.</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-12">
					<div class="row control-inner">
						<div class="col-lg-3 col-md-2 col-4">
							<div class="control-img">
								<i class="fa flaticon-wallet-1"></i>
							</div>
						</div>
						<div class="col-lg-9 col-md-10 col-8">
							<div class="control-text">
								<h3>Deposit Limit</h3>
								<p>Lorem ipsum dolor sit amet, consecteturt, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. sum dolor sit amet, consectetur adipisicing.</p>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>
<!-- Control End -->

<div class="modal fade" id="winnersModal" tabindex="-1" aria-labelledby="winnersModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="winnersModalLabel">Winners</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<table class="table">
					<thead>
						<tr>
							<th>#NO</th>
							<th>TICKET ID</th>
							<th>PHONE NO</th>
							<th>NUMBER PICKS</th>
							<th>STAKE</th>
							<th>WINNINGS</th>
						</tr>
					</thead>
					<tbody id="winnersTableBody">
						<!-- Winner rows will be dynamically added here -->
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


<?php include('includes/footer.php'); ?>