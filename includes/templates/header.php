<?php 
$username=$_SESSION['username'];
$userdata = getUserInfo($username);
?>
<!-- start header  -->
<header>
        <!-- <div class="import bg-danger">imoprtant</div> -->
        <div class="nav1">
          <div class="container justify-content-around d-flex">
              <div class="logo"><span class="note">note</span><span class="P">P</span><span class="lus">lus</span></div>
              <ul class="list d-flex justify-content-between">
                  <li><a href="home.php">home</a> </li>
                  <li><a href="notes.php">notes</a> </li>
                  <li><a href="whoami.php">who am i ?</a> </li>
                  <li><a href="aboutme.php">about site</a></li>
                  <li><a href="logout.php">log out </a></li>
                  <li><a href="profil.php"><i class="fa fa-user"></i>
                       <?php echo $userdata['fname'].' '.$userdata['lname'] ;?>
                  </a></li>


              </ul>
          </div>
        </div>
        <?php if(isset($nav2)){ ?>
        <nav class="row"> 
            <ul class="list2 col-md-10 center-block col-xs-12 col-sm-10 ">
                <li>all</li>
                <li>programming</li>
                <li>languages</li>
                <li>sports</li>
            </ul>
        </nav>
        <?php } ?>
    </header>