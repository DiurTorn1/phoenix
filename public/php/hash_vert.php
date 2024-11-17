<?php 
  
  // Plaintext password entered by the user 
  $plaintext_password = $_POST['pass']; 
  
  // The hashed password retrieved from database 
  $hash = $_POST['pass1']; 
  
  // Verify the hash against the password entered 
  $verify = password_verify($plaintext_password, $hash); 
  
  // Print the result depending if they match 
  if ($verify) { 
      echo 'OK'; 
  } else { 
      echo 'Incorrect Password!'; 
  } 
?> 