<!doctype html>
<html>
    <head>
        <title>Home</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body onload="checkCookie()">
<?php
extract($_Post);
if(!($database = mysql_connect("localhost","root","")))
{
    print("db doesnt connect");
}
if(!(mysql_select_db('users',$database)))
{
    $sql = 'CREATE Database users';
    $retval = mysql_query( $sql, $database );
    if(! $retval ) {
        die('Could not create database: ' . mysql_error());
    }    
    echo "Database test_db created successfully\n";
}
$sql = 'CREATE TABLE users( '.
      'username VARCHAR(30) NOT NULL, '.
      'password  VARCHAR(30) NOT NULL)';
   $retval = mysql_query( $sql, $database );
   
   if(! $retval ) {
      die('Could not create table: ' . mysql_error());
   }
echo "Table employee created successfully\n";
$sql = 'select password from users where username='.$_Post['name'];
if(!($result = mysql_query($sql,$database)))
{
    echo "user not found";
    die("</body></html>");
}
else
{
    


    
        <div class="navbar sticky">
            <a href="home.html">Home</a>
            <a  href="#profile" >user</a>
            <p id="name"></p>
        </div>
    </body>
</html>
<script>
    function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  var expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
    function getCookie(cname) {
  var name = cname + "=";
  var ca = document.cookie.split(';');
  for(var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function checkCookie() {
  var user = getCookie("username");
  if (user != "") {
    alert("Welcome again " + user);
      document.getElementById("name").innerHTML=user;
  } else {
    user = prompt("Please enter your name:", "");
    if (user != "" && user != null) {
      setCookie("username", user, 365);
    }
  }
}
    try{
    undefinedfunction()
    alert('I guess you do exist')
}
catch(e){
    alert('An error has occurred: '+e.message)
}
finally{
    alert('I am alerted regardless of the outcome above')
}
</script>
}
        ?>