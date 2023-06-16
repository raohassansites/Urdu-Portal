<title>Q/A Urdu Portal</title>
<?php
@include 'header.php' ;
@include_once 'login.php';
if(isset($_SESSION['user_id'])){
  $userid=$_SESSION['user_id'];
};


if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($conn,$_GET['type']);
	if($type=='status'){
		$operation=get_safe_value($conn,$_GET['operation']);
		$id=get_safe_value($conn,$_GET['id']);
		if($operation=='active'){
			$status='1';
		}else{
			$status='0';
		}
		$update_status_sql="update users set status='$status' where id='$id'";
		mysqli_query($conn,$update_status_sql);
	}
	

 if($type=='delete'){
  $id=($_GET['id']);
  $delete_sql="delete from questions where id='$id'";
  mysqli_query($conn,$delete_sql);
 }
}
?>

    

<body>
<!-- Navbar -->
<div class="header">
   <div class="container main-header">
    <div class="project">
    <a href="index.php" class="logo">
           <h4>Project</h4>
       </a>
       <div class="search">
       <input type="text" style="width:250px;" id="myInput" onkeyup="myFunction()" placeholder="تلاش کریں" title="Type in a word">
       </div>
    </div>
       
       <nav class="navbar">
           <span class="menu" id="menu"><i class="fas fa-bars"></i></span>
           <ul class="menu-drp" id="menu-drp">
               
               <?php
                    if (isset($_SESSION['ADMIN_ROLE']) && ($_SESSION['ADMIN_ROLE'])  != 0) {
                        echo'<a href="index.php" class="inactive active">Home</a>';
                        echo'<a href="question.php" class="inactive ">My Questions</a>';
                        // echo'<a href="#" class="inactive ">Post a Question</a>';
                        echo '<button class="open-button" id="pop-up">Post a Question</button>';
                    } else if (isset($_SESSION['ADMIN_ROLE']) && ($_SESSION['ADMIN_ROLE'])  != 1) {
                      echo'<a href="index.php" class="inactive active">Home</a>';
                      echo'<a href="user-management.php" class="inactive">User Management</a>';
                    }  
               ?>


               
               <?php
               
                    if (isset($_SESSION['user_name']))  {?>
                       <div class="user-details">
                        <button  class="inactive " id="btn1"><?php echo $user_name ?></button>
                        <div class="user-detail-drpdwn">
                        <a href="user_details.php" class="inactive bdr">User Details</a>
                        <a href="endsession.php" class="inactive bdr">Logout</a> 
                         </div>
                     </div>
                    <?php } else {?>
                        <div class="user-details">
                        <button  class="inactive btn-nav" id="login-1">Ask Question?</button>
                        <button  class="inactive btn-nav" id="login">Login</button>
                        <div class="full-screen ">
                          <div class="popup animate__animated animate__fadeInDown">
                            <div class="login-popup">
                                <h2>Login to your Account</h2>
                                <form method="post" action=""> 
                                    <input type="email" name="loginem" placeholder="Your Email" required> 
                                    <input type="password" name="loginpass" placeholder="Password" required>  
                                    <input type="submit" name="sublogin" class="login" value="LOGIN">
                                </form>
                            </div>
                            <div class="login-popup" style="margin-right:0px">
                                <h2>Create your Account Today</h2>
                                <form method="post" action=""> 
                                    <input type="text" name="username" placeholder="Your Username"> 
                                    <input type="email" name="em" placeholder="Your E-mail"> 
                                    <input type="password" name="pass" placeholder="Password"> 
                                    <input type="password" name="repass" placeholder="Confirm Password">
                                    <input type="submit" name="sub" class="login" value="REGISTER">
                                </form>
                            </div> <span class="or">Or</span>
                          </div>
                          <div class="closeBtn"><i class="fal fa-times"></i></div>
                        </div>
                        
                        <div class="full-screen-1 ">
                          <div class="popup animate__animated animate__fadeInDown">
                            <div class="login-popup">
                                <h2>Login to your Account</h2>
                                <form method="post" action=""> 
                                    <input type="email" name="loginem" placeholder="Your Email" required> 
                                    <input type="password" name="loginpass" placeholder="Password" required>  
                                    <input type="submit" name="sublogin" class="login" value="LOGIN">
                                </form>
                            </div>
                            <div class="login-popup" style="margin-right:0px">
                                <h2>Create your Account Today</h2>
                                <form method="post" action=""> 
                                    <input type="text" name="username" placeholder="Your Username"> 
                                    <input type="email" name="em" placeholder="Your E-mail"> 
                                    <input type="password" name="pass" placeholder="Password"> 
                                    <input type="password" name="repass" placeholder="Confirm Password">
                                    <input type="submit" name="sub" class="login" value="REGISTER">
                                </form>
                            </div> <span class="or">Or</span>
                          </div>
                          <div class="closeBtn-1"><i class="fal fa-times"></i></div>
                        </div> 
                </div> 
                    <?php } 
                    
               ?>

               <div class="full-screen-2 ">
                          <div class="popup animate__animated animate__fadeInDown">
                            <div class="login-popup" style="direction:rtl;">
                                <h2>سوال پوسٹ کریں۔</h2>
                                <form method="post" action="action.php"> 
                                    <input type="text" name="question" placeholder="سوال پوسٹ کریں" required> 
                                    <button type="submit"  name="submit" class="login" >جمع کرائیں </button>
                                </form>
                            </div>
                          </div>
                          <div class="closeBtn-2"><i class="fal fa-times"></i></div>
                </div>
                
                
                
           </ul>
       </nav>
   </div>
</div>  

<!-- Content -->
<section class="content">
<table class="table-header" id="table-header">
    <thead>
        <th width="5%">نمبر</th>
        <th width="50%">سوال</th>
        <th width="20%">تاریخ اندراج</th>
        <?php
                    if (isset($_SESSION['ADMIN_ROLE']) && ($_SESSION['ADMIN_ROLE'])  != 1) {
                        echo'<th width="25%">عمل</th>';
                    } else if (isset($_SESSION['ADMIN_ROLE']) && ($_SESSION['ADMIN_ROLE'])  != 0)  {
                      echo'<th width="25%">عمل</th>';
                    }  
        ?>
    </thead>
    <tbody>
        <?php
        $qry = "SELECT * FROM questions ORDER BY date DESC";
        $ress = mysqli_query($conn,$qry);
        $num = mysqli_num_rows($ress);
        {
            $i=0;
            echo'<table>';
            if($num > 0) while($row=mysqli_fetch_array($ress,MYSQLI_ASSOC)) {$i++;?>
            <table id="myTable">
            <tr class="question" id="question">
            <td class="serial" width="5%"><?php echo $i?></td>
            <td width="50%"><?php echo $row['question_user']?></td>
            <td width="20%"><?php echo $row['date']?></td>

            <?php
                    if (isset($_SESSION['ADMIN_ROLE']) && ($_SESSION['ADMIN_ROLE'])  != 1) {?>
                        <td width="25%">
                          <?php
                          echo "<span class='badge badge-edit'><a href='question_management.php?id=".$row['id']."'>Edit</a></span>&nbsp;";
                          echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>";
								          ?>
                        </td>
                        <?php } else if (isset($_SESSION['ADMIN_ROLE']) && ($_SESSION['ADMIN_ROLE'])  != 0) {?>
                          <?php 
                          $id= $_SESSION['user_id'];
                          $u_id= $row['u_id'];
                          if ($id != $u_id) {?>
                            <td>
                          <span class='badge badge-delete'  ><?php echo "<a  href='answer.php?id=".$row['id']."'>جواب</a>"?></span>
                          </td>
                          <?php } elseif ($id === $u_id){?>
                            <td>
                          <span class='badge badge-delete'  ><?php echo "اپنے سوال کا جواب نہیں دے سکتے"?></span>
                          </td>
                          
                          <!-- Answer Form -->
                          
            <?php } }  ?>
            </tr>
                          </tbody>
                          <tbody>
            <tr class="answer">
              <tr>
                <td></td>
                <td style="text-align: left; font-weight: 800;">جواب</td>
              </tr>
              <?php
              $question_id = $row['id'];
              $qrey= "SELECT * FROM answers WHERE  q_id ='$question_id' ORDER BY netvotes DESC";
              $stmt=$db->prepare($qrey);
              $stmt->execute();
              $rows=$stmt->fetchAll();
              foreach($rows as $row)
              {

                
                 $votes= 0;
            $sql="SELECT vote FROM uservotes WHERE postid=:postid AND userid=:userid"; 
          $stmt=$db->prepare($sql);
          $stmt->bindParam(':postid', $row['id'],PDO::PARAM_INT);
          $stmt->bindParam(':userid', $userid,PDO::PARAM_INT);
          $stmt->execute();
          $rows=$stmt->fetchAll();
          $up = "";
          $down = "";
            foreach($rows as $rowv){
              $rowv['vote'];
            }
            if(!empty($rowv["vote"])) {
              $vote = $rowv["vote"];
              if($vote == -1) {
                $up = "enabled";
                $down = "disabled";
              }
              if($vote == 1) {
                $up = "disabled";
                $down = "enabled";
              }
            }
            ?>
            <tr>
              <?php
                    if (isset($_SESSION['ADMIN_ROLE']) && ($_SESSION['ADMIN_ROLE'])  != 1) {?>
                      <td></td>
                      <?php } else if (isset($_SESSION['ADMIN_ROLE']) && ($_SESSION['ADMIN_ROLE'])  != 0) {?>               
                        <td>
                            <div id="links-<?php echo $row['id']; ?>" class="voting">
                              <div class="btn-vote">
                                   <input type="button" title="Vote Up " class="up" onClick="addVote(<?php echo $row['id']; ?>,'1')" <?php echo $up; ?> /> 
                                   <div class="label-vote">
                                      <?php echo $row['netvotes']; ?>
                                    </div>
                                   <input type="button" title="Vote Down" class="down" onClick="addVote(<?php echo $row['id']; ?>,'-1')" <?php echo $down; ?> />
                              </div>
                            </div>
                        </td>
                      <?php } ?>
                <td>
                  <div><?php echo $row['answers']?></div>
                  <div style="display: none;"><?php echo $row['id']?></div>

              </td>
            </tr>
              <?php }  ?>
            </tr>
            </table>
            <?php } }?>

        
    </tbody>
</table>
</section>  
</body>

<?php
include 'footer.php';
?>


