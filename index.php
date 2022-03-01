<!DOCTYPE html>
<html>
<head>
<?php  


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
  <ul>
    <li><a class="active" href="index.php?module=home">Home</a></li>
    <li><a href="index.php?module=news">News</a></li>
    <li><a href="index.php?module=contact">Contact</a></li>
    <li><a href="index.php?module=about">About</a></li>
    <li>
    <a class="has-arrow" href="#" aria-expanded="true"><span class="hide-menu"><i class="mdi mdi-audiobook"></i>Profile 1</span></a>
        <ul>
            <li><a  href="index.php?module=home">Profile 1 Home</a></li>
            <li><a href="index.php?module=news">Profile 1 News</a></li>
            <li><a href="index.php?module=contact">Profile 1 Contact</a></li>
            <li><a href="index.php?module=about">Profile 1 About</a></li>
            <li><a href="index.php?module=about">Profile 1 About</a></li>
        </ul>
    </li>
    <li>
    <a class="has-arrow" href="#" aria-expanded="true"><span class="hide-menu"><i class="mdi mdi-audiobook"></i>Profile 2</span></a>
        <ul>
            <li><a  href="index.php?module=home">Profile 2 Home</a></li>
            <li><a href="index.php?module=news">Profile 2 News</a></li>
            <li><a href="index.php?module=contact">Profile 2 Contact</a></li>
            <li><a href="index.php?module=about">Profile 2 About</a></li>
            <li><a href="index.php?module=about">Profile 2 About</a></li>
        </ul>
    </li>
    <li>
    <a class="has-arrow" href="#" aria-expanded="true"><span class="hide-menu"><i class="mdi mdi-audiobook"></i>Profile 2</span></a>
        <ul>
            <li><a  href="index.php?module=home">Home</a></li>
            <li><a href="index.php?module=news">News</a></li>
            <li><a href="index.php?module=contact">Contact</a></li>
            <li><a href="index.php?module=about">About</a></li>
            <li><a href="index.php?module=about">About</a></li>
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
