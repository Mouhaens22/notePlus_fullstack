
<div class="contadd">
            <span class="concel btn btn-danger" id='concel'><i class="fa fa-times text-light"></i></span>
            <form class="" action="home.php" method="post">
             <div class="head d-flex">
               <div class="img"><img src="layout/img/15.jpg" class="profil" alt=""></div>
               <div class="d-flex ">
                 <div class="nom">
                    <?php echo $userdata['fname'].' '.$userdata['lname'] ;?>                 </div>
                 <div class="option">
                   <div class="op category">
                     <i class="fa fa-desktop"></i>
                     <select class="form-control" name="cat">
                      <?php
                      $cats=getCategory();
                      foreach($cats as $cat){ ?>

                      <option value="<?php echo $cat['idcat']; ?>">
                         <?php echo $cat['cat']; ?>
                      </option>

                      <?php }?>
                     </select>

                   </div>
                   <div class="op visibility">
                     <i class="fa fa-lock"></i>
                     <select class="form-control" name="stat">
                     <?php
                      $stats=getStatus();
                      foreach($stats as $stat){ ?>

                      <option value="<?php echo $stat['idstat']; ?>">
                          <?php echo $stat['stat']; ?>
                      </option>

                      <?php }?>
                     </select>
                   </div>
                 </div>
               </div>
             </div>
             <div class="write-content">
               <textarea name="content" rows="5"  cols="70" placeholder="Write note..."></textarea>
             </div>
             <div class="touches">

               <div class="touche">
                 <i class="fa fa-camera" style="font-size: 21px;color: #2b2b2b;"></i>
                 <span>photo/video</span>
               </div>

               <div class="touche">
                 <i class="fa fa-microphone" style="font-size: 21px;color: #f32d2d;"></i>
                 <span>audio/ music</span>
               </div>

               <div class="touche">
                 <i class="fa fa-paperclip" style="font-size: 21px;color: #0a63e8;"></i>
                 <span>link</span>
               </div>
             </div>
             <div class="post">
               <input type="hidden" name="username" value='<?php echo $userdata['username']; ?>'>
               <input type="submit" name="postnote" class="btn btn-home btn-post" value="save note">
             </div>
           </form>

         </div>