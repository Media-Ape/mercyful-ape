<?php 
function absolute($e,$h){
        $a = $e["episode"]; 
        $e["season"]--;
        while($e["season"] != 0){
          $a += $h[$e["season"]];
          $e["season"]--;
        }
        return $a;
}

function episode($a,$h){
        $eps = array("season" => 0,"episode" => 0);
        while ($a > 0){
                $eps["season"]++;
                if ($a <= $h[$eps["season"]]) {$eps["episode"] += $a;}
                $a -= $h[$eps["season"]];
        }
        return $eps;
}

?>