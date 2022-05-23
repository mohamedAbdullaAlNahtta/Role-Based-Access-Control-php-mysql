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
  ////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////
  // Note Maximum level of tabs is 3 levels 0, 1, and 2///
  ////////////////////////////////////////////////////////
  // Developed by engineer Muhammad Abdulla El Nahtta   //
  // Cell Phone +20 109 300 1070                        //
  ////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////// 

    public $htmlNavBar = "<ul>";
 

    public function testy(){
      $first_lavel = $this->get_1st_level_menu();

      $tabCount = count($first_lavel['id']);

      $nav_trial  = "<ul>";

      for ($i=0; $i <$tabCount ; $i++) { 
            if ($first_lavel['HasChild'][$i]===false) {
                  // checking if there is sub menu for the first level tabs
                  $nav_trial .= $this->html_menu_tab($first_lavel['id'][$i]);
            } elseif($first_lavel['HasChild'][$i]===true) {

                  $nav_trial .="<li>";
                  $nav_trial .= $this->html_Parent_tab($first_lavel['id'][$i]);

                  // going through 2nd level tabs 
                  $second_lavel = $this->get_2nd_level_menu($first_lavel['id'][$i]);
                  $secondLevelTabCount = count($second_lavel['id']);
                  $nav_trial .="<ul>";
                  for ($x=0; $x <$secondLevelTabCount; $x++) { 
                            
                            if ($second_lavel['HasChild'][$x]===false) {
                                    $nav_trial .= $this->html_menu_tab($second_lavel['id'][$x]);
                            } elseif($second_lavel['HasChild'][$x]===true) {
                                    # code...
                                    $nav_trial .= $this->html_parent_menu_child_tab_final($second_lavel['id'][$x]);
                            }
                             
                  }
                  $nav_trial .="</ul>"; 
                  $nav_trial .="</li>";
            }
      }

      $nav_trial .= "</ul>";

      echo $nav_trial;
    }
 
    
    public function get_1st_level_menu()
    {
      $root         = $this->get_menu("",false,"",true,"","0");
      $id           = $root['navbar']['id'];
      $Child_Count     = $root['navbar']['Child_Count'];

      $recordCount  = $root['resCount'];
      
      for ($i=0; $i < $recordCount ; $i++) { 
        if ($Child_Count[$i]>0) 
              $HasChild[$i]    = true;
        else  $HasChild[$i]    = false;
      }

      $menu     = array(
        "id"          => $id,
        "HasChild"    => $HasChild,
      );
      return $menu;
    }  


    public function get_2nd_level_menu($parent)
    {
      $root         = $this->get_menu("",$parent,"",true,"","1");
      $id           = $root['navbar']['id'];
      $Child_Count     = $root['navbar']['Child_Count'];

      $recordCount  = $root['resCount'];
      
      for ($i=0; $i < $recordCount ; $i++) { 
        if ($Child_Count[$i]>0) 
              $HasChild[$i]    = true;
        else  $HasChild[$i]    = false;
      }

      $menu     = array(
        "id"          => $id,
        "HasChild"    => $HasChild,
      );
      return $menu;
      
    } 
    
   
    public function html_menu_tab($tabName)
    {
      $menutab         = $this->get_menu($tabName)['navbar'];
      $navgationBar    =  "<li><a href='".$menutab["link"][0]."' >".$menutab["name"][0]."</a></li>";
      return $navgationBar;

    }

    public function html_parent_menu_child_tab_final($parentName)
    {
      $htmlNav     = "<li>";
      $parentTree  = $this->get_menu($parentName) ['navbar'];
      $parentHtml  = $this->html_Parent_tab($parentName);
      $htmlNav    .= $parentHtml; 

      $childTree  = $this->get_menu("",$parentName) ['navbar'];
      $childHtml  = $this->html_child_menu($childTree);

      $htmlNav    .= $childHtml;
      $htmlNav    .= "</li>"; 

      return $htmlNav;

    }

    public function html_child_menu($tabArray)
    {
      ////////////////////////////////////////////////////////
      ////////////////////////////////////////////////////////
      ////////////////////                    ////////////////
      /////////////////   function description  //////////////
      /////////////////                         //////////////
      // this function genrate html based on the parameters //
      // which you put the count of tabs and the array which//
      // has the data itself and return a string which      //
      // contain the html <li> menu                         //
      ////////////////////////////////////////////////////////
      // Developed by engineer Muhammad Abdulla El Nahtta   //
      // Cell Phone +20 1093001070                          //
      ////////////////////////////////////////////////////////
      //////////////////////////////////////////////////////// 
      $tabCount    = count($tabArray[array_keys($tabArray)[0]]);
      $navgationBar='<ul>';
      for ($i=0; $i < $tabCount ; $i++) {
        
        $navgationBar .= "<li><a href='".$tabArray["link"][$i]."' >".$tabArray["name"][$i]."</a></li>";
        
      }
      $navgationBar .="</ul>";

      return $navgationBar;
      
    }
    
    public function html_Parent_tab($parentName)
    {
      ////////////////////////////////////////////////////////
      ////////////////////////////////////////////////////////
      ////////////////////                    ////////////////
      /////////////////   function description  //////////////
      /////////////////                         //////////////
      // this function genrate html based on the parameters //
      // which you put the count of tabs and the array which//
      // has the data itself and return a string which      //
      // contain the html <a> menu tab                      //
      ////////////////////////////////////////////////////////
      // Developed by engineer Muhammad Abdulla El Nahtta   //
      // Cell Phone +20 1093001070                          //
      ////////////////////////////////////////////////////////
      //////////////////////////////////////////////////////// 
      $tabArray      = $this->get_menu($parentName);
      $navgationBar  ="<a class='has-arrow' href='#' aria-expanded='true'>";        
      $navgationBar .= "<span class='hide-menu'><i class='mdi mdi-audiobook'></i>".$tabArray["navbar"]["id"][0]."</span>";
      $navgationBar .="</a>";
  
      return $navgationBar;
      
    }

    public function get_menu($get_id="", $get_id_parent="", $get_type="", $get_HasChild="", $get_link="", $get_level="")
    {
      ////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////
        ////////////////////                    ////////////////
        /////////////////   function description  //////////////
        /////////////////                         //////////////
        // this function genrate a dynamic query based on the //
        //parameters which you put and return an array with   //
        // the query itself, query result, row count, also    //
        // the returned data into a multi dimention array     //
        // result
        // 1- sql_query the dynamic genrated sql quer itself 
        // 2- queryResult  the reslut in case there is sql error
        // 3- resCount the row count
        // 4- navbar the row data itself
        ////////////////////////////////////////////////////////
        // Developed by engineer Muhammad Abdulla El Nahtta   //
        // Cell Phone +20 1093001070                          //
        ////////////////////////////////////////////////////////
        //////////////////////////////////////////////////////// 

        // new object for Arabicss db 
        $db = new RoleBasedDB;
        //php Creating a dynamic search query with PHP and MySQL
        $whereArr = array();
        if ($get_id != "")
        {
        $whereArr[] = "`id` = '{$get_id}'";
        }

        if($get_id_parent === true){
          $whereArr[] = "`id_parent` IS NOT NULL";
        }elseif ($get_id_parent === false ){
          $whereArr[] = "`id_parent` IS NULL";
        }elseif ($get_id_parent !== "" && $get_id_parent !== true && $get_id_parent !== false){
          $whereArr[] = "`id_parent` = '{$get_id_parent}'";
        }

        if ($get_type != "")
        {
        $whereArr[] = "`type` = '{$get_type}'";
        }
        if ($get_HasChild != "" && $get_HasChild != "true") {
          $whereArr[] = "`HasChild` = '{$get_HasChild}'";
        }
        
        if ($get_level !== "") {
          $whereArr[] = "`level` = '{$get_level}'";
        }

        if($get_link === true){
          $whereArr[] = "`link` IS NOT NULL";
         }elseif($get_link === false){
          $whereArr[] = "`link` IS NULL";
         }elseif($get_link !== "" && $get_link !== true && $get_link !== false){
          $whereArr[] = "`link` = '{$get_link}'";
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
        $queryResult = $db->query($menu_sql_query);

        while($row = $queryResult->fetch_assoc()) {
            $id[]             = $row["id"];
            $id_parent[]      = $row["id_parent"];
            $icon[]           = $row["icon"];
            $link[]           = $row["link"];
            $name[]           = $row["name"];
            $type[]           = $row["type"];
            $order_no[]       = $row["order_no"];
            $level[]          = $row["level"];
          if($get_HasChild != ""){
            $Child_Count[]  = $row["HasChild"];
          }else{
            $Child_Count[]  = "";
          }
        }
        
        $navBar= array(
          "id"           =>   $id, 
          "id_parent"    =>   $id_parent, 
          "icon"         =>   $icon,
          "link"         =>   $link, 
          "name"         =>   $name, 
          "type"         =>   $type, 
          "order_no"     =>   $order_no, 
          "level"        =>   $level, 
          "Child_Count"  =>   $Child_Count
        );
          
          // rest variables to avoid confilct 
          $id[]           = '';
          $id_parent[]    = '';
          $icon[]         = '';
          $link[]         = '';
          $name[]         = '';
          $type[]         = '';
          $order_no[]     = '';
          $level[]        = '';
          $Child_Count[]  = '';


        $resCount = $queryResult->num_rows;

        $query_data = array(
          "sql_query"     =>   $menu_sql_query, 
          "queryResult"   =>   $queryResult, 
          "resCount"      =>   $resCount, 
          "navbar"        =>   $navBar
        );
        return $query_data;


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

$nav = new NavBarMenu;


 
var_dump($nav->get_2nd_level_menu('Profile'));
$nav->testy();

// var_dump($nav->get_2nd_level_menu("profile"));
// array(2) { ["id"]=> array(4) { [0]=> string(13) "Profile Home" [1]=> string(13) "Profile News" [2]=> string(16) "Profile Contact" [3]=> string(14) "Profile About" }
//  ["HasChild"]=> array(4) { [0]=> bool(false) [1]=> bool(false) [2]=> bool(false) [3]=> bool(false) } } 
        
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
