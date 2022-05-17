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

function get_menu($gt_id_parent="", $get_type="", $get_HasChild="", $get_link="")
{

    // new object for Arabicss db 
    $db = new RoleBasedDB;
    //php Creating a dynamic search query with PHP and MySQL
    $whereArr = array();
    if ($gt_id_parent != "")
    {
    $whereArr[] = "`id_parent` = '{$gt_id_parent}'";
    }
    if ($get_type != "")
    {
    $whereArr[] = "`type` = '{$get_type}'";
    }
    if ($get_HasChild != "") {
      $whereArr[] = "`HasChild` = '{$get_HasChild}'";
    } 

    if ($get_link != "") {
      $whereArr[] = "`link` IS NOT NULL";
    } 


    // escaping the WHERE clause in case no parameter entered 
    // Array to string for WHERE clause  
    if ($whereArr == null) {
      $whereStr = "";
    } else {
      $whereStr = "WHERE " . implode(" AND ", $whereArr);
    }

    if ($get_HasChild != "") {
      // getting how many child per id if the value passed
      $menu_sql_query ="SELECT * FROM (SELECT m1.*, 
      (SELECT COUNT(*) FROM `module_menue` `m2` WHERE `m2`.`id_Parent`=`m1`.`id`)
      AS `HasChild` FROM `module_menue` `m1`) AS `testy` {$whereStr} ORDER BY `order_no`;";

    } else {
      // getting only the main 
      $menu_sql_query ="SELECT * FROM `module_menue` {$whereStr} ORDER BY `order_no`;";

    }

    // genrate mysql query
    $res = $db->query($menu_sql_query);

    while($row = $res->fetch_assoc()) {
      $id[] = $row["id"];
      $id_parent[] = $row["id_parent"];
      $icon[] = $row["icon"];
      $link[] = $row["link"];
      $name[] = $row["name"];
      $type[] = $row["type"];
      $order_no [] = $row["order_no"];
    }
    
    $navbar= array("id"=>$id, "id_parent"=>$id_parent, "icon"=>$icon,
       "link"=>$link, "name"=>$name, "type"=>$type, "order_no"=>$order_no);
      
      // rest variables to avoid confilct 
      $id[] = '';
      $id_parent 	[] = '';
      $icon[] = '';
      $link[] = '';
      $name[] = '';
      $type[] = '';
      $order_no [] ='';


    $resCount = $res->num_rows;

    $query_data = array("res"=>$res, "resCount"=>$resCount, "navbar"=>$navbar);
    return $query_data;


}


// the below function will return an array for both the count and he result 
$res= get_menu("profile","", "", "true");

  $nvagationbar='<ul>';
  for ($i=0; $i < $res['resCount'] ; $i++) {
     
    $nvagationbar .= "<li><a href='".$res['navbar']["link"][$i]."' >".$res['navbar']["name"][$i]."</a></li>";
    
}

$nvagationbar .="</ul>";



echo $nvagationbar; 



        
        
        ?>
    <ul>  
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
