<?php

$conn = mysqli_connect('localhost', 'root', '', 'my_pavitis');

if(!$conn){
	die("Connection failed: ".mysqli_connect_error());
}