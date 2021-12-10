<?php 
function check_session(){
    if(!isset($_SESSION['id'])){
        header("Location: login.php");
        exit;
    }
}
?>