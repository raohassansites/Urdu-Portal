<?php

// require('header.php');
// require('db.php');
// session_start();
// $username='';
// $password='';
// $email='';

// $user_id = $_SESSION['user_id'];
// $user_name =$_SESSION['user_name'];
// if(!isset($user_id)){
//    header('location:login.php');
// }
// $q_id=  $_GET['id'] ;
// $sql="SELECT * FROM answers WHERE id='$q_id'";
// $query=mysqli_query($conn,$sql);
// $i=0;
// while ($row=mysqli_fetch_assoc($query)){$i++;
//     if(isset($_POST['up_vote'])){
//         $vote=$_POST['username'];
//         $password=$_POST['pass'];
//         $email=$_POST['em'];
//         $update_sql="update answers set vote='$vote' where id='$user_id'";
//         $result=mysqli_query($conn,$update_sql);
    
    
//     if($result==0){
//         echo"<div class=' mb-0 alert alert-danger alert-dismissible fade show' role='alert'>
	
//         <div class='box' style='color:red; background:inherit;'>
//                 <strong style='color:red; background:inherit;'>Error</strong> changing details.</div>
//           <button type='button'  style='outline:none;color:red; background:inherit;' class='close' data-dismiss='alert' aria-label='Close'>
//             <span aria-hidden='true' style='color:red; background:inherit;'>&times;</span>
//           </button>
//         </div>";
//         // header("Location: index.php");
//     }else{
//          header("Refresh:0");
//         echo"<div class=' mb-0 alert alert-success alert-dismissible fade show' role='alert'>
	
//         <div class='box' style='color:green; background:inherit;'>
//                 <strong style='color:green; background:inherit;'>User Details changed successfully</strong> </div>
//           <button type='button'  style='outline:none;color:green; background:inherit;' class='close' data-dismiss='alert' aria-label='Close'>
//             <span aria-hidden='true' style='color:green; background:inherit;'>&times;</span>
//           </button>
//         </div>";
        
//         // header("Location: index.php");
//     }
// }
// }








@include 'header.php' ;
@include_once 'login.php';

$answer='';
$q_id='';
$user_id='';
$vote='';

$msg='';
if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($conn,$_GET['id']);
	$res=mysqli_query($conn,"select * from answers where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$answer=$row['answers'];
		$vote=$row['vote'];
	}else{
		header('location:index.php');
		die();
	}
}

if(isset($_POST['up_vote'])){
    // $answer = ( $_POST['answer']);
    $q_id=  $_GET['id'] ;
    echo $q_id ;
    $user_id = $_SESSION['user_id'];
	
	$res=mysqli_query($conn,"select * from answers where id='$q_id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="Username already exist";
			}
		}else{
			$msg="Username already exist";
		}
	}
	
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$update_sql="update answers set vote='$vote' where id='$q_id'";
			mysqli_query($conn,$update_sql);
		}else
		header('location:index.php');
		die();
	}
}
?>
	 
		 
         
<?php
require('footer.php');
?>