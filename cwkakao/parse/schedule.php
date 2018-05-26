<?
//고등학교
  function hsche($schoolCode,$month){ /*학교코드, 달, 중/고 구분코드 */
    //Copyright 2018. ms214 All Rights Reserved.
    //http://blog.ms214.kr/

    header("Content-type: application/json; charse=UTF-8");
    include("Snoopy.class.php");
    $snoopy = new Snoopy;
    $URL = "https://stu.sen.go.kr/sts_sci_sf01_001.do?schulCode=".$schoolCode."&schulCrseScCode=4&schulKndScCode=04&ay=2018&mm=".$month;
    $snoopy->fetch($URL);
    preg_match('/<tbody>(.*?)<\/tbody>/is', $snoopy->results, $tbody); //tbody 추출
    $finalout = preg_grep('/<tr>(.*?)<\/tr>/is', $tbody);
    //preg_match_all('/<tr>(.*?)<\/tr>/is', $final, $final);
    $final = $finalout[0];
    $final = preg_replace('/<br \/>/is', "", $final);
    //preg_match_all('/<em>(.*?)<\/em>/is', $final, $day);
    //$final = preg_replace('/<td><div class="textL"><em><\/em><\/div><\/td>/is', "", $final);
    return $final;
  }
//중학교
  function msche($schoolCode,$month){ /*학교코드, 달, 중/고 구분코드 */
    //Copyright 2018. ms214 All Rights Reserved.
    //http://blog.ms214.kr/

    header("Content-type: application/json; charse=UTF-8");
    require("Snoopy.class.php");
    $snoopy = new Snoopy;
    $URL = "https://stu.sen.go.kr/sts_sci_sf01_001.do?schulCode=".$schoolCode."&schulCrseScCode=3&schulKndScCode=03&ay=2018&mm=".$month;
    $snoopy->fetch($URL);
    preg_match('/<tbody>(.*?)<\/tbody>/is', $snoopy->results, $tbody); //tbody 추출
    $finalout = preg_grep('/<tr>(.*?)<\/tr>/is', $tbody);
    //preg_match_all('/<tr>(.*?)<\/tr>/is', $final, $final);
    $final = $finalout[0];
    $final = preg_replace('/<br \/>/is', "", $final);
    //preg_match_all('/<em>(.*?)<\/em>/is', $final, $day);
    //$final = preg_replace('/<td><div class="textL"><em><\/em><\/div><\/td>/is', "", $final);
    return $final;
  }
?>
