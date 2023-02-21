<?php
session_start();
$title='NotePlus |  '.$_SESSION['username'];
$nonav='no';

if (isset($_SESSION['username'])){
    include "config.php";
    $userdata=getUserinfo($_SESSION['username']);

    ?>

    <div class="profil-content">
        <div class="profil-container infospers">
            <div class="profilnav">
                <div class="profil-pd d-flex">
                    <a href="home.php"><i class="back fa fa-long-arrow-left"></i></a>
                    <p>
                        <span class="nameuser"><?php echo $userdata['fname'].' '.$userdata['lname'];?></span><br>
                        <span class="tweets"><?php echo count(getMynotes($userdata['username']));?> notes</span>
                    </p>
                </div>
            </div>
            <div class="headprofil ">
                <div class=" background"></div>
                <div class="profil-pd">
                    <div class="d-flex container">


                        <div class="info profil-head-pd d-flex">

                            <div class="imgprofil">
                                <img src="./layout/img/16.jpg" alt="">

                            </div>

                            <div class="user">
                                <span class="nameuser"><?php echo $userdata['fname'].' '.$userdata['lname'];?></span>
                                <span class="username">@_ <?php echo $userdata['username'];?></span>
                            </div>

                            <div class="informations">

                                <div class="bio">
                                    <p><?php echo $userdata['bio'];?></p>
                                </div>
                                <i class="fa fa-map-marker"></i><span class="data"><?php echo $userdata['adresse'];?></span>
                                <i class="fa fa-calendar"></i><span class="data"><?php echo $userdata['dateregister'];?></span>
                                <div class="follow">
                                    <p class="fol">12</p><span class="data">following</span>
                                    <p class="fol">13</p><span class="data">followers</span>
                                </div>

                            </div>

                        </div>
                        <div class="editbtn">
                            <a href="#" class="btn btn-home edt-btn">edit profile</a>
                        </div>
                    </div>
                </div>
                <div class="opt">
                    <div class="pr-link"><a href="" class="active">notes</a></div>
                    <div class="pr-link"><a href="">notes</a></div>
                    <div class="pr-link"><a href="">notes</a></div>

                </div>
                <hr>

            </div>

            <div class="body pr">
                <div class="row">
                <?php 
                $mynotes =getMyNotes($userdata['username']);
                foreach($mynotes as $note){?>

                    <div class="col-md-12">
                        <div class="note">
                            <div class="head d-flex">

                            <?php 
                            $x =getStatus($note['stat']);
                            $y =getUserinfo($note['username']);
                            $z =getCategory($note['category']);
                            ?>
                                <div class="img">
                                 <i class="fa bigicon <?php echo $z['catfa'];  ?>"></i>
                                </div>
                                <span class="d-flex ">
                                    <div class="point3"><i class="fa fa-ellipsis-h"></i></div>
                                    <h3><?php echo $note['title'];  ?></h3>
                                    <span class="autour">

                                       <i class="fa fa-clock"></i>
                                        <?php echo getTimeAgo($note['datepost']);  ?>
                                        <i class="fa <?php  echo $x['statfa'];  ?>"></i> 
                                        <?php  echo $x['stat'];  ?>
                                        <i class="fa fa-pencil"></i>
                                        <a href="" style="text-transform:capitalize; color: #AAA;">
                                        <?php echo $y['fname'].' '.$y['lname'] ;  ?></a>
                                        <hr>
                                       
                                    </span>

                                </span>
                                <hr>
                            </div>
                            <div class="body">
                                <p>
                                   <?php echo $note['content'];  ?>
                                   <!-- <a href="" class="btn-viewnote">more</a> -->
                                </p>
                                <br>

                                <!-- tags <span class="cat"><i class="fa <?php echo $z['catfa'];  ?>"></i><?php echo $z['cat']?>;</span> -->
                            </div>
                            <div class="reaction">
                                <div class="reacts d-flex">
                                    <span class="likes"><i class="fa fa-heart text-danger"></i> <b>5</b> likes </span>
                                    <span class="comments"><b>9</b> comments</span>
                                </div>
                                <hr class="hr-class">
                                <div class="d-flex rc">
                                    <a class=" lk"><i class="fa fa-heart "></i>like</a>
                                    <a href=""><i class="fa fa-comment"></i>comment</a>

                                </div>
                            </div>
                        </div>

                    </div>
                <?php } ?>
                </div>
            </div>
        </div>

    </div>
    <?php 
    include $tpl."footer.php";
}else{
    header('location:  index.php');  // redirect to dashbord
    exit();
}?>