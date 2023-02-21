<?php
session_start();
$title='NotePlus | sign up ';
$nonav='no';

include "config.php";

if ( $_SERVER['REQUEST_METHOD']=='POST'){

    if(isset($_POST['sign1'])){
        if($_POST['password']==$_POST['cpassword']){

            $username =  $_POST['username'];
            $sql = "INSERT INTO user(username, fname,
                                         lname,password) 
                                         VALUES (?,?,?,?)";
            $stmt= $con->prepare($sql);
            $stmt->execute(array(
                $username,$_POST['fname'],$_POST['lname']
                ,$_POST['password']
            ));
            $_SESSION['username']=$username;
            header('location: signup.php?pageid=2');

        }else{
            echo '<div class="alert msg alert-danger"> les mots de passe que vous entrez ne sont pas identiques </div>';
        }
    }
    if(isset($_POST['sign2'])){
        header('location: signup.php?pageid=3');
    }

}

$pageid=(isset($_GET['pageid']))?$_GET['pageid']:'1';
?>
<div class="login sign container">
    <div class=" row"><?php
    if($pageid=='1'){  ?> 
        <form action="signup.php" method='POST' class="col-md-8">
            <h3>sign up to your account</h3>
            <table >

                <tr>
                    <td class='label'>
                        <label for="username">first name </label>
                    </td>
                    <td class='input'>
                        <input type="text"required='required' name='fname' class="form-control" id="username" placeholder="ex : Mohamed">
                    </td>
                    <td><span class="text-danger">*</span></td>
                </tr>

                <tr>
                    <td class='label'>
                        <label>last name </label>
                    </td>
                    <td class='input'>
                        <input type="text"required='required' name='lname' class="form-control"  placeholder="ex : kamal">
                    </td>
                    <td><span class="text-danger">*</span></td>

                </tr>

                <tr>
                    <td class='label'>
                        <label >username </label>
                    </td>
                    <td class='input'>
                        <input type="text"required='required' name='username' class="form-control"  placeholder="ex :mohamed12">
                    </td>
                    <td><span class="text-danger">*</span></td>

                </tr>

                <tr>
                    <td class='label'>
                        <label >password :</label>
                    </td>
                    <td class='input'>
                        <input type="password"required='required' name='password' class="form-control">
                    </td>
                    <td><span class="text-danger">*</span></td>

                </tr>

                <tr>
                    <td class='label'>
                        <label >confirm password :</label>
                    </td>
                    <td class='input'>
                        <input type="password"required='required' name='cpassword' class="form-control">
                    </td>
                    <td><span class="text-danger">*</span></td>

                </tr>

            </table>
            <div class="btns">
                    <a href="index.php" class="btn skip btn-secondary">concel</a>
                    <input type="submit" name="sign1" class="btn  next btn-success" value="next">
            </div>
        </form>
         <?php
    }elseif($pageid=='2'){?>

        <form action="signup.php?pageid=3" method='POST' class="col-md-8">
            <h3 class="text-success"> you have successfuly register .</h3>
                <p class="text-secondary">you can complete your profile now or redirect to home. </p>
                <div class="btns">
                    <a href="home.php" class="btn skip btn-secondary">skip</a>
                    <input type="submit" name="sign2" class="btn  next btn-success" value="next">
                </div>
        </form> <?php

    }elseif($pageid=='3'){;?>

        <form action="signup.php" method='POST' class="col-md-8">
            <h3>complete informations </h3>
            <table >
                <tr>
                    <td class='label'>
                        <label>telephone :</label>
                    </td>
                    <td class='input'>
                        <input type="text" name='tel' class="form-control"  placeholder="ex : 01 23 45 67 89">
                    </td>
                </tr>

                <tr>
                    <td class='label'>
                        <label >profil image : </label>
                    </td>
                    <td class='input'>
                        <input type="file"name="img[]" accept="application/images" class="form-control">
                    </td>
                </tr>

                <tr>
                    <td class='label'>
                        <label >birthday date :</label>
                    </td>
                    <td class='input'>
                        <input type="date"required='required' name='dtn' class="form-control">
                    </td>
                </tr>


            </table>
            <div class="btns">
                    <a href="home.php" class="btn skip btn-secondary">concel</a>
                    <input type="submit" name="sign3" class="btn  next btn-success" value="save">
            </div>
        </form> 
       <?php
    }?>
    </div>
</div>
<?php
include $tpl."footer.php";
?>