<html>
  <head><meta charset="utf-8"></head>
  <body>
    <?php
    $url = 'http://localhost/parse/school-meal-master/meal_api_custom.php?countryCode=stu.sen.go.kr&schulCode=B100000544&insttNm=청원고등학교&schulCrseScCode=4&schMmealScCode=2&schYmd=2018.05.08';
    $string = file_get_contents($url);
    //$array_data = json_decode($string, true);
    echo $string;
    ?>
  </body>
</html>
