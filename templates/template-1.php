<?php
/**
 *
 * @var $billingAmount
 * @var $finalAmount
 *
 */
$table_col = array( '#', 'Item', 'Total' );

//echo '<pre style="background: #fff; color: #000; padding: 15px; text-align: left;">';
//var_dump( $_POST );
//echo '</pre>';

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Invoice Receipt - <?php the_field( 'invoiceNumber' ); ?></title>
	
	<link rel="stylesheet" href="assets/css/bootstrap-v4.1.1.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
	
	<style>
		body {
			background-color: #000;
		}
		
		.padding {
			padding: 2rem !important;
		}
		
		.card {
			margin-bottom: 30px;
			border: none;
			-webkit-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
			-moz-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
			box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
		}
		
		.card-header {
			background-color: #fff;
			border-bottom: 1px solid #e6e6f2;
		}
		
		h3 {
			font-size: 20px;
		}
		
		.text-dark {
			color: #3d405c !important;
		}
		
		@media print {
			.help-links {
				display: none;
			}
		}
	</style>
</head>
<body>
<main>
	<div class="help-links">
		<a href="reset-session.php">Reset Session</a>
		<a href="index.php">Go Home</a>
	</div>
	<div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
		<div class="card">
			<header class="card-header p-4 align-items-center d-flex justify-content-between">
				<a class="py-4 d-inline-block" href="https://greenlifeit.com/" target="_blank">
					<img src="<?php echo urlencode( $_POST['logo'] ); ?>" alt="<?php the_field( 'company' ); ?>" class="w-75">
				</a>
				<div class="float-right">
					<h3 class="text-dark mb-1"><?php the_field( 'company' ); ?></h3>
					<div class="font-weight-bold"><?php echo get_field( 'name' ); ?></div>
					<div><?php the_field( 'address' ); ?></div>
					<div><?php the_field( 'phone' ); ?></div>
					<div><?php the_field( 'email' ); ?></div>
				</div>
			</header>
			<div class="card-body">
				<div class="row mb-4 justify-content-between align-items-center">
					<div class="col-12 col-sm-6">
						<div class="mb-3">Invoiced To:</div>
						<h3 class="text-dark mb-1"><?php the_field( 'clientCompany' ); ?></h3>
						<div class="font-weight-bold"><?php the_field( 'clientName' ); ?></div>
						<div><?php the_field( 'clientAddress' ); ?></div>
						<div><?php the_field( 'clientAddress_2' ); ?></div>
						<div><?php the_field( 'clientPhone' ); ?></div>
						<div><?php the_field( 'clientEmail' ); ?></div>
					</div>
					<div class="col-12 col-sm-6 text-right">
						<h3 class="mb-0">Invoice #<?php the_field( 'invoiceNumber' ); ?></h3>
						Date: <?php echo dateFormatter( get_field( 'invoiceDate' ) ); ?>
					</div>
				</div>
				<?php if ( get_field( 'orderNote' ) ) : ?>
					<div class="row">
						<div class="col-12 mb-3 font-weight-bold">
							<?php echo nl2br( get_field( 'orderNote' ) ); ?>
						</div>
					</div>
				<?php endif; ?>
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
						<tr>
							<?php if ( in_array( '#', $table_col ) ) : ?>
								<th class="text-left">#</th>
							<?php endif; ?>
							<?php if ( in_array( 'Item', $table_col ) ) : ?>
								<th>Item</th>
							<?php endif; ?>
							<?php if ( in_array( 'Desc', $table_col ) ) : ?>
								<th>Description</th>
							<?php endif; ?>
							<?php if ( in_array( 'Total', $table_col ) ) : ?>
								<th class="text-right">Total</th>
							<?php endif; ?>
						</tr>
						</thead>
						<tbody>
						<?php $items = array_values( $_POST['items'] ); ?>
						<?php if ( ! empty( $items ) ) : ?>
							<?php for ( $i = 0; $i < count( $items ); $i ++ ) : ?>
								<?php
								if ( empty( $items[ $i ]['articlesName'] ) ) {
									$items[ $i ]['articlesName'] = '';
								}
								if ( empty( $items[ $i ]['unitPrice'] ) ) {
									$items[ $i ]['unitPrice'] = 0;
								}
								if ( empty( $items[ $i ]['quantity'] ) ) {
									$items[ $i ]['quantity'] = 0;
								}
								if ( empty( $items[ $i ]['lineTotal'] ) ) {
									$items[ $i ]['lineTotal'] = 0;
								}
								?>
								<tr>
									<?php if ( in_array( '#', $table_col ) ) : ?>
										<td class="text-left"><?php echo $i + 1; ?></td>
									<?php endif; ?>
									<?php if ( in_array( 'Item', $table_col ) ) : ?>
										<td class="text-left strong"><?php echo $items[ $i ]['articlesName']; ?></td>
									<?php endif; ?>
									<?php if ( in_array( 'Desc', $table_col ) ) : ?>
										<td class="text-left"><?php echo $items[ $i ]['desc']; ?></td>
									<?php endif; ?>
									<?php if ( in_array( 'Total', $table_col ) ) : ?>
										<td class="text-right"><?php echo $items[ $i ]['lineTotal'] == 0 ? '-' : $items[ $i ]['lineTotal']; ?></td>
									<?php endif; ?>
								</tr>
							<?php endfor; ?>
						<?php endif; ?>
						</tbody>
					</table>
				</div>
				<div class="row">
					<div class="col-12 col-lg-6 offset-lg-6  mt-4">
						<?php
						$discountAmount = get_field( 'discountAmount' );
						$taxPercent     = get_field( 'taxPercent' );
						$paidAmount     = get_field( 'paidAmount' );
						?>
						<table class="table table-clear">
							<?php
							if ( ! ( empty( $discountAmount ) && empty( $taxPercent ) && empty( $paidAmount ) ) ) {
								echo '<tr>';
								echo '<td><strong>Subtotal</strong></td>';
								echo '<td class="text-right sumTotal"><strong>' . numberToCurrency( $billingAmount ) . '</strong></td>';
								echo '</tr>';
							}
							
							if ( ! empty( $discountAmount ) ) {
								echo '<tr><td><strong>Discount</strong></td>';
								echo '<td class="text-right discountAmount">' . numberToCurrency( $discountAmount ) . '</td></tr>';
								echo '<tr><td><strong>Total After Discount</strong></td>';
								echo '<td class="text-right discountAmount">' . numberToCurrency( $billingAmount - $discountAmount ) . '</td></tr>';
							}
							
							if ( ! empty( $taxPercent ) ) {
								echo '<tr><td><strong>TAX (' . $_POST['taxName'] . ' ' . $_POST['taxPercent'] . '%)</strong></td>';
								$taxAmount = ( $billingAmount * $taxPercent ) / 100;
								echo '<td class="text-right discountAmount">' . numberToCurrency( $taxAmount ) . '</td></tr>';
							}
							
							if ( ! empty( $paidAmount ) )  : ?>
								<tr>
									<td><strong>Amount Payed</strong></td>
									<td class="text-right amountPayed">
										<?php echo numberToCurrency( $paidAmount ); ?>
									</td>
								</tr>
							<?php endif; ?>
							<tr>
								<td class="tenPadding"><strong>Total (<?php echo $_POST['currency']; ?>)</strong></td>
								<td class="text-right totalAmount"><strong><?php echo numberToCurrency( $finalAmount ); ?></strong></td>
							</tr>
						</table>
					</div>
				</div>
				<div class="row mt-4 pt-5">
					<div class="col-lg-12 text-center">We greatly appreciate the opportunity to provide you with our professional services.</div>
				</div>
			</div>
			<footer class="card-footer bg-white mt-2">
				<p class="mb-0 text-center"><small><?php the_field( 'company' ); ?>, <?php the_field( 'address' ); ?></small></p>
			</footer>
		</div>
	</div>
</main>
</body>
</html>
