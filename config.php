<?php
include "connectionDB.php";




// routes :
$tpl= "includes/templates/";
$layout="layout/";

// include files :
include "includes/functions/fcts.php";
include $tpl."head.php";
if(!isset($nonav)){
    include $tpl."header.php";
}
?>