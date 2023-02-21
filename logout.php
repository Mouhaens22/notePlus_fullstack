<?php 
session_start();
session_unset();
session_destroy();
$title='NotePlus | log out ';
$nonav='no';

include 'config.php';
echo '<center class="mt-5">

<div class="spinner-grow text-success"></div>
<div class="spinner-grow text-info"></div>
<div class="spinner-grow text-warning"></div>
<div class="spinner-grow text-danger"></div>
<div class="spinner-grow text-secondary"></div>

</center>
';
 header("refresh:1;url=index.php");
