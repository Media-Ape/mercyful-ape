<?php include("tools.php");
# Example conversion file
# name this file {series_id}.php
# fill in the number of episodes for each season starting with 'specials'.
# fill in both tvdb values and scene values.
# the file will automatically be picked up
# you may need to delete the show from sickbeard to get the values to populate again.

function convert($v){
  $tvdb = array(0,22,13,14,17);
  $scene = array(0,10,12,13,14,17);
  return episode(absolute($v,$tvdb),$scene);
}
?>
