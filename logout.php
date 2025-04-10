<?php
  
require_once 'services/commons.php';
require_once 'services/auth.php';

if (logoutUser()) {
  redirect('/');
}

?>