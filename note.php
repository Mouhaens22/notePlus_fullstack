<?php
session_start();
$title='NotePlus | note ';


if (isset($_SESSION['username'])){
    include "config.php";
    $note = getNote(13);
    ?>
    <div class="note-content">
        <div class="container">
            <div class="row">
            <div class="col-md-12">
                    <div class="note">
                        <div class="head">

                            <?php 
                            $x = getStatus($note['stat']);
                            $y =getUserinfo($note['username']);
                            $z =getCategory($note['category']);

                        
                            ?>

                           <div class="point3"><i class="fa fa-ellipsis-h"></i></div>

                            <h3><?php echo $note['title'];  ?></h3>
                            <i class="fa <?php  echo $x['statfa'];  ?>"></i> 
                            <?php  echo $x['stat'];  ?>
                            <i class="fa <?php echo $z['catfa'];  ?>"></i>
                            <?php echo $z['cat'];  ?>
                            
                            <i class="fa fa-pencil"></i>
                            <a href="" style="text-transform:capitalize; color: #AAA;"><?php echo $y['fname'].' '.$y['lname'] ;  ?></a>
                            <i class="fa fa-clock"></i> 
                            <?php echo getTimeAgo($note['datepost']); ?>
                            <hr>
                        </div>
                        <div class="body">
                            <p>
                            <?php echo $note['content'];  ?>
                             <a href="note.php" class="btn-viewnote">more</a>

                            </p>
                            <br>

                            <!-- <span class="cat tags"><i class="fa  <?php echo $z['catfa'];  ?>"></i><?php echo $z['cat'];  ?></span> -->
                        </div>
                        <div class="reaction">
                            <div class="reacts d-flex">
                                <span class="likes"><i class="fa fa-heart text-danger"></i><b>5</b> likes </span>
                            </div>
                            <hr class="hr-class">
                            <div class="d-flex rc">
                                <a class="lk"><i class="fa fa-heart "></i>like</a>
                                <a href=""><i class="fa fa-comment"></i>comment</a>

                            </div>
                        </div>
                        <hr class="hr-class">
                        <div class="commentaires">
                            <span class="comments"><b>9</b> comments</span>
                            <div class="row">
                                <div class="col-md-12">


                                    <div class="commentaire d-flex">
                                        <div class="img">
                                            
                                        </div>
                                        <div class="d-flex ">
                                            <div class="p1">
                                                <div class="username">
                                                    youssef ouabbi
                                                </div>
                                                <div class="comment-content">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate modi quod quos iste, veritatis rerum vero odio molestias nesciunt! Repudiandae ut ratione deserunt maiores laborum dicta fugiat quae commodi non.
                                                </div>
                                                
                                            </div>
                                            <div class="comreact">
                                                    <span>1 hour.</span>
                                                    <span class='cmt-lk'> 
                                                        like 
                                                    </span>
                                                    <i class="fa cmt-lk-icon fa-heart text-danger"></i>
                                                    <span class="nbrlike-cmt">12</span> 

                                                    
                                                </div>
                                        </div>
                                    </div>

                                    <div class="commentaire d-flex">
                                        <div class="img">
                                            
                                        </div>
                                        <div class="d-flex ">
                                            <div class="p1">
                                                <div class="username">
                                                    youssef ouabbi
                                                </div>
                                                <div class="comment-content">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate modi quod quos iste, veritatis rerum vero odio molestias nesciunt! Repudiandae ut ratione deserunt maiores laborum dicta fugiat quae commodi non.
                                                </div>
                                                
                                            </div>
                                            <div class="comreact">
                                                    <span>1 hour.</span>
                                                    <span class='cmt-lk'> 
                                                        like 
                                                    </span>
                                                    <i class="fa cmt-lk-icon fa-heart text-danger"></i>
                                                    <span class="nbrlike-cmt">12</span> 

                                                    
                                                </div>
                                        </div>
                                    </div>

                                    <div class="commentaire d-flex">
                                        <div class="img">
                                            
                                        </div>
                                        <div class="d-flex ">
                                            <div class="p1">
                                                <div class="username">
                                                    youssef ouabbi
                                                </div>
                                                <div class="comment-content">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate modi quod quos iste, veritatis rerum vero odio molestias nesciunt! Repudiandae ut ratione deserunt maiores laborum dicta fugiat quae commodi non.
                                                </div>
                                                
                                            </div>
                                            <div class="comreact">
                                                    <span>1 hour.</span>
                                                    <span class='cmt-lk'> 
                                                        like 
                                                    </span>
                                                    <i class="fa cmt-lk-icon fa-heart text-danger"></i>
                                                    <span class="nbrlike-cmt">12</span> 

                                                    
                                                </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="addcomment">
                            <form action="note.php" method="post">
                                <input type="text" name="comment" placeholder="write a comment here...">
                                <span ><i class='fa fa-camera'></i></span>
                                <span><i class='fa fa-paperclip'></i></span>

                                <input type="submit" name="addcmntbtn" class="btn btn-comment" value="add comment">
                            </form>
                        </div>
                    </div>
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