<?php include("tools.php");
# Example conversion file
# name this file {series_id}.php
# fill in the number of episodes for each season starting with 'specials'.
# fill in both tvdb values and scene values.
# the file will automatically be picked up
# you may need to delete the show from sickbeard to get the values to populate again.

function convert($v){
  $tvdb = array(0,7,16,19,16,20,18,19,16);
  $scene = array(0,23,19,16,20,18,19,16);
  return episode(absolute($v,$tvdb),$scene);
}
?>
