<?php

if (isset($_POST["submit"])) {

  $phonenumber = $_POST["phonenumber"];
  $name = $_POST["name"];
  $address = $_POST["address"];
  $user = "123";

  require_once 'dbh.inc.php';
  require_once 'dbh1.inc.php';
  require_once 'functions.inc.php';

  if (emptyInputSignup($phonenumber, $name, $address ) !== false) {
    header("location: ../index.php?error=emptyinput");
    exit();
  }

  //if (phonenumberExists($conn, $phonenumber) !== false) {
  //  header("location: ../index.php?error=phonenumbertaken");
  //  exit();
  //}

  if (userExists($conn, $name) !== false) {
    header("location: ../index.php?error=usernametaken");
    exit();
  }

  createUser($conn, $phonenumber, $name, $address);

  if(loginUser($conn, $phonenumber, $connlogin, $user) !== false){
    header("location: ../index.php?error=none");
    echo "You have signed up and logged in";
    exit();
  }

}
else {
  header("location: ../index.php");
  exit();
}
