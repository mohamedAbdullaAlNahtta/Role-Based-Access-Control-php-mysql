<!DOCTYPE html>
<html>
<head>


<?php

////////////////////////////////////////////////////
// db class for database connection 
////////////////////////////////////////////////////
class RoleBasedDB
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


class NavBarMenu
{
  public $menu = array();

  public function get_root_menu($sql)
  {
    $db = new RoleBasedDB;
    $res = $db->query($sql);
    $this->menu=$res;
  }
}


 




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
        <?php

// $db = new RoleBasedDB;
// $menu_sql_query ="SELECT * FROM `module_menue` WHERE `id_parent`='' ORDER BY `order_no`;";
// $res = $db->query($menu_sql_query);

// $resCount = $res->num_rows;

// while($row = $res->fetch_assoc()) {
//   $id[] = $row["id"];
//   $id_parent 	[] = $row["id_parent"];
//   $icon[] = $row["icon"];
//   $link[] = $row["link"];
//   $name[] = $row["name"];
//   $type[] = $row["type"];
//   $order_no [] = $row["order_no"];
// }

// $navbar= array("id"=>$id, "id_parent"=>$id_parent, "icon"=>$icon,
//    "link"=>$link, "name"=>$name, "type"=>$type, "order_no"=>$order_no);

//   $id[] = '';
//   $id_parent 	[] = '';
//   $icon[] = '';
//   $link[] = '';
//   $name[] = '';
//   $type[] = '';
//   $order_no [] ='';

//   $_nvagationbar='';
//   for ($i=0; $i < $resCount ; $i++) {
     
//     $_nvagationbar .= "<li><a href='".$navbar["link"][$i]."' >".$navbar["name"][$i]."</a></li>";
    
// }
// echo $_nvagationbar;
// var_dump($navbar);


$db = new RoleBasedDB;
$menu_sql_query ="SELECT * FROM `module_menue` WHERE `id_parent`='Profile' ORDER BY `order_no`;";
$res = $db->query($menu_sql_query);

$resCount = $res->num_rows;

while($row = $res->fetch_assoc()) {
  $id[] = $row["id"];
  $id_parent 	[] = $row["id_parent"];
  $icon[] = $row["icon"];
  $link[] = $row["link"];
  $name[] = $row["name"];
  $type[] = $row["type"];
  $order_no [] = $row["order_no"];
}

$navbar= array("id"=>$id, "id_parent"=>$id_parent, "icon"=>$icon,
   "link"=>$link, "name"=>$name, "type"=>$type, "order_no"=>$order_no);

  $id[] = '';
  $id_parent 	[] = '';
  $icon[] = '';
  $link[] = '';
  $name[] = '';
  $type[] = '';
  $order_no [] ='';

  $_nvagationbar='';
  for ($i=0; $i < $resCount ; $i++) {
     
    $_nvagationbar .= "<li><a href='".$navbar["link"][$i]."' >".$navbar["name"][$i]."</a></li>";
    
}
echo $_nvagationbar;




        
        
        ?>
        <li><a class="active" href="index.php?module=home">Home</a></li>
        <li><a href="index.php?module=news">News</a></li>
        <li><a href="index.php?module=contact">Contact</a></li>
        <li><a href="index.php?module=about">About</a></li>
        <li>
            <a class="has-arrow" href="#" aria-expanded="true">
                <span class="hide-menu"><i class="mdi mdi-audiobook"></i>Profile</span>
            </a>
            <ul>
                <li><a href="index.php?module=home">Profile  Home</a></li>
                <li><a href="index.php?module=news">Profile  News</a></li>
                <li><a href="index.php?module=contact">Profile  Contact</a></li>
                <li><a href="index.php?module=about">Profile  About</a></li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="#" aria-expanded="true">
                <span class="hide-menu"><i class="mdi mdi-audiobook"></i>Company</span>
            </a>
            <ul>
                <li><a href="index.php?module=home">Company Home</a></li>
                <li><a href="index.php?module=news">Company News</a></li>
                <li><a href="index.php?module=contact">Company Contact</a></li>
                <li><a href="index.php?module=about">Company About</a></li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="#" aria-expanded="true">
                <span class="hide-menu"><i class="mdi mdi-audiobook"></i>institution</span>
            </a>
            <ul>
                <li><a href="index.php?module=home">institution Home</a></li>
                <li><a href="index.php?module=news">institution News</a></li>
                <li><a href="index.php?module=contact">institution Contact</a></li>
                <li><a href="index.php?module=about">institution About</a></li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="true">
                    <span class="hide-menu"><i class="mdi mdi-audiobook"></i>institution user</span>
                    </a>
                    <ul>
                        <li><a href="index.php?module=home">institution user Home</a></li>
                        <li><a href="index.php?module=news">institution user News</a></li>
                        <li><a href="index.php?module=contact">institution user Contact</a></li>
                        <li><a href="index.php?module=about">institution user About</a></li>
                    </ul>
                </li>
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
