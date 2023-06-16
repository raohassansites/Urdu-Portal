<?php
require('db.php');
session_start();
$message= 'Error: Limit of 10 English words exceeded.';

if(isset($_POST['submit'])){
    $date = date("Y-m-d") ;
    $user_id=  $_SESSION['user_id'] ;
    if (isset($_POST["question"])) {
        $question = $_POST["question"];
        $question = preg_replace('/[^\p{L}\p{N}\s]/u', '', $question);
        $question = explode(" ", $question);
        
        $english_word_count = 0;
        $urdu_word_count = 0;
        
        foreach ($question as $word) {
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
            $question = $_POST["question"];
            $res=" INSERT INTO `questions`( `u_id`,`question_user`,`date`) VALUE ('$user_id','$question','$date')";
 if (mysqli_query($conn,$res) ) {
    header("Location: index.php");

} else {
    die('failed to add question');
}
        }
    }


    





        
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  include_once'footer.php';
?>