<?php


function generate_password() {

  $alpha = "abcdefghijklmnopqrstuvwxyz";
  $alpha_upper = strtoupper($alpha);
  $numeric = "0123456789";
  $special = ".-+=_,!@$#*%[]{}";
  $chars = "";

  if (isset($_POST['length'])){
    if (isset(       $_POST['alpha']) &&       $_POST['alpha'] == 'on') { $chars .= $alpha; }
    if (isset( $_POST['alpha_upper']) && $_POST['alpha_upper'] == 'on') { $chars .= $alpha_upper; }
    if (isset(     $_POST['numeric']) &&     $_POST['numeric'] == 'on') { $chars .= $numeric; }
    if (isset(     $_POST['special']) &&     $_POST['special'] == 'on') { $chars .= $special; }
    $length = $_POST['length'];
  } else {
    $chars = $alpha . $alpha_upper . $numeric;
    $length = 14;
  }

  $len = strlen($chars);
  $pw = '';

  for ($i = 0; $i < $length; $i++) {
    $pw .= substr($chars, rand(0, $len-1), 1);
  }

  $pw = str_shuffle($pw);

  return $pw;

}


?>
