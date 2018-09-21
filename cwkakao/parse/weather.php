<?php
  function nowWeather(){
    header("Content-type: application/json; charset=UTF-8");        // json type and UTF-8 encoding
    require("Snoopy.class.php");
    $URL = "https://search.naver.com/search.naver?query=%EC%83%81%EA%B3%849%EB%8F%99+%EB%82%A0%EC%94%A8";

    $snoopy = new Snoopy;
    $snoopy->fetch($URL);
    $txt = $snoopy->results;
    $rex='/<span class="todaytemp">(.*?)<\/span>/is';
    preg_match_all($rex, $txt, $o);
    print_r($o[0][0]);
  }
?>
