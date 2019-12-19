 <?php
/*
 // Initialize the session
 session_start();

 try {

   // Check if the user is logged in, if not then redirect him to login page
   if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
       header("location: login.php");
       exit;
   }

 } catch (Exception $e) {
   echo "Oeps something went wrong, please try again.";
 }
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CMS - Dashboard</title>
    <meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" type="text/css" href="css/util.css">
  	<link rel="stylesheet" type="text/css" href="css/CMS_style.css">
    <style type="text/css">
        body{ font: 14px sans-serif;}
    </style>
</head>
<body>
  <!-- Side navigation -->
  <div class="sidenav">
    <a href="Events.php">Events</a>
    <a href="Financials.php">Financial</a>
    <a href="Account.php">Account</a>
    <a href="Statistics.php">Statistics</a>
  </div>

  <!-- CMS top header -->
  <div class="header">
    <a href="#" class="logo">Haarlem Festival</a>
    <div class="header-right">
      <a href="#" onclick="Functions.php?logout()">Logout</a>
    </div>
  </div>

<div class="page-content">
  <h1 class="page-content-heading">Dashboard</h1>

  <div class="Dashboard-container">
    <div class="box">
      <h1>Quick Statistics</h1>
      <p>Total views: <?php Statistics_Views()?></p>
    </div>

    <div class="box">
      <h1>Orders</h1>
      <p>Number of orders: ...</p>
    </div>
  </div>
  <!--show LogEvent table if userStatus is ADMIN else do not show it.  -->
  <?php CMS_Statistics_Show_LogEvents()?>
</body>
</html>
