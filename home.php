<?php
session_start();
$title='NotePlus | home ';


if (isset($_SESSION['username'])){
    
    include "config.php";

    // add npte scriptes :
    if($_SERVER['REQUEST_METHOD']=='POST'){
      if(isset($_POST['postnote'])){ 
          $content= $_POST['content'];
          $title=str_split($content,50)[0];
          $sql = "INSERT INTO note(title, content,
                                     category,stat,username,datepost) 
                                     VALUES (?,?,?,?,?,?)";
	        $stmt= $con->prepare($sql);
	        $stmt->execute(array(
            $title,$content,$_POST['cat']
            ,$_POST['stat'],$_POST['username']
            ,time()
          ));
          header('location:profil.php');
      }
    }?>

    <div class="home-content " id="home">
      <div class="container">

        <div class="view text-light">
          <h1>hello Mr <span class="user">
            <?php echo $userdata['fname'].' '.$userdata['lname'] ;?>
          </span> </h1>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
             ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
             laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
             cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
           </p>
           <a href="notes.php" class="btn btn-outline-primary btn-home btn-view">view notes</a>
           <a  id="add" class="btn btn-outline-primary btn-home btn-add">add note</a>
        </div>
        <div class="stats ">
          <div class="stat d-flex">
            <p>notes totales</p>
            <span class="nbr-notes">
              <?php 
              $mynoteNum=count(getMyNotes($_SESSION['username']));
               echo $mynoteNum ; ?>
            </span>
          </div>
        </div>
        
      </div>
    </div>
    <div class="add-content add"  id="addbloc">
    <?php  include $tpl.'addnote.php'; ?>
    </div>    <?php 
    include $tpl."footer.php";
}else{
    header('location:  index.php');  // redirect to dashbord
    exit();
}?>



