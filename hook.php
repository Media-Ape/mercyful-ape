<?php
$delta_base = "data/";
$url = $_GET['q'];
$tvdb_url = "http://www.thetvdb.com" . $url;

#check to see if its a xml we should catch
$regex = "#(\/series\/)\d{1,7}(\/all\/).{2,3}(.xml)$#";
if ( ! preg_match($regex, $url)) {
  header("Location: " . $url);
}

$file = file_get_contents($tvdb_url);
$xml = simplexml_load_string($file);

header("Content-type: text/xml");

$series = $xml->Series[0]->id;
$delta = $delta_base . $xml->Series[0]->id . ".php";

#if no delta exists, return original data
if (! file_exists($delta)) {
        #header('Location: ' . $tvdb_url);
} else  {
        include($delta);
        foreach ($xml->Episode as $ep) {
                $number = $ep->EpisodeNumber;
                $season = $ep->SeasonNumber;
                $ep->EpisodeNumber = getEpisode($season, $number);
                $ep->SeasonNumber = getSeason($season, $number);
        }
}

echo $xml->asXML();
?>