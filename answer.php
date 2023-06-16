<?php
 @include 'header.php' ;
 @include_once 'login.php';           
 $message= 'Error: Limit of 10 English words exceeded.';

 
 if(isset($_POST['ans-submit'])){
  $q_id=  $_GET['id'] ;
  $user_id = $_SESSION['user_id'];
  if (isset($_POST["answer"])) {
      $answer = $_POST["answer"];
      $answer = preg_replace('/[^\p{L}\p{N}\s]/u', '', $answer);
      $answer = explode(" ", $answer);
      
      $english_word_count = 0;
      $urdu_word_count = 0;
      
      foreach ($answer as $word) {
          if (preg_match('/^[a-zA-Z0-9]+$/', $word)) {
              $english_word_count++;
          } else {
              $urdu_word_count++;
          }
      }

      if ($english_word_count > 10) {
          echo "<script>
                        alert('$message');
                        window.location.href=' index.php '
                 </script>";
      } else {
          $answer = $_POST["answer"];
          $res=" INSERT INTO `answers`(`q_id`,`user_id`, `answers`, `netvotes`) VALUE ('$q_id','$user_id','$answer','0')";
if (mysqli_query($conn,$res) ) {
  header("Location: index.php");

} else {
  die('failed to add answer');
}
      }
  }     
}

  
            ?>
            <!-- Navbar -->
<div class="header">
   <div class="container main-header">
       <a href="index.php" class="logo">
           <h4>Project</h4>
       </a>
       <nav class="navbar">
           <span class="menu" id="menu"><i class="fas fa-bars"></i></span>
           <ul class="menu-drp" id="menu-drp">
               
               <?php
                    if (isset($_SESSION['ADMIN_ROLE']) && ($_SESSION['ADMIN_ROLE'])  != 0) {
                        echo'<a href="index.php" class="inactive ">Home</a>';
                        echo'<a href="answer.php" class="inactive ">My Questions</a>';
                        // echo'<a href="#" class="inactive ">Post a answer</a>';
                        echo '<button class="open-button" id="pop-up">Post a answer</button>';
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
                            <div class="login-popup" style="direction:rtl">
                                <h2>جواب پوسٹ کریں</h2>
                                <form method="post" action="action.php"> 
                                    <input type="text" name="answer" placeholder="جواب ٹائپ کریں" required> 
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
            <div class="full-screen-3 ">
            <div class="popup animate__animated animate__fadeInDown">
              <div class="login-popup" style="direction:rtl">
                <h2>جواب پوسٹ کریں</h2>
                <form method="post" action=""> 
                  <input type="text" name="answer" placeholder="جواب ٹائپ کریں" required> 
                  <!-- <input type="hidden" name="hidden_q_id" value="<?php $q_id?>"> -->
                  <button type="submit"  name="ans-submit" class="login" >جمع کرائیں </button>
                </form>
              </div>
            </div>
            </div>

<?php
include 'footer.php';
?>        