<!DOCTYPE html>
<html>
<head>


<?php


class roleBasedDB
{
    
    protected $servername = "localhost";
    protected $username = "root";
    protected $password = "root";
    protected $database = "role-based-access";
    
    public $connection;
    
    
    public function __construct()
    {
        $this->open_db_connection();
        
    }
    
    
    public function open_db_connection()
    {
        
        $this->connection = new mysqli($this->servername, $this->username, $this->password, $this->database);
        
        // Check connection
        if ($this->connection->connect_error) {
            die("Unable to connect to server" . $this->servername . ".!!!, Please check your connection, and if still the same problem, Please contact your administrator. Thanks for trusting US....... Arabicss Software Development Team");
            
        }
        /*echo "connected";*/
        
        
    }
    public function close_db_connection()
    {
        $this->connection->close();
        /*echo "connection closed";*/
        
    }
    
    public function query($sql)
    {
        $result = $this->connection->query($sql);
        return $result;
        
        
    }

    public function multi_query($sql)
    {
        $result = $this->connection->multi_query($sql);
        return $result;
        
        
    }
    
    public function escape_string($string)
    {
        $escaped_string = $this->connection->real_escape_string($string);
        return $escaped_string;
        
    }
    
    
}



        $usergroup   = new roleBasedDB;
        
        $sql = "SELECT * FROM `systempages` WHERE `pageId` IN (SELECT `pageId` FROM `usergroupprivileges` WHERE `groupName`= (SELECT `usergroups`.`groupName` FROM `users`, `usergroups` WHERE `users`.`groupId`= `usergroups`.`id` AND `username`='muhammad.elnahtta' AND `systemtype`='web' AND `userType`='p' ))";
        
        $result = $usergroup->query($sql);
        
        $usergroup->close_db_connection();

 




if (isset($_GET['module'])) {
  $module = $_GET['module'];
} 

if (isset($module)) {

  include("modules/".$module."/config/default.conf.php");
  getScripts("mainScript",$module);

}else{

  $module="home";
  include("modules/".$module."/config/default.conf.php");
  getScripts("mainScript",$module);

}

?>

<style>
body {
  margin: 0;
}

.aaaa {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 25%;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

li a {
  display: block;
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
}

li a.active {
  background-color: #04AA6D;
  color: white;
}

li a:hover:not(.active) {
  background-color: #555;
  color: white;
}



</style>


</head>
<body>

<div class="aaaa">

<?php 

// $user_group = new UserGroup();
// $user_pages = $user_group->get_pages();
// // var_dump($user_pages);
// while($row = $user_pages->fetch_assoc()) {
// 	echo "<li><a class='has-arrow' aria-expanded='true'>".$row["groupName"]."</a>
// 	<ul aria-expanded='true' class='collapse'>
// 	<li><a href='index?module=".$row["pageName"]."'>".$row["pageName"]."</a></li>"."</ul></li>";
//   }


?>
    <ul>
        <li><a class="active" href="index.php?module=home">Home</a></li>
        <li><a href="index.php?module=news">News</a></li>
        <li><a href="index.php?module=contact">Contact</a></li>
        <li><a href="index.php?module=about">About</a></li>
        <li>
            <a class="has-arrow" href="#" aria-expanded="true">
                <span class="hide-menu"><i class="mdi mdi-audiobook"></i>Profile 1</span>
            </a>
            <ul>
                <li><a href="index.php?module=home">Profile 1 Home</a></li>
                <li><a href="index.php?module=news">Profile 1 News</a></li>
                <li><a href="index.php?module=contact">Profile 1 Contact</a></li>
                <li><a href="index.php?module=about">Profile 1 About</a></li>
                <li><a href="index.php?module=about">Profile 1 About</a></li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="#" aria-expanded="true">
                <span class="hide-menu"><i class="mdi mdi-audiobook"></i>Profile 2</span>
            </a>
            <ul>
                <li><a href="index.php?module=home">Profile 2 Home</a></li>
                <li><a href="index.php?module=news">Profile 2 News</a></li>
                <li><a href="index.php?module=contact">Profile 2 Contact</a></li>
                <li><a href="index.php?module=about">Profile 2 About</a></li>
                <li><a href="index.php?module=about">Profile 2 About</a></li>
            </ul>
        </li>
    </ul>
</div>






<?php  
// True because $a is set
if (isset($module)) {

  include("modules/".$module."/index.php");
}else{

  $module="home";
  include("modules/".$module."/index.php");


}


?>

</body>


<?php

if (isset($module)) {
  getScripts("subScript",$module);

}else{

  $module="home";
  getScripts("subScript",$module);

}


?>
</html>
