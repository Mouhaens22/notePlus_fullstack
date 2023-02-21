<?php
session_start();
$title='NotePlus | log in ';
$nonav='no';

include "config.php";

if (isset($_SESSION['username'])){
    header('location:  home.php');  // redirect to dashbord
    exit();
}

if ( $_SERVER['REQUEST_METHOD']=='POST'){

    $username=$_POST['username'];
    $password=$_POST['password'];

    // check if user exist:
    $search=$con->prepare("SELECT username,password FROM user WHERE username=? AND password=?");
    $search->execute(array($username,$password));
    $row=$search->fetch();

    
    if($search->rowCount() >0){
        $_SESSION['username']=$username;
        $_SESSION['name']=$row['fname']." ".$row['lname'];
        header('location:  home.php');
        exit();
    }

}

?>
<div class="login">
        <div class="container row">
            <form action="index.php" class="col-md-6 col-lg-5 col-sm-8 col-xs-11" method='POST'>
                <h3 id="title">log in to your account</h3>
                <div class="form-input">
                    <input type="name"name='username' class="form-control" id="username" placeholder="username...">
                </div>

                <div class="form-input">
                    <input type="password"name='password' id="password" class="form-control" placeholder="password...">
                </div>
                <a href="forget.html" class="d-block text-right">forget password?</a>
                <input type="submit" class="btn btn-success" id="connect" value='log in '>
                <a href="signup.php" class="btn btn-primary">sign up</a>
            </form>

        </div>
    </div>


<?php
include $tpl."footer.php";
?>