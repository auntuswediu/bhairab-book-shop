<?php 
  session_start();
  if (isset($_SESSION['role'])) {
    $role = $_SESSION['role'];
  }else{
    $role = '';
  }
  if ( isset($_SESSION['email']) && $role == 'admin' ) {
    header("Location: index");
  }
  $error = "";
  if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $sql = "SELECT * from users where email = '$email' and role ='admin'";
    $query = mysqli_query($con, $sql);
    if (mysqli_num_rows($query) > 0) {
      $row_user = mysqli_fetch_array($query);
      if($row_user['email'] != $email){
        $error = "Wrong email address";
      }
      else{
        if($row_user['password'] != $password){
          $error = "Wrong password";
        }
        else{
          $_SESSION['id'] = $row_user['id'];
          $_SESSION['img'] = $row_user['img'];
          $_SESSION['email'] = $row_user['email'];
          $_SESSION['name'] = $row_user['name'];
          $_SESSION['role'] = $row_user['role'];
          $_SESSION['created_at'] = $row_user['created_at'];
          $_SESSION['loggedin'] = true;
          header("Location: index");
        }
      }
    }else{
      $error = "Don't have account";
    }
  }
?>