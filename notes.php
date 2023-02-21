<?php
session_start();
$title='NotePlus | notes ';


if (isset($_SESSION['username'])){
    include "config.php";
    $allnotes = getAllNotes();
    ?>
    <div class="notes-content">
        <div class="container">

            <div class="search">
                <!-- php script -->
                <?php
                  if($_SERVER['REQUEST_METHOD']=='POST'){
                    if(isset($_POST['searchbtn'])){ 
                      $allnotes = search("note",$_POST['search'],$_POST['searchby'],$_POST['orderby']);
                    }
                  }
                ?>
                <form class="sear" action="notes.php" method="post">
                    <input type="text" name="search"
                           value="<?php echo isset($_POST['search'])?$_POST['search']:''; ?>" 
                           class="form-control input-search" 
                           placeholder="saerch for your notes here ..."
                    >
                    <div class="controls">
                        <span>search by :</span>
                        <i class="fa  fa-chevron-down sr"></i>
                        <select class="form-control searchby" name="searchby">
                            <option value="title">title</option>
                            <option value="content">content</option>
                            <option value="username">username</option>
                        </select>
                        <span>order by :</span>
                        <i class="fa  fa-chevron-down sr"></i>
                        <select class="form-control searchby" name="orderby">
                            <option value="title">title</option>
                            <option value="username">username</option>
                        </select>
                    </div>
                    <input type="submit" name="searchbtn" class="btn btn-outline-success btn-search" value="search">

            </div>

            <div class="result">
                <span><?php echo count($allnotes);  ?> results</span>
            </div>

            <div class="row">
                <?php foreach($allnotes as $note){?>
                  <!-- start note -->
                <div class="col-md-6">
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
                            <!-- <?php  echo $x['stat'];  ?> -->
                            <i class="fa <?php echo $z['catfa'];  ?>"></i>
                            <!-- <?php echo $z['cat'];  ?> -->
                            
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

                            <!-- <span class="cat"><i class="fa <?php echo $z['catfa'];  ?>"></i><?php echo $z['cat'];  ?></span> -->
                        </div>
                        <div class="reaction">
                            <div class="reacts d-flex">
                                <span class="likes"><i class="fa fa-heart text-danger"></i><b>5</b> likes </span>
                                <span class="comments"><b>9</b> comments</span>
                            </div>
                            <hr class="hr-class">
                            <div class="d-flex rc">
                                <a class="lk"><i class="fa fa-heart "></i>like</a>
                                <a href=""><i class="fa fa-comment"></i>comment</a>

                            </div>
                        </div>
                    </div>
                </div>
                  <!-- end note -->

                <?php };?> 
            </div>
        </div>
    </div>
    <?php 
    include $tpl."footer.php";
}else{
    header('location:  index.php');  // redirect to dashbord
    exit();
}?>