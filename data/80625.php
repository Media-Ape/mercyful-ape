<?php include("tools.php");
# Megastructures

function convert($v){
	if ($v["series"] > 0){
		$v["series"] = $v["series"] - 2003;
	}
	return $v;
}
?>
