<?php

function getScripts($scripType, $moduleName){
	include("modules/".$moduleName."/lib/".$scripType.".php");
}

?>