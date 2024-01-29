<?php
session_start();
session_unset();
session_destroy();

header("Locaion: menuprinc.php");
?>