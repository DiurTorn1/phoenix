<?php
$password = '3030';

// Generate a Bcrypt hash of the password
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

echo $hashed_password;
?>