<?php include("tools.php");
# Pawn Stars

function convert($v){
  $tvdb = array(0,14,111,30);
  $scene = array(0,14,36,67,53);
  return episode(absolute($v,$tvdb),$scene);
}
?>
