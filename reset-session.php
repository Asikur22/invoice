<?php
if ( ! session_id() ) {
	@ session_start();
}

session_unset();

echo 'Success<br>';

echo '<br><a href="index.php">Go Home</a>';