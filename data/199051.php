<?php include("tools.php");
# Top Gear US
# scene values according to a search at nzb.su.

function convert($v){
  $tvdb = array(0,10,16);
  $scene = array(0,10,8,8);
  return episode(absolute($v,$tvdb),$scene);
}
?>