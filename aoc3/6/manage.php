<?php 
session_start();
include('./includes/creds.php');
if($_SESSION['username'] != $USER){
      header("Location: login.php");
      die();
  } else {
	  $labNum = "Manage";
	  require "./includes/header.php";
  }
?>

<div class="row">
  <div class="col-lg-12">
      <?php if (isset($error)) { ?>
          <span class="text text-danger"><b><?php echo $error; ?></b></span>
      <?php } ?>
    <p>Hi <?php echo $_SESSION['username']; ?></p>
<p>To recover a system's access password:<p>
<ul>
<li><a href="./recover-password.php">Password Recovery</a></li>
<li><a href="./logs.php">Log Access</a></li>
<li><a href="./logout.php">Logout</a></li>
</ul>
