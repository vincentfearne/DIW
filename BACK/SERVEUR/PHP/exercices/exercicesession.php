<?php

session_start();

$_SESSION["login"] = "webmaster";
$_SESSION["role"] = "admin";

echo"- session ID : ".session_id();

?>