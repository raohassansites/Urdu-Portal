
<?php
require_once('db.php');
require_once ('config.php');

session_start();


if(isset($_POST['sub'])){

$username = mysqli_real_escape_string($conn, $_POST['username']);
$email = mysqli_real_escape_string($conn, $_POST['em']);
$pass = mysqli_real_escape_string($conn, ($_POST['pass']));
$repass = mysqli_real_escape_string($conn, ($_POST['repass']));

$user_type = 0;
$select_users = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'") or die('failed to check for existing user');

if(mysqli_num_rows($select_users) > 0)
echo "<script>alert('User Already Exists')</script>";
else
{
    if($pass != $repass){
      echo "<script>alert('Passwords are not same')</script>";
    }
    else{
        mysqli_query($conn, "INSERT INTO users (username, email, pass,`role`) VALUES ('$username', '$email','$repass', '1')") 
        or die('failed to add user');

        echo "<script>alert('Successfully Registered')</script>";
    }
}

}
if(isset($_POST['sublogin'])){


$email = mysqli_real_escape_string($conn, $_POST['loginem']);
$pass = mysqli_real_escape_string($conn, ($_POST['loginpass']));

$user_type = 0;
$select_users = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' AND pass = '$pass'") or die('failed to check for existing user');

if(mysqli_num_rows($select_users) > 0)
{
    $row = mysqli_fetch_assoc($select_users);
        $_SESSION['ADMIN_LOGIN']='yes';
        $_SESSION['user_name'] = $row['username'];
        $_SESSION['user_email'] = $row['email'];
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['ADMIN_ROLE']=$row['role'];
        header('location:index.php');

    
}
else
{
    echo "<script>alert('Email or Password is worng')</script>";
}

}

$user_id = $_SESSION['user_id'];
$user_name =$_SESSION['user_name'];
?>

