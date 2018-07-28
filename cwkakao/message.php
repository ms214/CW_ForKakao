<?php
  $data = json_decode(file_get_contents('php://input'), true);
  $content = $data["content"];
  $user_key = $data["user_key"];
  //$content = $_GET['content'];
  //$user_key = $_GET['userkey'];

  include("./database/db.php"); //db관리파일
  include("./parse/meal2.php");//중식파싱파일
  include("./parse/meal3.php");//석식파싱파일
  include('./parse/hschedule.php');//남고학사일정
  include('./parse/ghschedule.php');//여고학사일정
  include('./parse/mschedule.php');//중교학사일정
  include('./timetable/hs.php');//남고시간표
  include('./timetable/ghs.php');//여고시간표
  include('./timetable/msch.php');//중교시간표

  $ret = firstdb($user_key);
  $school;
  if($ret == 0){
    $school = selectSchool($user_key);
  }

  if($content == "시작하기"){
    $return = firstdb($user_key);
    if($return == 0){
      if($school == "청원고"){
        echo <<< EOD
        {
          "message":
          {
            "text" : "청원 생활알리미 봇을 시작합니다."
          },
          "keyboard":
          {
            "type" : "buttons",
            "buttons": ["급식식단", "청원고", "마이페이지", "개발자", "버전정보"]
          }
        }
EOD;
      }else if($school == "청원여고"){
        echo <<< EOD
        {
          "message":
          {
            "text" : "청원 생활알리미 봇을 시작합니다."
          },
          "keyboard":
          {
            "type" : "buttons",
            "buttons": ["급식식단", "청원여고", "마이페이지", "개발자", "버전정보"]
          }
        }
EOD;
      }else if($school == "청원중"){
        echo <<< EOD
        {
          "message":
          {
            "text" : "청원 생활알리미 봇을 시작합니다."
          },
          "keyboard":
          {
            "type" : "buttons",
            "buttons": ["급식식단", "청원중", "마이페이지", "개발자", "버전정보"]
          }
        }
EOD;
      }
      }else if($return==1){
        $result=insertuserkey($user_key);
        echo <<< EOD
        {
          "message":
          {
            "text" : "회원정보가 없습니다. 초기 등록을 시작합니다. \\n학교가 어디십니까?"
          },
          "keyboard":
          {
            "type" : "buttons",
            "buttons": ["청원고등학교", "청원여자고등학교", "청원중학교"]
          }
        }
EOD;
      }
}else if(strpos($content, "학교")){
  switch ($content){
    case "청원고등학교":
      insertSchool($user_key, "청원고");
      break;
    case "청원여자고등학교":
      insertSchool($user_key, "청원여고");
      break;
    case "청원중학교":
      insertSchool($user_key, "청원중");
      break;
  }
  echo <<< EOD
  {
    "message":
    {
      "text" : "몇 학년 이십니까?"
    },
    "keyboard":
    {
      "type" : "buttons",
      "buttons": ["1학년", "2학년", "3학년"]
    }
  }
EOD;
}else if(strpos($content, "학년")){
  switch ($content){
    case "1학년":
      insertGrade($user_key, "1학년");
      break;
    case "2학년":
      insertGrade($user_key, "2학년");
      break;
    case "3학년":
      insertGrade($user_key, "3학년");
      break;
  }
  echo <<< EOD
  {
    "message":
    {
      "text" : "몇 반 이십니까?"
    },
    "keyboard":
    {
      "type" : "buttons",
      "buttons": ["1반", "2반", "3반", "4반", "5반", "6반", "7반", "8반", "9반", "10반", "11반", "12반", "13반", "14반", "15반", "16반"]
    }
  }
EOD;
}else if(strpos($content, "반")){
  switch ($content){
    case "1반":
      insertClass($user_key, $content);
      break;
    case "2반":
      insertClass($user_key, $content);
      break;
    case "3반":
      insertClass($user_key, $content);
      break;
    case "4반":
      insertClass($user_key, $content);
      break;
    case "5반":
      insertClass($user_key, $content);
      break;
    case "6반":
      insertClass($user_key, $content);
      break;
    case "7반":
      insertClass($user_key, $content);
      break;
    case "8반":
      insertClass($user_key, $content);
      break;
    case "9반":
      insertClass($user_key, $content);
      break;
    case "10반":
      insertClass($user_key, $content);
      break;
    case "11반":
      insertClass($user_key, $content);
      break;
    case "12반":
      insertClass($user_key, $content);
      break;
    case "13반":
      insertClass($user_key, $content);
      break;
    case "14반":
      insertClass($user_key, $content);
      break;
    case "15반":
      insertClass($user_key, $content);
      break;
    case "16반":
      insertClass($user_key, $content);
      break;
  }
  $school = selectSchool($user_key);
  if($school == "청원고"){
    echo <<< EOD
    {
      "message":
      {
        "text" : "모든 정보 입력을 완료하였습니다. \\n메인메뉴입니다."
      },
      "keyboard":
      {
        "type" : "buttons",
        "buttons": ["급식식단", "청원고", "마이페이지", "개발자", "버전정보"]
      }
    }
EOD;
  }else if($school == "청원여고"){
    echo <<< EOD
    {
      "message":
      {
        "text" : "모든 정보 입력을 완료하였습니다. \\n메인메뉴입니다."
      },
      "keyboard":
      {
        "type" : "buttons",
        "buttons": ["급식식단", "청원여고", "마이페이지", "개발자", "버전정보"]
      }
    }
EOD;
  }else if($school == "청원중"){
    echo <<< EOD
    {
      "message":
      {
        "text" : "모든 정보 입력을 완료하였습니다. \\n메인메뉴입니다."
      },
      "keyboard":
      {
        "type" : "buttons",
        "buttons": ["급식식단", "청원중", "마이페이지", "개발자", "버전정보"]
      }
    }
EOD;
  }
}else if($content=="청원고"){

    echo '
    {
      "message":
      {
        "text" : "여긴 청원고메뉴입니다."
      },
      "keyboard":
      {
        "type" : "buttons",
        "buttons":["남고 학사일정", "남고 학급별 시간표", "남고 등교시간", "메인으로"]
      }
    }';
  }else if($content == "청원여고"){
      echo '
      {
        "message":
        {
          "text" : "청원여고메뉴입니다."
        },
        "keyboard":
        {
          "type" : "buttons",
          "buttons":["여고 학사일정", "여고 학급별 시간표", "여고 등교시간", "메인으로"]
        }
      }';
    }else if($content == "청원중"){
      echo '
      {
        "message":
        {
          "text" : "청원중메뉴입니다."
        },
        "keyboard":
        {
          "type" : "buttons",
          "buttons":["중교 학사일정", "중교 학급별 시간표", "중교 등교시간", "메인으로"]
        }
      }';
    }else if($content == "개발자"){
      echo '
      {
        "message":
        {
          "text" : "21412김민수 \\n개발자에게 문의사항 및 개선사항은 ms214@ms214.kr 혹은 1:1 상담기능을 통해 알려주시기 바랍니다:)"
        },
        "keyboard":
        {
          "type" : "buttons",
          "buttons": ["급식식단", "학교별 메뉴", "개발자", "버전정보"]
        }
      }';
    }else if($content == "메인으로"){
      if($school == "청원고"){
        echo <<< EOD
        {
          "message":
          {
            "text" : "메인메뉴 입니다."
          },
          "keyboard":
          {
            "type" : "buttons",
            "buttons": ["급식식단", "청원고", "마이페이지", "개발자", "버전정보"]
          }
        }
EOD;
      }else if($school == "청원여고"){
        echo <<< EOD
        {
          "message":
          {
            "text" : "메인메뉴 입니다."
          },
          "keyboard":
          {
            "type" : "buttons",
            "buttons": ["급식식단", "청원여고", "마이페이지", "개발자", "버전정보"]
          }
        }
EOD;
      }else if($school == "청원중"){
        echo <<< EOD
        {
          "message":
          {
            "text" : "메인메뉴 입니다."
          },
          "keyboard":
          {
            "type" : "buttons",
            "buttons": ["급식식단", "청원중", "마이페이지", "개발자", "버전정보"]
          }
        }
EOD;
      }
    }else if($content == "급식식단"){
      echo '
      {
        "message":
        {
          "text" : "언제 식단을 원하세요?"
        },
        "keyboard":
        {
          "type" : "buttons",
          "buttons":["오늘 중식", "오늘 석식", "내일 중식", "내일 석식", "메인으로"]
        }
      }';
    }else if($content == "오늘 중식"){
      if($school == "청원고"){
        $meal = lfmeal(0);
        echo <<< EOD
        {
          "message":
          {
            "text" : "$meal[0] \\n$meal[1]"
          },
          "keyboard":
          {
            "type" : "buttons",
            "buttons": ["급식식단", "청원고", "마이페이지", "개발자", "버전정보"]
          }
        }
EOD;
      }else if($school == "청원여고"){
        $meal = lfmeal(0);
        echo <<< EOD
        {
          "message":
          {
            "text" : "$meal[0] \\n$meal[1]"
          },
          "keyboard":
          {
            "type" : "buttons",
            "buttons": ["급식식단", "청원여고", "마이페이지", "개발자", "버전정보"]
          }
        }
EOD;
      }else if($school == "청원중"){
        $meal = lfmeal(0);
        echo <<< EOD
        {
          "message":
          {
            "text" : "$meal[0] \\n$meal[1]"
          },
          "keyboard":
          {
            "type" : "buttons",
            "buttons": ["급식식단", "청원중", "마이페이지", "개발자", "버전정보"]
          }
        }
EOD;
      }
    }else if($content == "오늘 석식"){
      if($school == "청원고"){
        $meal = dfmeal(0);
        echo <<< EOD
        {
          "message":
          {
            "text" : "$meal[0] \\n$meal[1]"
          },
          "keyboard":
          {
            "type" : "buttons",
            "buttons": ["급식식단", "청원고", "마이페이지", "개발자", "버전정보"]
          }
        }
EOD;
      }else if($school == "청원여고"){
        $meal = dfmeal(0);
        echo <<< EOD
        {
          "message":
          {
            "text" : "$meal[0] \\n$meal[1]"
          },
          "keyboard":
          {
            "type" : "buttons",
            "buttons": ["급식식단", "청원여고", "마이페이지", "개발자", "버전정보"]
          }
        }
EOD;
      }else if($school == "청원중"){
        $meal = dfmeal(0);
        echo <<< EOD
        {
          "message":
          {
            "text" : "$meal[0] \\n$meal[1]"
          },
          "keyboard":
          {
            "type" : "buttons",
            "buttons": ["급식식단", "청원중", "마이페이지", "개발자", "버전정보"]
          }
        }
EOD;
      }
    }else if($content == "내일 중식"){
      if($school == "청원고"){
        $meal = lfmeal(1);
        echo <<< EOD
        {
          "message":
          {
            "text" : "$meal[0] \\n$meal[1]"
          },
          "keyboard":
          {
            "type" : "buttons",
            "buttons": ["급식식단", "청원고", "마이페이지", "개발자", "버전정보"]
          }
        }
EOD;
      }else if($school == "청원여고"){
        $meal = lfmeal(1);
        echo <<< EOD
        {
          "message":
          {
            "text" : "$meal[0] \\n$meal[1]"
          },
          "keyboard":
          {
            "type" : "buttons",
            "buttons": ["급식식단", "청원여고", "마이페이지", "개발자", "버전정보"]
          }
        }
EOD;
      }else if($school == "청원중"){
        $meal = lfmeal(1);
        echo <<< EOD
        {
          "message":
          {
            "text" : "$meal[0] \\n$meal[1]"
          },
          "keyboard":
          {
            "type" : "buttons",
            "buttons": ["급식식단", "청원중", "마이페이지", "개발자", "버전정보"]
          }
        }
EOD;
      }
    }else if($content == "내일 석식"){
      if($school == "청원고"){
        $meal = dfmeal(1);
        echo <<< EOD
        {
          "message":
          {
            "text" : "$meal[0] \\n$meal[1]"
          },
          "keyboard":
          {
            "type" : "buttons",
            "buttons": ["급식식단", "청원고", "마이페이지", "개발자", "버전정보"]
          }
        }
EOD;
      }else if($school == "청원여고"){
        $meal = dfmeal(1);
        echo <<< EOD
        {
          "message":
          {
            "text" : "$meal[0] \\n$meal[1]"
          },
          "keyboard":
          {
            "type" : "buttons",
            "buttons": ["급식식단", "청원여고", "마이페이지", "개발자", "버전정보"]
          }
        }
EOD;
      }else if($school == "청원중"){
        $meal = dfmeal(1);
        echo <<< EOD
        {
          "message":
          {
            "text" : "$meal[0] \\n$meal[1]"
          },
          "keyboard":
          {
            "type" : "buttons",
            "buttons": ["급식식단", "청원중", "마이페이지", "개발자", "버전정보"]
          }
        }
EOD;
      }
    }else if($content == "남고 학사일정"){
echo <<< EOD
      {
        "message":
        {
          "text" : "몇월의 학사일정이 필요합니까? 다음예시의 형식으로 입력해 주세요(ex. 남고 7월)"
        }
      }
EOD;
    }else if($content == "여고 학사일정"){
      echo <<< EOD
            {
              "message":
              {
                "text" : "몇월의 학사일정이 필요합니까? 다음예시의 형식으로 입력해 주세요(ex. 여고 7월)"
              }
            }
EOD;
    }else if($content == "중교 학사일정"){
      echo <<< EOD
            {
              "message":
              {
                "text" : "몇월의 학사일정이 필요합니까? 다음예시의 형식으로 입력해 주세요(ex. 중교 7월)"
              }
            }
EOD;
    }else if($content == "남고 등교시간"){
      echo'
      {
        "message":
        {
          "text" : "청원고 등교시간은 07:35 입니다. \\n 잘못된 정보일 경우 1:1 상담이나 ms214@ms214.kr 로 알려주세요 :)"
        },
        "keyboard":
        {
          "type" : "buttons",
          "buttons":["남고 학사일정", "남고 학급별 시간표", "남고 등교시간", "메인으로"]
        }
      }';
    }else if($content == "여고 등교시간"){
      echo'
      {
        "message":
        {
          "text" : "청원여고 등교시간은 08:00 입니다. \\n 잘못된 정보일 경우 1:1 상담이나 ms214@ms214.kr 로 알려주세요 :)"
        },
        "keyboard":
        {
          "type" : "buttons",
          "buttons":["여고 학사일정", "여고 학급별 시간표", "여고 등교시간", "메인으로"]
        }
      }';
    }else if($content == "중교 등교시간"){
      echo'
      {
        "message":
        {
          "text" : "청원중 등교시간은 08:30 입니다. \\n 잘못된 정보일 경우 1:1 상담이나 ms214@ms214.kr 로 알려주세요 :)"
        },
        "keyboard":
        {
          "type" : "buttons",
          "buttons":["중교 학사일정", "중교 학급별 시간표", "중교 등교시간", "메인으로"]
        }
      }';
    }else if($content == "버전정보"){
      echo'
      {
        "message":
        {
          "text" : "현재 버전 : 1.0 \\n 청원 생활알리미는 청원학생들과 함께 만들어집니다! \\n 건의사항은 ms214@ms214.kr 이나 1:1 상담기능을 통해 알려주세요!"
        },
        "keyboard":
        {
          "type" : "buttons",
          "buttons": ["급식식단", "학교별 메뉴", "개발자", "버전정보"]
        }
      }';
    }else if($content == "학교별 메뉴"){
      echo <<< EOD
      {
        "message":
        {
          "text" : "어느 학교를 선택하시겠습니까?"
        },
        "keyboard":
        {
          "type" : "buttons",
          "buttons": ["청원고", "청원여고", "청원중", "메인으로"]
        }
      }
EOD;
    }else if($content == "남고 학급별 시간표"){
      //학년반을 남고 학년-반 형식으로 입력해 주세요 (ex. 남고 2-1 혹은 남고 2-11) 형식이 맞지 않을 시 답변이 나오지 않습니다.
      echo '
      {
        "message":
        {
          "text" : "시간표기능은 2학기때 부터 제공될 예정입니다. 따라서 2학기때 학급별 시간표를 다시 제공받을 예정입니다. 2학기때 찾아 뵙겠습니다 :) \\n 수고스럽게 정보를 제공해 주신 분들께 진심으로 감사드리고 죄송합니다. 학교별 메뉴로 돌아갑니다."
        },
        "keyboard":
        {
          "type" : "buttons",
          "buttons":["남고 학사일정", "남고 학급별 시간표", "남고 등교시간", "메인으로"]
        }
      }';
    }else if($content == "여고 학급별 시간표"){
      echo '
      {
        "message":
        {
          "text" : "시간표기능은 2학기때 부터 제공될 예정입니다. 따라서 2학기때 학급별 시간표를 다시 제공받을 예정입니다. 2학기때 찾아 뵙겠습니다 :) \\n 수고스럽게 정보를 제공해 주신 분들께 진심으로 감사드리고 죄송합니다. 학교별 메뉴로 돌아갑니다."
        },
        "keyboard":
        {
          "type" : "buttons",
          "buttons":["여고 학사일정", "여고 학급별 시간표", "여고 등교시간", "메인으로"]
        }
      }';
    }else if($content == "중교 학급별 시간표"){
      echo '
      {
        "message":
        {
          "text" : "시간표기능은 2학기때 부터 제공될 예정입니다. 따라서 2학기때 학급별 시간표를 다시 제공받을 예정입니다. 2학기때 찾아 뵙겠습니다 :) \\n 수고스럽게 정보를 제공해 주신 분들께 진심으로 감사드리고 죄송합니다. 학교별 메뉴로 돌아갑니다."
        },
        "keyboard":
        {
          "type" : "buttons",
          "buttons":["중교 학사일정", "중교 학급별 시간표", "중교 등교시간", "메인으로"]
        }
      }';
    }else if(strpos($content, "월") !== false){
      if(strpos($content, "남고") !== false){
        $month = mb_substr($content, 3,4);
        $result = hschedule($month);
        $out = $result[0].$result[1].$result[2].$result[3].$result[4].$result[5].$result[6].$result[7].$result[8].$result[9].$result[10].$result[11].$result[12].$result[13].$result[14].$result[15].$result[16].$result[17].$result[18].$result[19].$result[20].$result[21].$result[22].$result[23].$result[24].$result[25].$result[26].$result[28].$result[29].$result[30]."오류 신고바랍니다.";
        echo <<< EOD
        {
          "message":
          {
            "text" : "$month 학사일정표입니다.\\n$out"

          },
          "keyboard":
          {
            "type" : "buttons",
            "buttons":["남고 학사일정", "남고 학급별 시간표", "남고 등교시간", "메인으로"]
          }
        }
EOD;
  }else if(strpos($content, "여고") !== false){
    $month = mb_substr($content, 3,4);
      $result = ghschedule($month);
      $out = $result[0].$result[1].$result[2].$result[3].$result[4].$result[5].$result[6].$result[7].$result[8].$result[9].$result[10].$result[11].$result[12].$result[13].$result[14].$result[15].$result[16].$result[17].$result[18].$result[19].$result[20].$result[21].$result[22].$result[23].$result[24].$result[25].$result[26].$result[28].$result[29].$result[30]."오류 신고바랍니다.";
echo <<< EOD
      {
        "message":
        {
          "text" : "$month 학사일정표입니다.\\n$out"

        },
        "keyboard":
        {
          "type" : "buttons",
          "buttons":["여고 학사일정", "여고 학급별 시간표", "여고 등교시간", "메인으로"]
        }
      }
EOD;
}else if(strpos($content, "중교") !== false){
  $month = mb_substr($content, 3,4);
    $result = mschedule($month);
    $out = $result[0].$result[1].$result[2].$result[3].$result[4].$result[5].$result[6].$result[7].$result[8].$result[9].$result[10].$result[11].$result[12].$result[13].$result[14].$result[15].$result[16].$result[17].$result[18].$result[19].$result[20].$result[21].$result[22].$result[23].$result[24].$result[25].$result[26].$result[28].$result[29].$result[30]."오류 신고바랍니다.";
echo <<< EOD
    {
      "message":
      {
        "text" : "$month 학사일정표입니다.\\n$out"

      },
      "keyboard":
      {
        "type" : "buttons",
        "buttons":["중교 학사일정", "중교 학급별 시간표", "중교 등교시간", "메인으로"]
      }
    }
EOD;
}else{
    echo <<< EOD
    {
      "message":
      {
        "text" : "잘못입력하셨습니다. 메인으로 돌아갑니다."
      },
      "keyboard":
      {
        "type" : "buttons",
        "buttons": ["급식식단", "학교별 메뉴", "개발자", "버전정보"]
      }
    }
EOD;
  }
}else if($content == "마이페이지"){

  $school = selectSchool($user_key);
  $grade = selectGrade($user_key);
  $class = selectClass($user_key);
  echo <<< EOD
  {
    "message":
    {
      "text" : "$school $grade 학년 $class 반 학생의 마이페이지 입니다. 무엇을 선택하시겠습니까?"
    },
    "keyboard":
    {
      "type" : "buttons",
      "buttons": ["전체내역 조회", "수정하기", "내 정보 지우기", "메인으로"]
    }
  }
EOD;
}else{
      echo '
      {
        "message":
        {
          "text" : "잘못 입력하셨거나 아직 준비중인 기능입니다. 형식에 맞게 입력하였는지 다시한번 확인해 주시기 바랍니다.:)"
        },
        "keyboard":
        {
          "type" : "buttons",
          "buttons": ["급식식단", "학교별 메뉴", "개발자", "버전정보"]
        }
      }';
    }
    /*else if(strpos($content, "-") !== false){
      if(strpos($content, "남고") !== false){
        $timetable = hstimetable($content);
      }else if(strpos($content, "여고") !== false){
        $result = strstr($content, "여고");
        $timetable = ghstimetable($content);
      }else if(strpos($content, "중교") !== false){
        $result = strstr($content, "중교");
        $timetable = mschtimetable($content);
      }
      echo <<< EOD
      {
        "message":
        {
          "text" : "$timetable"
        },
        "keyboard":
        {
          "type" : "buttons",
          "buttons": ["급식식단", "학교별 메뉴", "개발자", "버전정보"]
        }
      }
EOD;
}
*/
?>
