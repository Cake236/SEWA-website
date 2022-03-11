<?php

$serverName1 = "localhost";
$dBUsername1 = "id18483306_root1";
$dBPassword1 = "}(QhY{fW@zPx8daQ";
$dBName1 = "id18483306_timestamp";

$connlogin = mysqli_connect($serverName1, $dBUsername1, $dBPassword1, $dBName1);

if (!$connlogin) {
  die("Connection failed: " . mysqli_connect_error());
}
