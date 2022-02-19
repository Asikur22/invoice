<?php

//if ( ! session_id() ) {
//	@ session_start();
//}

//if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
//	foreach ( $_POST as $key => $value ) {
//		$_POST[ $key ] = $value;
//	}
//}

$billingAmount = 0;
$discount      = 0;
$taxAmount     = 0;
$finalAmount   = 0;

if ( isset( $_POST['items'][0]['lineTotal'] ) ) {
	$items = array_values( $_POST['items'] );
	for ( $i = 0; $i < count( $items ); $i ++ ) {
		if ( empty( $items[ $i ]['lineTotal'] ) ) {
			$items[ $i ]['lineTotal'] = 0;
		}
		
		$billingAmount = $billingAmount + $items[ $i ]['lineTotal'];
	}
	if ( isset( $_POST['discountAmount'] ) ) {
		if ( ! empty( $_POST['discountAmount'] ) ) {
			$discount    = $_POST['discountAmount'];
			$finalAmount = $billingAmount - $discount;
		} else {
			$finalAmount = $billingAmount;
		}
	} else {
		$finalAmount = $billingAmount;
	}
	if ( isset( $_POST['taxPercent'] ) ) {
		if ( ! empty( $_POST['taxPercent'] ) ) {
			$taxAmount   = ( $finalAmount * $_POST['taxPercent'] ) / 100;
			$finalAmount = $finalAmount + $taxAmount;
		}
	}
}

function numberToCurrency( $number ) {
	$explrestunits = "";
	$number        = explode( '.', $number );
	$num           = $number[0];
	if ( strlen( $num ) > 3 ) {
		$lastthree = substr( $num, strlen( $num ) - 3, strlen( $num ) );
		$restunits = substr( $num, 0, strlen( $num ) - 3 ); // extracts the last three digits
		$restunits = ( strlen( $restunits ) % 2 == 1 ) ? "0" . $restunits : $restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
		$expunit   = str_split( $restunits, 2 );
		for ( $i = 0; $i < sizeof( $expunit ); $i ++ ) {
			// creates each of the 2's group and adds a comma to the end
			if ( $i == 0 ) {
				$explrestunits .= (int) $expunit[ $i ] . ","; // if is first value , convert into integer
			} else {
				$explrestunits .= $expunit[ $i ] . ",";
			}
		}
		$thecash = $explrestunits . $lastthree;
	} else {
		$thecash = $num;
	}
	if ( ! empty( $number[1] ) ) {
		if ( strlen( $number[1] ) == 1 ) {
			return $thecash . '.' . $number[1] . '0';
		} else {
			return $thecash . '.' . $number[1];
		}
	} else {
		return $thecash . '.00';
	}
}


function dateFormatter( $date ) {
	$date  = explode( '-', $date );
	$year  = $date[0];
	$month = $date[1];
	$day   = $date[2];
	
	$monthArray = [ 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' ];
	
	return $monthArray[ $month - 1 ] . ' ' . $day . ', ' . $year;
}

function get_field( $name ) {
	$data = '';
	if ( isset( $_POST[ $name ] ) && ! empty( $_POST[ $name ] ) ) {
		$data = $_POST[ $name ];
	}
	
	return $data;
}

function the_field( $name ) {
	echo get_field( $name );
}

if ( isset( $_REQUEST['invoiceTemplate'] ) ) {
	$template = 'templates/' . $_REQUEST['invoiceTemplate'] . '.php';
} else {
	echo 'No Template Defined';
	exit();
}

if ( file_exists( $template ) ) {
	require_once( $template );
} else {
	echo 'No Template File Found';
	exit();
}