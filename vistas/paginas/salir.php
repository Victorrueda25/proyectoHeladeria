<?php
session_start();

$_SESSION = [];

session_destroy();

header("Location: /proyectoHeladeria/index.php?paginas=login");
exit;
