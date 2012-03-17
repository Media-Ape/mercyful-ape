<?php include("tools.php");
# American Dad!!!!

function convert($v){
  $tvdb = array(0,7,16,19,16,20,18,19,16);
  $scene = array(0,23,19,16,20,18,19,16);
  return episode(absolute($v,$tvdb),$scene);
}
?>
