<?php include("tools.php");
# Pawn Stars
# on nzb.su season 4 starts at episode 40, and there is no season 5.

function convert($v){
	$tvdb = array(1,14,111,30);
	$a = absolute($v, $tvdb);

	if ($a == 1) {return array("season" => 2,"episode" => 0);}
	if ($v["season"] == 1) {return $v;}

	#season 2 my be out of sync
	if ($v["season"] == 2 and $v["episode"] <= 31) {
		$v["episode"] += 1;
		return $v;
	}

	# Fix for Mile High/Patriot Games Ordering
	if ($a == 127) {return array("season" => 4,"episode" => 54);}
	if ($a == 128) {return array("season" => 4,"episode" => 53);}
	
	if ($a > 45 AND $a < 114) { 	# Season 3
		$v["season"]= 3;
		$v["episode"] = $a - 46;
	} else if ($a > 113) { 			#Season 4
		$v["season"] = 4;
		$v["episode"] = $a - 74;
	}
	return $v;
}

?>
