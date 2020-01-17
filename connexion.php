<?php


function requette($requtte)
{
    $password ='';$username = 'root';$database='lingenie_wp';$hote = 'localhost';
    $link = mysqli_connect( $hote, $username, $password, $database );
    $reqq = mysqli_query( $link, $requtte ) or die( mysqli_error( $link ) );
    return $reqq;
}