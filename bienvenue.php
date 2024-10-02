<?php
session_start();
if(isset($_SESSION["sessionEmail"])){
    header("Location: index.php");
}
?>