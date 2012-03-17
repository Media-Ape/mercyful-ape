<?php
# American Dad!!!!
function getEpisode($s,$e){
 if ($s == 1) {return $e + 7;}
 else {return $e;}
}

function getSeason($s, $e){
 if ($s == 1) {return 1;}
 else if ($s > 1) {return $s - 1;}
 else {return $s;}
}
?>
