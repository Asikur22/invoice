<?php

if ( ! session_id() ) {
	@ session_start();
}

$_SESSION['currency']        = 'Taka';
$_SESSION['currency_symbol'] = '৳';
$_SESSION['billingDate']     = date( "Y-m-d" );

$_SESSION['invoiceNumber'] = '1001';
$_SESSION['organisation']  = 'Green Life IT';
$_SESSION['website']       = 'https://greenlifeit.com';
//$_SESSION['firstName'] = 'Asiqur';
//$_SESSION['lastName'] = 'Rahman';
$_SESSION['yourEmail']   = 'admin@greenlifeit.com';
$_SESSION['yourPhone']   = '+880-172-356-4501';
$_SESSION['yourAddress'] = 'Rajshahi, Bangladesh';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Invoice Generator</title>
	
	<link rel="stylesheet" href="assets/css/bootstrap-v4.1.1.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
	
	<style>
		.form-group {
			margin-bottom: 15px;
		}
		
		.form-control {
			margin-top: 5px;
			border: 1px solid black;
		}
	</style>

</head>
<body>

<main class="p-4">
	<form method="post" action="invoice.php">
		<header class="container mb-3">
			<div class="row justify-content-between align-items-center">
				<div class="col-md-6">
					<h1 class="m-0">INVOICE GENERATOR</h1>
				</div>
				
				<div class="col">
					<div class="row justify-content-end ">
						<div class="col-md-4">
							<div class="form-group">
								<select name="invoiceTemplate" id="invoiceTemplate" class="form-control invoiceTemplate">
									<option value="template-1">Template 1</option>
									<option value="template-2">Template 2</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<input value="<?php echo isset( $_SESSION['invoiceNumber'] ) ? $_SESSION['invoiceNumber'] : '' ?>" type="text" class="form-control invoiceNumber" id="invoiceNumber" name="invoiceNumber" placeholder="Invoice Number">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<input value="<?php echo isset( $_SESSION['billingDate'] ) ? $_SESSION['billingDate'] : '' ?>" type="date" class="form-control billingDate" id="billingDate" name="billingDate">
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
		
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="well rounded p-3">
						<h2>Your Details</h2>
						<hr style="border-top: 1px solid #8c8b8b;">
						
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="organisation">Organisation:</label>
									<input value="<?php echo isset( $_SESSION['organisation'] ) ? $_SESSION['organisation'] : '' ?>" type="text" class="form-control organisation" name="organisation" id="organisation" placeholder="Organisation">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="website">Website:</label>
									<input value="<?php echo isset( $_SESSION['website'] ) ? $_SESSION['website'] : '' ?>" type="text" class="form-control website" name="website" id="website" placeholder="Website">
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="firstName">First Name:</label>
									<input value="<?php echo isset( $_SESSION['firstName'] ) ? $_SESSION['firstName'] : '' ?>" type="text" class="form-control firstName" id="firstName" name="firstName" placeholder="First Name">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="lastName">Last Name:</label>
									<input value="<?php echo isset( $_SESSION['lastName'] ) ? $_SESSION['lastName'] : '' ?>" type="text" class="form-control lastName" name="lastName" id="lastName" placeholder="Last Name">
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="bankName">Bank Name:</label>
									<input value="<?php echo isset( $_SESSION['bankName'] ) ? $_SESSION['bankName'] : '' ?>" type="text" class="form-control bankName" name="bankName" id="bankName" placeholder="Bank Name">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="branchName">Branch Name:</label>
									<input value="<?php echo isset( $_SESSION['branchName'] ) ? $_SESSION['branchName'] : '' ?>" type="text" class="form-control branchName" name="branchName" id="branchName" placeholder="Branch Name">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="accountNumber">Account No.:</label>
									<input value="<?php echo isset( $_SESSION['accountNumber'] ) ? $_SESSION['accountNumber'] : '' ?>" type="text" class="form-control accountNumber" id="accountNumber" name="accountNumber" placeholder="Account Number">
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="yourEmail">Email:</label>
									<input value="<?php echo isset( $_SESSION['yourEmail'] ) ? $_SESSION['yourEmail'] : '' ?>" type="text" class="form-control yourEmail" name="yourEmail" id="yourEmail" placeholder="Your Email">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="yourPhone">Phone:</label>
									<input value="<?php echo isset( $_SESSION['yourPhone'] ) ? $_SESSION['yourPhone'] : '' ?>" type="text" class="form-control yourPhone" name="yourPhone" id="yourPhone" placeholder="Your Phone">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="yourAddress">Address:</label>
									<input value="<?php echo isset( $_SESSION['yourAddress'] ) ? $_SESSION['yourAddress'] : '' ?>" type="text" class="form-control yourAddress" name="yourAddress" id="yourAddress" placeholder="Your Address">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="well rounded p-3">
						<h2>Client Details</h2>
						<hr style="border-top: 1px solid #8c8b8b;">
						
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="companyName">Company Name:</label>
									<input value="<?php echo isset( $_SESSION['companyName'] ) ? $_SESSION['companyName'] : '' ?>" type="text" class="form-control companyName" name="companyName" id="companyName" placeholder="Company Name">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="clientName">Client Full Name:</label>
									<input value="<?php echo isset( $_SESSION['clientName'] ) ? $_SESSION['clientName'] : '' ?>" type="text" class="form-control clientName" name="clientName" id="clientName" placeholder="Client Full Name">
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="clientAddress">Address:</label>
									<input value="<?php echo isset( $_SESSION['clientAddress'] ) ? $_SESSION['clientAddress'] : '' ?>" type="text" class="form-control clientAddress" id="clientAddress" name="clientAddress" placeholder="Address">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="clientAddress_2">Address 2:</label>
									<input value="<?php echo isset( $_SESSION['clientAddress_2'] ) ? $_SESSION['clientAddress_2'] : '' ?>" type="text" class="form-control clientAddress_2" id="clientAddress_2" name="clientAddress_2" placeholder="State, Country">
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="clientPhone">Phone</label>
									<input value="<?php echo isset( $_SESSION['clientPhone'] ) ? $_SESSION['clientPhone'] : '' ?>" type="text" class="form-control clientPhone" name="clientPhone" id="clientPhone" placeholder="Phone">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="clientEmail">Email:</label>
									<input value="<?php echo isset( $_SESSION['clientEmail'] ) ? $_SESSION['clientEmail'] : '' ?>" type="text" class="form-control clientEmail" name="clientEmail" id="clientEmail" placeholder="Email">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-12">
					<div class="well p-3 mt-3 rounded">
						<h2>Notes</h2>
						<hr style="border-top: 1px solid #8c8b8b;">
						
						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<label for="orderNote">Order Note</label>
									<textarea class="form-control orderNote" name="orderNote" id="orderNote" placeholder="Order Note"><?php echo isset( $_SESSION['orderNote'] ) ? $_SESSION['orderNote'] : '' ?></textarea>
								</div>
							</div>
						</div>
					
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-12">
					<div class="well articles p-3 mt-3 rounded">
						<h2>Items <small class="pull-right">Total: <span class="total">0.00</span><?php echo $_SESSION['currency_symbol']; ?></small></h2>
						<hr style="border-top: 1px solid #8c8b8b;">
						
						<div class="row">
							<div class="col-md-5">Items</div>
							<div class="col-md-2">Unit Price</div>
							<div class="col-md-2">Quantity</div>
							<div class="col-md-2">Line Total</div>
							<div class="col-md-1"></div>
						</div>
						
						<div class="row item">
							<div class="col-md-5">
								<div class="form-group">
									<input name="items[0][articlesName]" value="<?php echo isset( $_SESSION['items'][0]['articlesName'] ) ? $_SESSION['items'][0]['articlesName'] : '' ?>" type="text" class="form-control articlesName" placeholder="Item">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<input name="items[0][unitPrice]" value="<?php echo isset( $_SESSION['items'][0]['unitPrice'] ) ? $_SESSION['items'][0]['unitPrice'] : '' ?>" type="number" class="form-control unitPrice" placeholder="Unit Price" value="" min="0">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<input name="items[0][quantity]" value="<?php echo isset( $_SESSION['items'][0]['quantity'] ) ? $_SESSION['items'][0]['quantity'] : '' ?>" type="number" class="form-control quantity" placeholder="0" value="" min="0">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<input name="items[0][lineTotal]" value="<?php echo isset( $_SESSION['items'][0]['lineTotal'] ) ? $_SESSION['items'][0]['lineTotal'] : 0 ?>" type="text" class="form-control lineTotal" placeholder="Line Total" value="0">
								</div>
							</div>
							<div class="col-md-1"></div>
						</div>
						
						<?php
						if ( ! empty( $_SESSION['items'] ) ) {
							$old_items = array_values( $_SESSION['items'] );
							for ( $i = 1; $i < count( $old_items ); $i ++ ) {
								if ( empty( $old_items[ $i ]['articlesName'] ) ) {
									$old_items[ $i ]['articlesName'] = '';
								}
								if ( empty( $old_items[ $i ]['unitPrice'] ) ) {
									$old_items[ $i ]['unitPrice'] = '';
								}
								if ( empty( $old_items[ $i ]['quantity'] ) ) {
									$old_items[ $i ]['quantity'] = '';
								}
								if ( empty( $old_items[ $i ]['lineTotal'] ) ) {
									$old_items[ $i ]['lineTotal'] = 0;
								}
								
								echo '<div class="row item">';
								echo '<div class="col-md-5"><div class="form-group"><input name="items[' . $i . '][articlesName]" value="' . $old_items[ $i ]['articlesName'] . '" type="text" class="form-control articlesName" placeholder="Item"></div></div>';
								echo '<div class="col-md-2"><div class="form-group"><input name="items[' . $i . '][unitPrice]" value="' . $old_items[ $i ]['unitPrice'] . '" type="number" min="0" class="form-control unitPrice" placeholder="Unit Price" value=""></div></div>';
								echo '<div class="col-md-2"><div class="form-group"><input name="items[' . $i . '][quantity]" value="' . $old_items[ $i ]['quantity'] . '" type="number" min="0" value="" class="form-control quantity" placeholder="0"></div></div>';
								echo '<div class="col-md-2"><div class="form-group"><input name="items[' . $i . '][lineTotal]" value="' . $old_items[ $i ]['lineTotal'] . '" type="text" class="form-control lineTotal" placeholder="Line Total" value="0"></div></div>';
								echo '<div class="col-md-1"><button type="button" class="btn btn-danger deleteItemBlock">&times;</div></div>';
							}
						}
						?>
						<div class="row itemBeforeThis">
							<div class="col-12 addNewItem text-center rounded" style="background-color:#fff6d1;border-style: dotted dotted dotted dotted;cursor:pointer;">
								<h4 class="m-0 p-2">+ Click to add more items</h4>
							</div>
						</div>
					
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-6">
					<div class="well rounded p-3 mt-3">
						<h2>Discount</h2>
						<hr style="border-top: 1px solid #8c8b8b;">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input value="<?php echo isset( $_SESSION['discountAmount'] ) ? $_SESSION['discountAmount'] : '' ?>" type="text" class="form-control discountAmount" name="discountAmount" placeholder="Amount">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="well rounded p-3 mt-3">
						<h2>Tax <small class="pull-right">Final: <span class="final">0.00</span><?php echo $_SESSION['currency_symbol']; ?></small></h2>
						<hr style="border-top: 1px solid #8c8b8b;">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input value="<?php echo isset( $_SESSION['taxName'] ) ? $_SESSION['taxName'] : '' ?>" type="text" class="form-control taxName" name="taxName" placeholder="Tax">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input value="<?php echo isset( $_SESSION['taxPercent'] ) ? $_SESSION['taxPercent'] : '' ?>" type="text" class="form-control taxPercent" name="taxPercent" placeholder="Percentage">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-12">
					<div class="well rounded p-3 mt-3">
						<h2>Paid Amount</h2>
						<hr style="border-top: 1px solid #8c8b8b;">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input value="<?php echo isset( $_SESSION['paidAmount'] ) ? $_SESSION['paidAmount'] : '' ?>" type="text" class="form-control paidAmount" name="paidAmount" placeholder="Amount">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<footer class="container">
			<div class="row ">
				<div class="col-md-12">
					<div class="well mt-3 p-3 text-center">
						<button type="submit" class="btn btn-lg btn-primary generate w-50"><i class="fa fa-print"></i> GENERATE INVOICE</button>
					</div>
				</div>
			</div>
		</footer>
	</form>
</main>

<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-notify.min.js"></script>
<script type="text/javascript" src="assets/js/all.js"></script>

<script type="text/javascript">
	$( document ).ready( function () {
		var item_block_no = <?php echo empty( $_SESSION['items'] ) ? 1 : count( $_SESSION['items'] ) + 1; ?>;
		
		function item_block( item_no ) {
			return '<div class="row item">' +
			       '<div class="col-md-5"><div class="form-group"><input type="text" name="items[' + item_no + '][articlesName]" class="form-control articlesName" placeholder="Item"></div></div>' +
			       '<div class="col-md-2"><div class="form-group"><input type="number" name="items[' + item_no + '][unitPrice]" min="0" class="form-control unitPrice" placeholder="Unit Price" value=""></div></div>' +
			       '<div class="col-md-2"><div class="form-group"><input type="number" name="items[' + item_no + '][quantity]" min="0" value="" class="form-control quantity" placeholder="0"></div></div>' +
			       '<div class="col-md-2"><div class="form-group"><input type="text" name="items[' + item_no + '][lineTotal]" class="form-control lineTotal" placeholder="Line Total" value="0"></div></div>' +
			       '<div class="col-md-1"><button type="button" class="btn btn-danger deleteItemBlock">&times;</div></div>';
		}
		
		function numberToCurrency( number ) {
			number = number.toString();
			var afterPoint = '';
			if ( number.indexOf( '.' ) > 0 ) {
				afterPoint = number.substring( number.indexOf( '.' ), number.length );
			}
			number = Math.floor( number );
			number = number.toString();
			var lastThree = number.substring( number.length - 3 );
			var otherNumbers = number.substring( 0, number.length - 3 );
			if ( otherNumbers != '' ) {
				lastThree = ',' + lastThree;
			}
			var res = otherNumbers.replace( /\B(?=(\d{2})+(?!\d))/g, "," ) + lastThree + afterPoint;
			return res;
		}
		
		updateTotal();
		
		function updateTotal() {
			var sumTotal = 0
			var sumFinal = 0
			$( '.item' ).each( function ( index ) {
				sumTotal = parseInt( sumTotal ) + parseInt( $( this ).find( '.lineTotal' ).val() );
			} );
			
			var discount = $( '.discountAmount' ).val();
			console.log( 'Discounted anount' + discount );
			if ( !isNaN( discount ) ) {
				sumFinal = sumTotal - discount;
			}
			
			console.log( sumFinal );
			
			var tax = $( '.taxPercent' ).val();
			if ( !isNaN( tax ) ) {
				sumFinal = sumFinal + (
					(
						sumFinal * tax
					) / 100
				);
			}
			
			if ( !isNaN( sumTotal ) ) {
				$( '.total' ).html( numberToCurrency( sumTotal ) );
				$( '.final' ).html( numberToCurrency( sumFinal ) );
			}
		}
		
		$( '.addNewItem' ).click( function () {
			$( item_block( item_block_no ) ).insertBefore( '.itemBeforeThis' );
			item_block_no = item_block_no + 1;
			updateTotal();
		} );
		
		$( '.articles' ).on( 'click', '.deleteItemBlock', function () {
			$( this ).parent().parent().remove();
			updateTotal();
		} );
		
		$( '.articles' ).on( 'click focus keyup change focusout', '.lineTotal', function () {
			var unitPrice = $( this ).parent().parent().parent().find( '.unitPrice' ).val();
			var quantity = $( this ).parent().parent().parent().find( '.quantity' ).val();
			var articlesName = $( this ).parent().parent().parent().find( '.articlesName' ).val();
			
			if ( articlesName == '' ) {
				$( this ).parent().parent().parent().find( '.articlesName' ).css( 'border', '1px solid red' );
				$( this ).parent().parent().parent().find( '.articlesName' ).css( 'background-color', '#ffeaea' );
			} else {
				$( this ).parent().parent().parent().find( '.articlesName' ).css( 'border', '1px solid black' );
				$( this ).parent().parent().parent().find( '.articlesName' ).css( 'background-color', '#fff' );
			}
			
			if ( unitPrice != '' && quantity != '' ) {
				var lineTotalVal = unitPrice * quantity;
				$( this ).parent().parent().parent().find( '.lineTotal' ).val( lineTotalVal );
			}
			updateTotal();
		} );
		
		$( '.articles' ).on( 'click focus keyup change focusout', '.quantity', function () {
			var unitPrice = $( this ).parent().parent().parent().find( '.unitPrice' ).val();
			var quantity = $( this ).parent().parent().parent().find( '.quantity' ).val();
			var articlesName = $( this ).parent().parent().parent().find( '.articlesName' ).val();
			
			if ( articlesName == '' ) {
				$( this ).parent().parent().parent().find( '.articlesName' ).css( 'border', '1px solid red' );
				$( this ).parent().parent().parent().find( '.articlesName' ).css( 'background-color', '#ffeaea' );
			} else {
				$( this ).parent().parent().parent().find( '.articlesName' ).css( 'border', '1px solid black' );
				$( this ).parent().parent().parent().find( '.articlesName' ).css( 'background-color', '#fff' );
			}
			
			if ( unitPrice != '' && quantity != '' ) {
				var lineTotalVal = unitPrice * quantity;
				$( this ).parent().parent().parent().find( '.lineTotal' ).val( lineTotalVal );
			}
			updateTotal();
		} );
		
		$( '.articles' ).on( 'click focus keyup change focusout', '.unitPrice', function () {
			var unitPrice = $( this ).parent().parent().parent().find( '.unitPrice' ).val();
			var quantity = $( this ).parent().parent().parent().find( '.quantity' ).val();
			var articlesName = $( this ).parent().parent().parent().find( '.articlesName' ).val();
			
			if ( articlesName == '' ) {
				$( this ).parent().parent().parent().find( '.articlesName' ).css( 'border', '1px solid red' );
				$( this ).parent().parent().parent().find( '.articlesName' ).css( 'background-color', '#ffeaea' );
			} else {
				$( this ).parent().parent().parent().find( '.articlesName' ).css( 'border', '1px solid black' );
				$( this ).parent().parent().parent().find( '.articlesName' ).css( 'background-color', '#fff' );
			}
			
			if ( unitPrice != '' && quantity != '' ) {
				var lineTotalVal = unitPrice * quantity;
				$( this ).parent().parent().parent().find( '.lineTotal' ).val( lineTotalVal );
			}
			updateTotal();
		} );
		
		$( '.articles' ).on( 'keyup focus keyup click focusout', '.articlesName', function () {
			var articlesName = $( this ).parent().parent().parent().find( '.articlesName' ).val();
			
			if ( articlesName == '' ) {
				$( this ).parent().parent().parent().find( '.articlesName' ).css( 'border', '1px solid red' );
				$( this ).parent().parent().parent().find( '.articlesName' ).css( 'background-color', '#ffeaea' );
			} else {
				$( this ).parent().parent().parent().find( '.articlesName' ).css( 'border', '1px solid black' );
				$( this ).parent().parent().parent().find( '.articlesName' ).css( 'background-color', '#fff' );
			}
			updateTotal();
		} );
		
		$( '.discountAmount' ).on( 'keyup focus keyup click focusout', function () {
			updateTotal();
		} );
		
		$( '.taxPercent' ).on( 'keyup focus keyup click focusout', function () {
			updateTotal();
		} );
	} );
</script>

</body>
</html>
