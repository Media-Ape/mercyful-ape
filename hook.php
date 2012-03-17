<?php
$americanDad = "73141";
//layout of episodes "Scene"
$epLayout = array(1=>23, 2=>19, 3=>16, 4=>20, 5=>18, 6=>19, 7=>'current');

$url = $_GET['q'];
$url2 = strpos($url, $americanDad);
if($url != "/api/9DAF49C96CBF8DAC/series/73141/all/en.xml") {
   header("Location: http://thetvdb.com".$url);
}
else {
   header('Content-type: text/xml');
   $file = file_get_contents('http://www.thetvdb.com/api/9DAF49C96CBF8DAC/series/73141/all/en.xml');
   $xml = str_replace("&", "&amp;", $file);
   $xml = simplexml_load_string($xml);
   echo <<<EOF
<?xml version="1.0" encoding="UTF-8" ?>
<Data><Series>
  <id>{$xml->Series->id}</id>
  <Actors>{$xml->Series->Actors}</Actors>
  <Airs_DayOfWeek>{$xml->Series->Airs_DayOfWeek}</Airs_DayOfWeek>
  <Airs_Time>{$xml->Series->Airs_Time}</Airs_Time>
  <ContentRating>{$xml->Series->ContentRating}</ContentRating>
  <FirstAired>{$xml->Series->FirstAired}</FirstAired>
  <Genre>{$xml->Series->Genre}</Genre>
  <IMDB_ID>{$xml->Series->IMDB_ID}</IMDB_ID>
  <Language>{$xml->Series->Language}</Language>
  <Network>{$xml->Series->Network}</Network>
  <NetworkID>{$xml->Series->NetworkID}</NetworkID>
  <Overview>{$xml->Series->Overview}</Overview>
  <Rating>{$xml->Series->Rating}</Rating>
  <RatingCount>{$xml->Series->RatingCount}</RatingCount>
  <Runtime>{$xml->Series->Runtime}</Runtime>
  <SeriesID>{$xml->Series->SeriesID}</SeriesID>
  <SeriesName>{$xml->Series->SeriesName}</SeriesName>
  <Status>{$xml->Series->Status}</Status>
  <added>{$xml->Series->added}</added>
  <addedBy>{$xml->Series->addedBy}</addedBy>
  <banner>{$xml->Series->banner}</banner>
  <fanart>{$xml->Series->fanart}</fanart>
  <lastupdated>{$xml->Series->lastupdated}</lastupdated>
  <poster>{$xml->Series->poster}</poster>
  <zap2it_id>{$xml->Series->zap2it_id}</zap2it_id>
</Series>

EOF;
   $curSeason = 1;
   $curEp = 1;
foreach ($xml->Episode as $i=>$xml){
   if($xml->Combined_season == "0"){
      $season = $xml->Combined_season;
      $episode = $xml->EpisodeNumber;
   } else {
      $season = $curSeason;
      $episode = $curEp;
   };
   echo <<<EOF
<Episode>
  <id>{$xml->id}</id>
  <Combined_episodenumber>{$episode}</Combined_episodenumber>
  <Combined_season>{$season}</Combined_season>
  <DVD_chapter>{$xml->DVD_chapter}</DVD_chapter>
  <DVD_discid>{$xml->VD_discid}</DVD_discid>
  <DVD_episodenumber>{$xml->DVD_episodenumber}</DVD_episodenumber>
  <DVD_season>{$xml->DVD_season}</DVD_season>
  <Director>{$xml->Director}</Director>
  <EpImgFlag>{$xml->EpImgFlag}</EpImgFlag>
  <EpisodeName>{$xml->EpisodeName}</EpisodeName>
  <EpisodeNumber>{$episode}</EpisodeNumber>
  <FirstAired>{$xml->FirstAired}</FirstAired>
  <GuestStars>{$xml->GuestStars}</GuestStars>
  <IMDB_ID>{$xml->IMDB_ID}</IMDB_ID>
  <Language>{$xml->Language}</Language>
  <Overview>{$xml->Overview}</Overview>
  <ProductionCode>{$xml->ProductionCode}</ProductionCode>
  <Rating>{$xml->Rating}</Rating>
  <RatingCount>{$xml->RatingCount}</RatingCount>
  <SeasonNumber>{$season}</SeasonNumber>
  <Writer>{$xml->Writer}</Writer>
  <absolute_number>{$xml->absolute_number}</absolute_number>
  <filename>{$xml->filename}</filename>
  <lastupdated>{$xml->lastupdated}</lastupdated>
  <seasonid>{$xml->seasonid}</seasonid>
  <seriesid>{$xml->seriesid}</seriesid>
</Episode>

EOF;

   if($xml->Combined_season == "0"){
      $season = $xml->Combined_season;
      $episode = $xml->EpisodeNumber;
   } else {
      $season = $curSeason;
      if($curEp < $epLayout[$season]){
         $curEp++;
      } elseif($curEp == $epLayout[$season]){
         $curSeason++;
         $curEp = 1;
      } elseif($epLayout[$season] == 'current'){
         $curEp++;
      };
   };
};
   echo <<<EOF
</Data>
EOF;
}
?>