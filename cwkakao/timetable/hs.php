<?php
function hstimetable($class){
  //숫자만 추출
  //그에따른 txt파일 불러오기
  //txt파일에서 불러온 텍스트 리턴
  if($class == "남고 2-2"){
    return "시간표가 등록되어 있지 않습니다";
  }else{
    $fp = fopen("./hstt/202.txt", "r");
    $fr = fread($fp, filesize("./hstt/202.txt"));
    fclose($fp);
    print_r($fr);
  }
}
 ?>
