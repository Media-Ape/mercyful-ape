<?php include("tools.php");
# Megastructures

function convert($v){
	if ($v["season"] > 0){
		$v["season"] = $v["season"] - 2003;
	}
	return $v;
}
?>
