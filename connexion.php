<?php

function requette($hote,$database,$username,$password,$requtte)
{
	$link = mysqli_connect( $hote, $username, $password, $database );
	$reqq = mysqli_query( $link, $requtte ) or die( mysqli_error( $link ) );
	return $reqq;
}
$password ='';$username = 'root';$database='lingenie_wp';$hote = 'localhost';