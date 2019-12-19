<?php

// function to escape data and strip tags
function safestrip($string){
  $string = strip_tags($string);
  $string = mysql_real_escape_string($string);
  return $string;
}

// log user in function
function login($username, $password){

 //call safestrip function
 $user = safestrip($username);
 $pass = safestrip($password);

 //encrypt password to md5 hash
 $pass = md5($pass);

  // check if the user and password are correct
  $sql = mysql_query("SELECT * FROM Login WHERE username = '$username' AND password = '$password'")or die(mysql_error());

  //if 1 record then match is okay
  if (mysql_num_rows($sql) == 1) {
    //set session
    $_SESSION['loggedin'] = true;
    $_SESSION['UserStatus'] = $sql = mysql_query("SELECT Status FROM Login WHERE username = '$username'")or die(mysql_error());

    // login and go to dashboard
    $_SESSION['success'] = 'Login Successful';
    header('Location: ./index.php');
    exit;


   } else {
     // login failed error
     $_SESSION['error'] = 'Sorry, wrong username or password';
  }
}

function Generate_QR($QR_Input)
{
  $QR_URL = 'http://www.qr-genereren.nl/qrcode.jpg?text='.$QR_Input.'&foreColor=000000&backgroundColor=ffffff&moduleSize=16&padding=0&download=1';
  $Data = file_get_contents($QR_Input);

  file_put_contents('./Uploads/QR_Code.jpg', $Data);
}

function Logout()
{
  // Initialize the session
  session_start();

  // Unset all of the session variables
  $_SESSION = array();

  // Destroy the session.
  session_destroy();

  // Redirect to login page
  header("location: login.php");
  exit;
}

function Statistics_Views()
{
  $sql = mysql_query("SELECT Total_Views FROM CMS_Statistics")or die(mysql_error());

  if (mysql_num_rows($sql) == 1) {
    echo"$sql";
   } else {// login failed error
     $_SESSION['error'] = 'Could not load statistics. Please try again later.';
  }
}

function Statistics_Add_View($Page_name)
{
  $sql = mysql_query("UPDATE CMS_Statistics SET $Page_name = + 1")or die(mysql_error());
  exit;
}

function CMS_Statistics_Show_LogEvents()
{
    if($_SESSION['UserStatus'] == 'admin' || $_SESSION['UserStatus'] == Null)
    {
      echo '<div class="CMS_EventLog_Table">'
      echo '<h3>Log Events</h3>';
      $result = mysql_query('SHOW COLUMNS FROM CMS_Statistics_Show_LogEvents') or die('cannot show columns from '.$table);
      if(mysql_num_rows($result)) {
        echo '<table cellpadding="0" cellspacing="0" class="db-table">';
        echo '<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default<th>Extra</th></tr>';
        while($row = mysql_fetch_row($result)) {
          echo '<tr>';
          foreach($row as $key=>$value) {
            echo '<td>',$value,'</td>';
          }
          echo '</tr>';
        }
        echo '</table><br />';
      }
      echo '</div>';
    }
  }
}
?>
