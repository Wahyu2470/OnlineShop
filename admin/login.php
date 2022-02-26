<?php
session_start();
include('config/proses_login.php'); 
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<link href="assets/css/login.css" rel="stylesheet" />
 <div class="login-card">
    <h1>Login</h1><br>
  <form action="" method="post">
    <input type="text" name="username" placeholder="Username" required=" ">
    <input type="password" name="password" placeholder="Password" required=" ">
    <input type="submit" name="submit" class="login login-submit" value="Login">
  </form>
</div>

<!-- <div id="error"><img src="https://dl.dropboxusercontent.com/u/23299152/Delete-icon.png" /> Your caps-lock is on.</div> -->
<script>
 
</script>
</html>