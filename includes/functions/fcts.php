<?php

// get user info :
function getUserinfo($username){
    global $con;
    $stmt=$con->prepare('SELECT * FROM user WHERE username=? ');
    $stmt->execute(array($username));
    return $stmt->fetch();
}


//get my notes :
function getMyNotes($username){
    global $con;
    $stmt=$con->prepare('SELECT * FROM note WHERE username=? ');
    $stmt->execute(array($username));
    return $stmt->fetchAll();
}


//get all notes :
function getAllNotes(){
    global $con;
    $stmt=$con->prepare('SELECT * FROM note ORDER BY title ');
    $stmt->execute();
    return $stmt->fetchAll();
}


// get one note :
function getNote($idnote){
    global $con;
    $query ='SELECT * FROM note where idnote = ?'; 
    $stmt=$con->prepare($query);
    $stmt->execute(array($idnote));
    return $stmt->fetch();

    
}


//get status :
function getStatus($idstat = 'none'){
    global $con;
    if(!($idstat == 'none')){
        $query ='SELECT * FROM stat WHERE idstat=?';
        $stmt=$con->prepare($query);
        $stmt->execute(array($idstat));
        $rs= $stmt->fetch();

    }
    else{
        $query ='SELECT * FROM stat '; 
        $stmt=$con->prepare($query);
        $stmt->execute();
        $rs= $stmt->fetchAll();

    }
    return $rs;
}


//get category :

function getCategory($idcat='none'){
    global $con;
    if(!($idcat=='none')){
        $query ='SELECT * FROM category WHERE idcat=?';
        $stmt=$con->prepare($query);
        $stmt->execute(array($idcat));
        return $stmt->fetch();

    }
    else{
        $query ='SELECT * FROM category '; 
        $stmt=$con->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();

    }
    
}




//search function :
function search($table,$search,$searchby,$order){
    global $con;
    if($searchby=='username'){
        $st = $con->prepare("SELECT * FROM user 
                             WHERE fname LIKE '%$search%'
                             OR lname LIKE '%$search%' ");     
        $st->execute();
        $users = $st->fetchAll();
        
        $i=0;
        $wheresearch="username LIKE '%$search%'";

        foreach($users as $us){
           
            $i++;
            $user=$us['username'];
            $wheresearch =$wheresearch."OR username LIKE '%$user%'  ";
            // if($i<count($users)){
            //     $wheresearch = $wheresearch."OR";
            // };
        }

        $query = "SELECT * FROM $table 
                  WHERE ".$wheresearch." ORDER BY $order";
        
    }
    else {
        $query = "SELECT * FROM $table WHERE $searchby LIKE '%$search%' ORDER BY $order "; 
    }
    $stmt =$con->prepare($query);       
    $stmt->execute(); 
    return $stmt->fetchAll(); // les notes  sous forme Array
}

// get time post ago :
function getTimeAgo($since){
    $timepost=$since; // type($since)=time;
    $timeago=(time()-$timepost);
    if($timeago<60){
      $ago = $timeago.' seconds ago';
    }
    elseif($timeago<3600){
      $ago = intdiv($timeago,60).' minutes ago';
    }
    elseif($timeago<7200){
      $ago = ' 1 hour ago';
    }
    elseif($timeago<86400){
      $ago = intdiv($timeago,3600).' hours ago';
    }
    elseif($timeago<172800){
      $ago = ' 1 jour ago';
    }else{
      $ago = intdiv($timeago,86400).' jour ago';
    }
    return $ago;
}