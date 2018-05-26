<html>
  <head><meta charset="utf-8"></head>
  <body>
    <?php
      /*$month = $_GET["month"];
      $schoolCode = $_GET["schulCode"];
      $code = $_GET["code"];
      //header("Content-type: application/json; charset=UTF-8");
      require("Snoopy.class.php");
      $URL = "https://stu.sen.go.kr/sts_sci_sf01_001.do?schulCode={$schoolCode}&schulCrseScCode={$code}&schulKndScCode=0{$code}&ay=2018&mm={$month}";
      $snoopy = new Snoopy;
      $snoopy->fetch($URL);
      //print_r($snoopy->results);
      preg_match('/<tbody>(.*?)<\/tbody>/is', $snoopy->results, $tbody); // tbody 추출
      $final = $tbody;
      preg_match_all('/<tr>(.*?)<\/tr>/is', $final, $final);
      $final = $final[0];
      $final = preg_replace('/<br \/>/is', "", $final);
      //preg_match_all('/<em>(.*?)<\/em>/is', $final, $day);
      //$final = preg_replace('/<td><div class="textL"><em><\/em> \\n\\n<\/div><\/td>/is', "", $final);
      print_r($final);*/

      $month = $_GET["month"];
      require('./parse/hschedule.php');
      $echo = hschedule($month);
      print_r($echo);
    ?>
  </body>
</html>
