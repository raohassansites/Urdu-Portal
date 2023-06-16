<?php 
 function user_count_invote($postid,$userid,$db){
        $sql= "SELECT count(*) from uservotes WHERE userid=:userid AND postid=:postid"; 
     $stmt = $db->prepare($sql);
      $stmt->bindParam(':postid', $postid, PDO::PARAM_INT);
    $stmt->bindParam(':userid', $userid, PDO::PARAM_INT);
    $stmt->execute();
        $number_of_rows = $stmt->fetchColumn(); 
        return $number_of_rows;  
      }
     function insert_vote($userid,$postid,$vote,$db){
         $sql="INSERT INTO uservotes(userid,postid,vote) VALUES(:userid,:postid,:vote)";
     $stmt = $db->prepare($sql); 
       $stmt->bindParam(':userid', $userid, PDO::PARAM_INT);
       $stmt->bindParam(':postid', $postid, PDO::PARAM_INT);
       $stmt->bindParam(':vote', $vote, PDO::PARAM_STR);
    $stmt->execute();
    if($stmt)
        { 
  return  true; 
        }
      }
      function fetch_invote($postid,$userid,$db){
        $sql= "SELECT * from uservotes WHERE userid=:userid AND postid=:postid"; 
     $stmt = $db->prepare($sql);
      $stmt->bindParam(':postid', $postid, PDO::PARAM_INT);
    $stmt->bindParam(':userid', $userid, PDO::PARAM_INT);
    $stmt->execute();
     $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
             return $row; 
       
      }
       function update_vote($userid,$postid,$vote_type,$db){
         $sql="UPDATE uservotes SET vote= vote$vote_type WHERE userid=:userid AND postid=:postid";
     $stmt = $db->prepare($sql);
       $stmt->bindParam(':userid', $userid, PDO::PARAM_INT);
       $stmt->bindParam(':postid', $postid, PDO::PARAM_INT);
    $stmt->execute(); 
    if($stmt){ 
   return true; 
    } 
      }
       function update_vote_inposts($postid,$vote_type,$db){
         $sql="UPDATE answers SET netvotes= netvotes$vote_type WHERE id=:postid";
     $stmt = $db->prepare($sql);
       $stmt->bindParam(':postid', $postid, PDO::PARAM_INT);
    $stmt->execute(); 
      }
      function fetch_netvote($postid,$db){
        $sql= "SELECT netvotes from answers WHERE id=:postid"; 
     $stmt = $db->prepare($sql);
      $stmt->bindParam(':postid', $postid, PDO::PARAM_INT);
    $stmt->execute();
     $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
             return $row; 
      }
      function delete_vote($postid,$userid,$db){
        $sql= "DELETE from uservotes WHERE postid=:postid AND userid=:userid"; 
     $stmt = $db->prepare($sql);
      $stmt->bindParam(':postid', $postid, PDO::PARAM_INT);
       $stmt->bindParam(':userid', $userid, PDO::PARAM_INT);
    $stmt->execute();
      }
?> 