<?php

if (isset($_POST["submit1"])) {

    $phonenumber = $_POST["phonenumber_login"];
    $user = "123";


    require_once 'dbh.inc.php';

    require_once 'functions.inc.php';

    if (emptyInputLogin($phonenumber) !== false) {
      header("location: ../index.php?error=emptyinput");
      exit();
    }

    if(loginUser($conn, $phonenumber, $user) !== false){
      header("location: ../index.php?error=none");
      echo "You have logged in";
      exit();
    }

}
else if (isset($_POST["submit"])) {

    $phonenumber = $_POST["phonenumber_login"];
    $user = "123";


    require_once 'dbh.inc.php';
    require_once 'dbh1.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputLogin($phonenumber) !== false) {
      header("location: ../index.php?error=emptyinput");
      exit();
    }

    if(loginUser($conn, $phonenumber, $connlogin, $user) !== false){
      header("location: ../index.php?error=none");
      echo "You have logged in";
      exit();
    }

}
else {
  header("location: ../index.php");
  exit();
}
