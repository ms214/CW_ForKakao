<?
  function ghschedule($month){
    //Copyright 2018. ms214 All Rights Reserved.
    //http://blog.ms214.kr/
    $schedule = array();
    for($i = 0; $i<31; $i++){
      $schedule[$i] = $month.($i+1)."일 : ";
    }
    if(strpos($month, "3")!==false){
      $schedule[0] .="\\n";
      $schedule[1] .="입학식\\n";
      $schedule[2] .="\\n";
      $schedule[3] .="\\n";
      $schedule[4] .="\\n";
      $schedule[5] .="\\n";
      $schedule[6] .="전국연합학력평가\\n";
      $schedule[7] .="\\n";
      $schedule[8] .="\\n";
      $schedule[9] .="\\n";
      $schedule[10] .="\\n";
      $schedule[11] .="\\n";
      $schedule[12] .="\\n";
      $schedule[13] .="\\n";
      $schedule[14] .="\\n";
      $schedule[15] .="\\n";
      $schedule[16] .="\\n";
      $schedule[17] .="\\n";
      $schedule[18] .="\\n";
      $schedule[19] .="\\n";
      $schedule[20] .="\\n";
      $schedule[21] .="\\n";
      $schedule[22] .="\\n";
      $schedule[23] .="\\n";
      $schedule[24] .="\\n";
      $schedule[25] .="\\n";
      $schedule[26] .="\\n";
      $schedule[27] .="\\n";
      $schedule[28] .="\\n";
      $schedule[29] .="\\n";
      $schedule[30] .="\\n";
      return $schedule;
    }//3월 if문 끝
    if(strpos($month, "4")!==false){
      $schedule[0] .="\\n";
      $schedule[1] .="\\n";
      $schedule[2] .="\\n";
      $schedule[3] .="\\n";
      $schedule[4] .="\\n";
      $schedule[5] .="\\n";
      $schedule[6] .="\\n";
      $schedule[7] .="\\n";
      $schedule[8] .="\\n";
      $schedule[9] .="전국연합학력평가(3)\\n";
      $schedule[10] .="\\n";
      $schedule[11] .="\\n";
      $schedule[12] .="\\n";
      $schedule[13] .="\\n";
      $schedule[14] .="\\n";
      $schedule[15] .="\\n";
      $schedule[16] .="\\n";
      $schedule[17] .="\\n";
      $schedule[18] .="\\n";
      $schedule[19] .="\\n";
      $schedule[20] .="\\n";
      $schedule[21] .="\\n";
      $schedule[22] .="\\n";
      $schedule[23] .="\\n";
      $schedule[24] .="중간고사\\n";
      $schedule[25] .="\\n";
      $schedule[26] .="\\n";
      $schedule[27] .="중간고사\\n";
      $schedule[28] .="중간고사\\n";
      $schedule[29] .="중간고사\\n";
      $schedule[30] ="";
      return $schedule;
    }
    if(strpos($month, "5")!==false){
      $schedule[0] .= "중간고사\\n";
      $schedule[1] .= "\\n";
      $schedule[2] .= "\\n";
      $schedule[3] .= "\\n";
      $schedule[4] .= "어린이날\\n";
      $schedule[5] .= "대체휴일\\n";
      $schedule[6] .= "\\n";
      $schedule[7] .= "\\n";
      $schedule[8] .= "체험학습\\n";
      $schedule[9] .= "개교기념일\\n";
      $schedule[10] .="\\n";
      $schedule[11] .="석가탄신일\\n";
      $schedule[12] .="\\n";
      $schedule[13] .="\\n";
      $schedule[14] .="재량휴일\\n";
      $schedule[15] .="\\n";
      $schedule[16] .="\\n";
      $schedule[17] .="\\n";
      $schedule[18] .="\\n";
      $schedule[19] .="\\n";
      $schedule[20] .="\\n";
      $schedule[21] .="\\n";
      $schedule[22] .="\\n";
      $schedule[23] .="\\n";
      $schedule[24] .="\\n";
      $schedule[25] .="\\n";
      $schedule[26] .="\\n";
      $schedule[27] .="\\n";
      $schedule[28] .="\\n";
      $schedule[29] .="\\n";
      $schedule[30] .="\\n";
      return $schedule;
    }//5월if문 끝
    if(strpos($month,"6")!==false){
      $schedule[0] .="\\n";
      $schedule[1] .="\\n";
      $schedule[2] .="\\n";
      $schedule[3] .="수능모의평가(3)\\n";
      $schedule[4] .="\\n";
      $schedule[5] .="현충일\\n";
      $schedule[6] .="\\n";
      $schedule[7] .="\\n";
      $schedule[8] .="\\n";
      $schedule[9] .="\\n";
      $schedule[10] .="\\n";
      $schedule[11] .="\\n";
      $schedule[12] .="\\n";
      $schedule[13] .="\\n";
      $schedule[14] .="\\n";
      $schedule[15] .="\\n";
      $schedule[16] .="\\n";
      $schedule[17] .="\\n";
      $schedule[18].="\\n";
      $schedule[19] .="\\n";
      $schedule[20] .="학생 인권 교육\\n";
      $schedule[21] .="\\n";
      $schedule[22] .="\\n";
      $schedule[23] .="\\n";
      $schedule[24] .="\\n";
      $schedule[25] .="\\n";
      $schedule[26] .="\\n";
      $schedule[27] .="\\n";
      $schedule[28] .="\\n";
      $schedule[29] .="\\n";
      $schedule[30] ="";
      return $schedule;
    }//6월 if문 끝
    if(strpos($month, "7")!==false){
      $schedule[0] .="\\n";
      $schedule[1] .="\\n";
      $schedule[2] .="기말고사\\n";
      $schedule[3] .="기말고사\\n";
      $schedule[4] .= "기말고사\\n";
      $schedule[5] .= "\\n";
      $schedule[6] .= "\\n";
      $schedule[7] .= "기말고사\\n";
      $schedule[8] .= "기말고사\\n";
      $schedule[9] .= "전국연합학력평가(3)\\n";
      $schedule[10] .= "\\n";
      $schedule[11] .="\\n";
      $schedule[12] .="\\n";
      $schedule[13] .="\\n";
      $schedule[14] .="\\n";
      $schedule[15] .="\\n";
      $schedule[16] .="\\n";
      $schedule[17] .="\\n";
      $schedule[18] .="방학식\\n";
      $schedule[19] .= "\\n";
      $schedule[20] .="\\n";
      $schedule[21] .="\\n";
      $schedule[22] .="\\n";
      $schedule[23] .="\\n";
      $schedule[24] .="\\n";
      $schedule[25] .="\\n";
      $schedule[26] .="\\n";
      $schedule[27] .="\\n";
      $schedule[28] .="\\n";
      $schedule[29] .="\\n";
      $schedule[30] .="\\n";
      return $schedule;
    }//7월 if문 끝
    if(strpos($month, "8")!==false){
      $schedule[0] .="\\n";
      $schedule[1] .="\\n";
      $schedule[2] .="\\n";
      $schedule[3] .="\\n";
      $schedule[4] .="\\n";
      $schedule[5] .="\\n";
      $schedule[6] .="\\n";
      $schedule[7] .="\\n";
      $schedule[8] .="\\n";
      $schedule[9] .="\\n";
      $schedule[10] .="\\n";
      $schedule[11] .="개학일\\n";
      $schedule[12] .="\\n";
      $schedule[13] .="\\n";
      $schedule[14] .="광복절\\n";
      $schedule[15] .="\\n";
      $schedule[16] .="\\n";
      $schedule[17] .="\\n";
      $schedule[18] .="\\n";
      $schedule[19] .="\\n";
      $schedule[20] .="\\n";
      $schedule[21] .="\\n";
      $schedule[22] .="\\n";
      $schedule[23] .="\\n";
      $schedule[24] .="\\n";
      $schedule[25] .="\\n";
      $schedule[26] .="\\n";
      $schedule[27] .="\\n";
      $schedule[28] .="독서토론대회\\n";
      $schedule[29] .="\\n";
      $schedule[30] .="\\n";
      return $schedule;
    }//8월 if문 끝
    if(strpos($month, "9")!==false){
      $schedule[0] .="\\n";
      $schedule[1] .="\\n";
      $schedule[2] .="\\n";
      $schedule[3] .="전국연합학력평가\\n";
      $schedule[4] .="\\n";
      $schedule[5] .="청원여울마당\\n";
      $schedule[6] .="\\n";
      $schedule[7] .="\\n";
      $schedule[8] .="\\n";
      $schedule[9] .="\\n";
      $schedule[10] .="\\n";
      $schedule[11] .="추석연휴\\n";
      $schedule[12] .="추석연휴\\n";
      $schedule[13] .="추석연휴\\n";
      $schedule[14] .="\\n";
      $schedule[15] .="\\n";
      $schedule[16] .="\\n";
      $schedule[17] .="수련회, 수학여행\\n";
      $schedule[18] .="수련회, 수학여행\\n";
      $schedule[19] .="수련회, 수학여행\\n";
      $schedule[20] .="\\n";
      $schedule[21] .="\\n";
      $schedule[22] .="\\n";
      $schedule[23] .="\\n";
      $schedule[24] .="\\n";
      $schedule[25] .="\\n";
      $schedule[26] .="\\n";
      $schedule[27] .="\\n";
      $schedule[28] .="\\n";
      $schedule[29] .="\\n";
      $schedule[30] = "";
      return $schedule;
    }//9월 if문 끝
    if(strpos($month, "10")!==false){
      $schedule[0] .="중간고사\\n";
      $schedule[1] .="중간고사\\n";
      $schedule[2] .="개천절\\n";
      $schedule[3] .="중간고사\\n";
      $schedule[4] .="\\n";
      $schedule[5] .="\\n";
      $schedule[6] .="중간고사\\n";
      $schedule[7] .="중간고사\\n";
      $schedule[8] .="한글날\\n";
      $schedule[9] .="\\n";
      $schedule[10] .="\\n";
      $schedule[11] .="\\n";
      $schedule[12] .="\\n";
      $schedule[13] .="\\n";
      $schedule[14] .="전국연합학력평가(3)\\n";
      $schedule[15] .="\\n";
      $schedule[16] .="\\n";
      $schedule[17] .="\\n";
      $schedule[18] .="\\n";
      $schedule[19] .="\\n";
      $schedule[20] .="\\n";
      $schedule[21] .="\\n";
      $schedule[22] .="\\n";
      $schedule[23] .="\\n";
      $schedule[24] .="\\n";
      $schedule[25] .="\\n";
      $schedule[26] .="\\n";
      $schedule[27] .="\\n";
      $schedule[28] .="\\n";
      $schedule[29] .="\\n";
      $schedule[30] .="\\n";
      return $schedule;
    }//10월 if문 끝
    if(strpos($month, "11")!==false){
      $schedule[0] .="\\n";
      $schedule[1] .="\\n";
      $schedule[2] .="\\n";
      $schedule[3] .="\\n";
      $schedule[4] .="\\n";
      $schedule[5] .="\\n";
      $schedule[6] .="\\n";
      $schedule[7] .="\\n";
      $schedule[8] .="\\n";
      $schedule[9] .="\\n";
      $schedule[10] .="\\n";
      $schedule[11] .="\\n";
      $schedule[12] .="\\n";
      $schedule[13] .="대학수학능력시험 \\n";
      $schedule[14] .="\\n";
      $schedule[15] .="\\n";
      $schedule[16] .="\\n";
      $schedule[17] .="\\n";
      $schedule[18] .="기말고사(3)\\n";
      $schedule[19] .="기말고사(3), 전국연합학력평가(1,2)\\n";
      $schedule[20] .="기말고사(3)\\n";
      $schedule[21] .="기말고사(3)\\n";
      $schedule[22] .="\\n";
      $schedule[23] .="\\n";
      $schedule[24] .="기말고사(3)\\n";
      $schedule[25] .="기말고사(3)\\n";
      $schedule[26] .="기말고사(3)\\n";
      $schedule[27] .="\\n";
      $schedule[28] .="\\n";
      $schedule[29] .="\\n";
      $schedule[30] = "";
      return $schedule;
    }//11월 if문 끝
    if(strpos($month, "12")!==false){
      $schedule[0] .="\\n";
      $schedule[1] .="\\n";
      $schedule[2] .="\\n";
      $schedule[3] .="\\n";
      $schedule[4] .="\\n";
      $schedule[5] .="\\n";
      $schedule[6] .="\\n";
      $schedule[7] .="\\n";
      $schedule[8] .="기말고사(1,2)\\n";
      $schedule[9] .="기말고사(1,2)\\n";
      $schedule[10] .="기말고사(1,2) \\n";
      $schedule[11] .="기말고사(1,2) \\n";
      $schedule[12] .="기말고사(1,2) \\n";
      $schedule[13] .="\\n";
      $schedule[14] .="\\n";
      $schedule[15] .="졸업사정회\\n";
      $schedule[16] .="\\n";
      $schedule[17] .="\\n";
      $schedule[18] .="\\n";
      $schedule[19] .="\\n";
      $schedule[20] .="\\n";
      $schedule[21] .="\\n";
      $schedule[22] .="\\n";
      $schedule[23] .="방학식\\n";
      $schedule[24] .="성탄절\\n";
      $schedule[25] .="\\n";
      $schedule[26] .="\\n";
      $schedule[27] .="\\n";
      $schedule[28] .="\\n";
      $schedule[29] .="\\n";
      $schedule[30] = "\\n";
      return $schedule;
    }//12월 if문 끝
    if(strpos($month, "1")!==false){
      $schedule[0] .="\\n";
      $schedule[1] .="\\n";
      $schedule[2] .="\\n";
      $schedule[3] .="\\n";
      $schedule[4] .="\\n";
      $schedule[5] .="\\n";
      $schedule[6] .="\\n";
      $schedule[7] .="\\n";
      $schedule[8] .="\\n";
      $schedule[9] .="\\n";
      $schedule[10] .="\\n";
      $schedule[11] .="\\n";
      $schedule[12] .="\\n";
      $schedule[13] .="\\n";
      $schedule[14] .="\\n";
      $schedule[15] .="\\n";
      $schedule[16] .="\\n";
      $schedule[17] .="\\n";
      $schedule[18] .="\\n";
      $schedule[19] .="\\n";
      $schedule[20] .="\\n";
      $schedule[21] .="\\n";
      $schedule[22] .="\\n";
      $schedule[23] .="\\n";
      $schedule[24] .="\\n";
      $schedule[25] .="\\n";
      $schedule[26] .="\\n";
      $schedule[27] .="\\n";
      $schedule[28] .="\\n";
      $schedule[29] .="\\n";
      $schedule[30] = "\\n";
      return $schedule;
    }//1월 if문 끝
    if(strpos($month, "2")!==false){
      $schedule[0] .="\\n";
      $schedule[1] .="\\n";
      $schedule[2] .="개학식\\n";
      $schedule[3] .="\\n";
      $schedule[4] .="\\n";
      $schedule[5] .="졸업식\\n";
      $schedule[6] .="종업식\\n";
      $schedule[7] .="\\n";
      $schedule[8] .="\\n";
      $schedule[9] .="\\n";
      $schedule[10] .="\\n";
      $schedule[11] .="\\n";
      $schedule[12] .="\\n";
      $schedule[13] .="\\n";
      $schedule[14] .="\\n";
      $schedule[15] .="\\n";
      $schedule[16] .="\\n";
      $schedule[17] .="\\n";
      $schedule[18] .="\\n";
      $schedule[19] .="\\n";
      $schedule[20] .="\\n";
      $schedule[21] .="\\n";
      $schedule[22] .="\\n";
      $schedule[23] .="\\n";
      $schedule[24] .="\\n";
      $schedule[25] .="\\n";
      $schedule[26] .="\\n";
      $schedule[27] .="\\n";
      $schedule[28] ="";
      $schedule[29] ="";
      $schedule[30] ="";
      return $schedule;
    }
    else{
      return "잘못된 입력입니다.";
    }
  }

/*  $month = $_GET["month"];
  $schedule = array();
  for($i = 0; $i<31; $i++){
    $schedule[$i] = $month.($i+1)."일 : ";
  }
  if($month == "3"){
    $schedule[0] .="\\n";
    $schedule[1] .="입학식\\n";
    $schedule[2] .="\\n";
    $schedule[3] .="\\n";
    $schedule[4] .="\\n";
    $schedule[5] .="\\n";
    $schedule[6] .="전국연합학력평가\\n";
    $schedule[7] .="\\n";
    $schedule[8] .="\\n";
    $schedule[9] .="\\n";
    $schedule[10] .="\\n";
    $schedule[11] .="\\n";
    $schedule[12] .="\\n";
    $schedule[13] .="\\n";
    $schedule[14] .="\\n";
    $schedule[15] .="\\n";
    $schedule[16] .="\\n";
    $schedule[17] .="\\n";
    $schedule[18] .="\\n";
    $schedule[19] .="\\n";
    $schedule[20] .="\\n";
    $schedule[21] .="\\n";
    $schedule[22] .="\\n";
    $schedule[23] .="\\n";
    $schedule[24] .="\\n";
    $schedule[25] .="\\n";
    $schedule[26] .="\\n";
    $schedule[27] .="\\n";
    $schedule[28] .="\\n";
    $schedule[29] .="\\n";
    $schedule[30] .="\\n";
    print_r($schedule);
  }//3월 if문 끝
  if($month == "4"){
    $schedule[0] .="\\n";
    $schedule[1] .="\\n";
    $schedule[2] .="\\n";
    $schedule[3] .="\\n";
    $schedule[4] .="\\n";
    $schedule[5] .="\\n";
    $schedule[6] .="\\n";
    $schedule[7] .="\\n";
    $schedule[8] .="\\n";
    $schedule[9] .="전국연합학력평가(3)\\n";
    $schedule[10] .="\\n";
    $schedule[11] .="\\n";
    $schedule[12] .="\\n";
    $schedule[13] .="\\n";
    $schedule[14] .="\\n";
    $schedule[15] .="\\n";
    $schedule[16] .="\\n";
    $schedule[17] .="\\n";
    $schedule[18] .="\\n";
    $schedule[19] .="\\n";
    $schedule[20] .="\\n";
    $schedule[21] .="\\n";
    $schedule[22] .="\\n";
    $schedule[23] .="\\n";
    $schedule[24] .="중간고사\\n";
    $schedule[25] .="\\n";
    $schedule[26] .="\\n";
    $schedule[27] .="중간고사\\n";
    $schedule[28] .="중간고사\\n";
    $schedule[29] .="중간고사\\n";
    $schedule[30] ="";
    print_r($schedule);
  }
  if($month == "5"){
    $schedule[0] .= "중간고사\\n";
    $schedule[1] .= "\\n";
    $schedule[2] .= "\\n";
    $schedule[3] .= "\\n";
    $schedule[4] .= "어린이날\\n";
    $schedule[5] .= "대체휴일\\n";
    $schedule[6] .= "\\n";
    $schedule[7] .= "\\n";
    $schedule[8] .= "체험학습\\n";
    $schedule[9] .= "개교기념일\\n";
    $schedule[10] .="\\n";
    $schedule[11] .="석가탄신일\\n";
    $schedule[12] .="\\n";
    $schedule[13] .="\\n";
    $schedule[14] .="재량휴일\\n";
    $schedule[15] .="\\n";
    $schedule[16] .="\\n";
    $schedule[17] .="\\n";
    $schedule[18] .="\\n";
    $schedule[19] .="\\n";
    $schedule[20] .="\\n";
    $schedule[21] .="\\n";
    $schedule[22] .="\\n";
    $schedule[23] .="\\n";
    $schedule[24] .="\\n";
    $schedule[25] .="\\n";
    $schedule[26] .="\\n";
    $schedule[27] .="\\n";
    $schedule[28] .="\\n";
    $schedule[29] .="\\n";
    $schedule[30] .="\\n";
    print_r($schedule);
  }//5월if문 끝
  if($month =="6"){
    $schedule[0] .="\\n";
    $schedule[1] .="\\n";
    $schedule[2] .="\\n";
    $schedule[3] .="수능모의평가(3)\\n";
    $schedule[4] .="\\n";
    $schedule[5] .="현충일\\n";
    $schedule[6] .="\\n";
    $schedule[7] .="\\n";
    $schedule[8] .="\\n";
    $schedule[9] .="\\n";
    $schedule[10] .="\\n";
    $schedule[11] .="\\n";
    $schedule[12] .="\\n";
    $schedule[13] .="\\n";
    $schedule[14] .="\\n";
    $schedule[15] .="\\n";
    $schedule[16] .="\\n";
    $schedule[17] .="\\n";
    $schedule[18].="\\n";
    $schedule[19] .="\\n";
    $schedule[20] .="학생 인권 교육\\n";
    $schedule[21] .="\\n";
    $schedule[22] .="\\n";
    $schedule[23] .="\\n";
    $schedule[24] .="\\n";
    $schedule[25] .="\\n";
    $schedule[26] .="\\n";
    $schedule[27] .="\\n";
    $schedule[28] .="\\n";
    $schedule[29] .="\\n";
    $schedule[30] ="";
    print_r($schedule);
  }//6월 if문 끝
  if($month == "7"){
    $schedule[0] .="\\n";
    $schedule[1] .="\\n";
    $schedule[2] .="기말고사\\n";
    $schedule[3] .="기말고사\\n";
    $schedule[4] .= "기말고사\\n";
    $schedule[5] .= "\\n";
    $schedule[6] .= "\\n";
    $schedule[7] .= "기말고사\\n";
    $schedule[8] .= "기말고사\\n";
    $schedule[9] .= "전국연합학력평가(3)\\n";
    $schedule[10] .= "\\n";
    $schedule[11] .="\\n";
    $schedule[12] .="\\n";
    $schedule[13] .="\\n";
    $schedule[14] .="\\n";
    $schedule[15] .="\\n";
    $schedule[16] .="\\n";
    $schedule[17] .="\\n";
    $schedule[18] .="방학식\\n";
    $schedule[19] .= "\\n";
    $schedule[20] .="\\n";
    $schedule[21] .="\\n";
    $schedule[22] .="\\n";
    $schedule[23] .="\\n";
    $schedule[24] .="\\n";
    $schedule[25] .="\\n";
    $schedule[26] .="\\n";
    $schedule[27] .="\\n";
    $schedule[28] .="\\n";
    $schedule[29] .="\\n";
    $schedule[30] .="\\n";
    print_r($schedule);
  }//7월 if문 끝
  if($month == "8"){
    $schedule[0] .="\\n";
    $schedule[1] .="\\n";
    $schedule[2] .="\\n";
    $schedule[3] .="\\n";
    $schedule[4] .="\\n";
    $schedule[5] .="\\n";
    $schedule[6] .="\\n";
    $schedule[7] .="\\n";
    $schedule[8] .="\\n";
    $schedule[9] .="\\n";
    $schedule[10] .="\\n";
    $schedule[11] .="개학일\\n";
    $schedule[12] .="\\n";
    $schedule[13] .="\\n";
    $schedule[14] .="광복절\\n";
    $schedule[15] .="\\n";
    $schedule[16] .="\\n";
    $schedule[17] .="\\n";
    $schedule[18] .="\\n";
    $schedule[19] .="\\n";
    $schedule[20] .="\\n";
    $schedule[21] .="\\n";
    $schedule[22] .="\\n";
    $schedule[23] .="\\n";
    $schedule[24] .="\\n";
    $schedule[25] .="\\n";
    $schedule[26] .="\\n";
    $schedule[27] .="\\n";
    $schedule[28] .="독서토론대회\\n";
    $schedule[29] .="\\n";
    $schedule[30] .="\\n";
    print_r($schedule);
  }//8월 if문 끝
  if($month == "9"){
    $schedule[0] .="\\n";
    $schedule[1] .="\\n";
    $schedule[2] .="\\n";
    $schedule[3] .="전국연합학력평가\\n";
    $schedule[4] .="\\n";
    $schedule[5] .="청원여울마당\\n";
    $schedule[6] .="\\n";
    $schedule[7] .="\\n";
    $schedule[8] .="\\n";
    $schedule[9] .="\\n";
    $schedule[10] .="\\n";
    $schedule[11] .="추석연휴\\n";
    $schedule[12] .="추석연휴\\n";
    $schedule[13] .="추석연휴\\n";
    $schedule[14] .="\\n";
    $schedule[15] .="\\n";
    $schedule[16] .="\\n";
    $schedule[17] .="수련회 및 수학여행\\\n";
    $schedule[18] .="수련회 및 수학여행\\\n";
    $schedule[19] .="수련회 및 수학여행\\\n";
    $schedule[20] .="\\n";
    $schedule[21] .="\\n";
    $schedule[22] .="\\n";
    $schedule[23] .="\\n";
    $schedule[24] .="\\n";
    $schedule[25] .="\\n";
    $schedule[26] .="\\n";
    $schedule[27] .="\\n";
    $schedule[28] .="\\n";
    $schedule[29] .="\\n";
    $schedule[30] = "";
    print_r($schedule);
  }//9월 if문 끝
  if($month == "10"){
    $schedule[0] .="중간고사\\n";
    $schedule[1] .="중간고사\\n";
    $schedule[2] .="개천절\\n";
    $schedule[3] .="중간고사\\n";
    $schedule[4] .="\\n";
    $schedule[5] .="\\n";
    $schedule[6] .="중간고사\\n";
    $schedule[7] .="중간고사\\n";
    $schedule[8] .="한글날\\n";
    $schedule[9] .="\\n";
    $schedule[10] .="\\n";
    $schedule[11] .="\\n";
    $schedule[12] .="\\n";
    $schedule[13] .="\\n";
    $schedule[14] .="전국연합학력평가(3)\\n";
    $schedule[15] .="\\n";
    $schedule[16] .="\\n";
    $schedule[17] .="\\n";
    $schedule[18] .="\\n";
    $schedule[19] .="\\n";
    $schedule[20] .="\\n";
    $schedule[21] .="\\n";
    $schedule[22] .="\\n";
    $schedule[23] .="\\n";
    $schedule[24] .="\\n";
    $schedule[25] .="\\n";
    $schedule[26] .="\\n";
    $schedule[27] .="\\n";
    $schedule[28] .="\\n";
    $schedule[29] .="\\n";
    $schedule[30] .="\\n";
    print_r($schedule);
  }//10월 if문 끝
  if($month == "11"){
    $schedule[0] .="\\n";
    $schedule[1] .="\\n";
    $schedule[2] .="\\n";
    $schedule[3] .="\\n";
    $schedule[4] .="\\n";
    $schedule[5] .="\\n";
    $schedule[6] .="\\n";
    $schedule[7] .="\\n";
    $schedule[8] .="\\n";
    $schedule[9] .="\\n";
    $schedule[10] .="\\n";
    $schedule[11] .="\\n";
    $schedule[12] .="\\n";
    $schedule[13] .="대학수학능력시험 \\n";
    $schedule[14] .="\\n";
    $schedule[15] .="\\n";
    $schedule[16] .="\\n";
    $schedule[17] .="\\n";
    $schedule[18] .="기말고사(3)\\n";
    $schedule[19] .="기말고사(3), 전국연합학력평가(1,2)\\n";
    $schedule[20] .="기말고사(3)\\n";
    $schedule[21] .="기말고사(3)\\n";
    $schedule[22] .="\\n";
    $schedule[23] .="\\n";
    $schedule[24] .="기말고사(3)\\n";
    $schedule[25] .="기말고사(3)\\n";
    $schedule[26] .="기말고사(3)\\n";
    $schedule[27] .="\\n";
    $schedule[28] .="\\n";
    $schedule[29] .="\\n";
    $schedule[30] = "";
    print_r($schedule);
  }//11월 if문 끝
  if($month == "12"){
    $schedule[0] .="\\n";
    $schedule[1] .="\\n";
    $schedule[2] .="\\n";
    $schedule[3] .="\\n";
    $schedule[4] .="\\n";
    $schedule[5] .="\\n";
    $schedule[6] .="\\n";
    $schedule[7] .="\\n";
    $schedule[8] .="기말고사(1,2)\\n";
    $schedule[9] .="기말고사(1,2)\\n";
    $schedule[10] .="기말고사(1,2) \\n";
    $schedule[11] .="기말고사(1,2) \\n";
    $schedule[12] .="기말고사(1,2) \\n";
    $schedule[13] .="\\n";
    $schedule[14] .="\\n";
    $schedule[15] .="졸업사정회\\n";
    $schedule[16] .="\\n";
    $schedule[17] .="\\n";
    $schedule[18] .="\\n";
    $schedule[19] .="\\n";
    $schedule[20] .="\\n";
    $schedule[21] .="\\n";
    $schedule[22] .="\\n";
    $schedule[23] .="방학식\\n";
    $schedule[24] .="성탄절\\n";
    $schedule[25] .="\\n";
    $schedule[26] .="\\n";
    $schedule[27] .="\\n";
    $schedule[28] .="\\n";
    $schedule[29] .="\\n";
    $schedule[30] = "\\n";
    print_r($schedule);
  }//12월 if문 끝
  if($month == "1"){
    $schedule[0] .="\\n";
    $schedule[1] .="\\n";
    $schedule[2] .="\\n";
    $schedule[3] .="\\n";
    $schedule[4] .="\\n";
    $schedule[5] .="\\n";
    $schedule[6] .="\\n";
    $schedule[7] .="\\n";
    $schedule[8] .="\\n";
    $schedule[9] .="\\n";
    $schedule[10] .="\\n";
    $schedule[11] .="\\n";
    $schedule[12] .="\\n";
    $schedule[13] .="\\n";
    $schedule[14] .="\\n";
    $schedule[15] .="\\n";
    $schedule[16] .="\\n";
    $schedule[17] .="\\n";
    $schedule[18] .="\\n";
    $schedule[19] .="\\n";
    $schedule[20] .="\\n";
    $schedule[21] .="\\n";
    $schedule[22] .="\\n";
    $schedule[23] .="\\n";
    $schedule[24] .="\\n";
    $schedule[25] .="\\n";
    $schedule[26] .="\\n";
    $schedule[27] .="\\n";
    $schedule[28] .="\\n";
    $schedule[29] .="\\n";
    $schedule[30] = "\\n";
    print_r($schedule);
  }//1월 if문 끝
  if($month == "2"){
    $schedule[0] .="\\n";
    $schedule[1] .="\\n";
    $schedule[2] .="개학식\\n";
    $schedule[3] .="\\n";
    $schedule[4] .="\\n";
    $schedule[5] .="졸업식\\n";
    $schedule[6] .="종업식\\n";
    $schedule[7] .="\\n";
    $schedule[8] .="\\n";
    $schedule[9] .="\\n";
    $schedule[10] .="\\n";
    $schedule[11] .="\\n";
    $schedule[12] .="\\n";
    $schedule[13] .="\\n";
    $schedule[14] .="\\n";
    $schedule[15] .="\\n";
    $schedule[16] .="\\n";
    $schedule[17] .="\\n";
    $schedule[18] .="\\n";
    $schedule[19] .="\\n";
    $schedule[20] .="\\n";
    $schedule[21] .="\\n";
    $schedule[22] .="\\n";
    $schedule[23] .="\\n";
    $schedule[24] .="\\n";
    $schedule[25] .="\\n";
    $schedule[26] .="\\n";
    $schedule[27] .="\\n";
    $schedule[28] ="";
    $schedule[29] ="";
    $schedule[30] ="";
    print_r($schedule);
  }
  else{
    "잘못된 입력입니다.";
  }*/


?>
