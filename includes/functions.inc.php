<?php

function emptyInputSignup($phonenumber, $name){
  $result;

  if(empty($phonenumber) || empty($name)){
      $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}

function phonenumberExists($conn, $phonenumber){
  $sql = "SELECT  * FROM users WHERE usersPhonenumber = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../index.php?error=stmtfailed");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "s", $phonenumber);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($resultData)) {
    return $row;
  }
  else {
    $result=false;
    return $result;
  }
  mysqli_stmt_close($stmt);
}

function userExists($conn, $name){
  $sql = "SELECT  * FROM users WHERE usersName = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../index.php?error=stmtfailed");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "s", $name);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($resultData)) {
    return $row;
  }
  else {
    $result=false;
    return $result;
  }
  mysqli_stmt_close($stmt);
}

function createUser($conn, $phonenumber, $name, $address){
  $sql = "INSERT INTO users (usersPhonenumber, usersName, usersAddress) VALUES (?, ?, ?);";
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../index.php?error=stmtfailed");
    exit();
  }


  mysqli_stmt_bind_param($stmt, "sss", $phonenumber, $name, $address);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("location: ../index.php?error=none");
  exit();
}

function emptyInputLogin($phonenumber){
  $result;

  if(empty($phonenumber)){
      $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}

function loginUser($conn, $phonenumber, $user ){
  $numberExists = phonenumberExists($conn, $phonenumber);
  $number = phonenumberExists($conn, $phonenumber);
  if ($numberExists === false) {
    header("location: ../index.php?error=wrongLogin");
    exit();
  }
  else {
    session_start();
    $numberExists = phonenumberExists($conn, $phonenumber);
    $userExists = userExists($conn, $user);
    $_SESSION["lognum"]= $phonenumber;
    $_SESSION["logid"] = $numberExists["usersName"];

    $sql = "INSERT INTO timestamp (usersPhonenumber, usersName) VALUES (?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ../index.php?error=stmtfailed");
      exit();
    }


    mysqli_stmt_bind_param($stmt, "ss", $_SESSION["lognum"], $_SESSION["logid"]);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);


    session_unset();
    session_destroy();
    header("location: ../index.php?error=none_login");
    exit();
  }

}
