<?php
$connection = mysqli_connect('localhost', 'root', '', 'game');

if(mysqli_error($connection)) {
	die('Error connecting to database...');
}