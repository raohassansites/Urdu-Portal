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
                            <div class="login-popup">
                                <h2>Post A Question</h2>
                                <form method="post" action="action.php"> 
                                    <input type="text" name="question" placeholder="Type a Question" required> 
                                    <button type="submit"  name="submit" class="login" >Post a Question </button>
                                </form>
                            </div>
                          </div>
                          <div class="closeBtn-2"><i class="fal fa-times"></i></div>
                        </div> 
                
           </ul>
       </nav>
   </div>
</div> 