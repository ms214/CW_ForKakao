<?php
  $data = json_decode(file_get_contents('php://input'), true);
  $content = $data["content"];
  include("./parse/meal2.php");
  include("./parse/meal3.php");
  include('./parse/hschedule.php');
  include('./parse/ghschedule.php');
  include('./parse/mschedule.php');

  if($content=="청원고"){

    echo '
    {
      "message":
      {
        "text" : "여긴 청원고메뉴입니다."
      },
      "keyboard":
      {
        "type" : "buttons",
        "buttons":["남고 급식식단", "남고 학사일정", "남고 등교시간", "메인으로"]
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
          "buttons":["여고 급식식단", "여고 학사일정", "여고 등교시간", "메인으로"]
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
          "buttons":["중교 급식식단", "중교 학사일정", "중교 등교시간", "메인으로"]
        }
      }';
    }else if($content == "개발자"){
      echo '
      {
        "message":
        {
          "text" : "청원고 2-14 김민수가 만들었습니다.\\n문의사항 및 개선사항은 ms214@ms214.kr 혹은 1:1 상담기능을 통해 알려주시기 바랍니다:)"
        },
        "keyboard":
        {
          "type" : "buttons",
          "buttons":["청원고", "청원여고", "청원중", "개발자", "버전정보"]
        }
      }';
    }else if($content == "메인으로"){
      echo '
      {
        "message":
        {
          "text" : "메인으로 돌아갑니다!!"
        },
        "keyboard":
        {
          "type" : "buttons",
          "buttons":["청원고", "청원여고", "청원중", "개발자", "버전정보"]
        }
      }';
    }else if($content == "남고 급식식단" || $content == "여고 급식식단"){
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
      //$temp = "고";
    }else if($content == "중교 급식식단"){
      echo '
      {
        "message":
        {
          "text" : "언제 식단을 원하세요?"
        },
        "keyboard":
        {
          "type" : "buttons",
          "buttons":["오늘 중식", "내일 중식", "메인으로"]
        }
      }';
      //$temp = "중교";
    }else if($content == "오늘 중식"){
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
        "buttons":["청원고", "청원여고", "청원중", "개발자", "버전정보"]
      }
    }
EOD;
    }else if($content == "오늘 석식"){
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
          "buttons":["오늘 중식", "오늘 석식", "내일 중식", "내일 석식", "메인으로"]
        }
      }
EOD;
    }else if($content == "내일 중식"){
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
        "buttons":["청원고", "청원여고", "청원중", "개발자", "버전정보"]
      }
    }
EOD;
    }else if($content == "내일 석식"){
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
          "buttons":["청원고", "청원여고", "청원중", "개발자", "버전정보"]
        }
      }
EOD;
    }else if($content == "남고 학사일정"){
      $month = date("m");
      $result = hschedule($month);
      $out = $result[0].$result[1].$result[2].$result[3].$result[4].$result[5].$result[6].$result[7].$result[8].$result[9].$result[10].$result[11].$result[12].$result[13].$result[14].$result[15].$result[16].$result[17].$result[18].$result[19].$result[20].$result[21].$result[22].$result[23].$result[24].$result[25].$result[26].$result[28].$result[29].$result[30]."오류 신고바랍니다.";
echo <<< EOD
      {
        "message":
        {
          "text" : "$month 월 학사일정표입니다.\\n$out"

        },
        "keyboard":
        {
          "type" : "buttons",
          "buttons":["청원고", "청원여고", "청원중", "개발자", "버전정보"]
        }
      }
EOD;
    }else if($content == "여고 학사일정"){
      $month = date("m");
      $result = ghschedule($month);
      $out = $result[0].$result[1].$result[2].$result[3].$result[4].$result[5].$result[6].$result[7].$result[8].$result[9].$result[10].$result[11].$result[12].$result[13].$result[14].$result[15].$result[16].$result[17].$result[18].$result[19].$result[20].$result[21].$result[22].$result[23].$result[24].$result[25].$result[26].$result[28].$result[29].$result[30]."오류 신고바랍니다.";
echo <<< EOD
      {
        "message":
        {
          "text" : "$month 월 학사일정표입니다.\\n$out"

        },
        "keyboard":
        {
          "type" : "buttons",
          "buttons":["청원고", "청원여고", "청원중", "개발자", "버전정보"]
        }
      }
EOD;
    }else if($content == "중교 학사일정"){
      $month = date("m");
      $result = mschedule($month);
      $out = $result[0].$result[1].$result[2].$result[3].$result[4].$result[5].$result[6].$result[7].$result[8].$result[9].$result[10].$result[11].$result[12].$result[13].$result[14].$result[15].$result[16].$result[17].$result[18].$result[19].$result[20].$result[21].$result[22].$result[23].$result[24].$result[25].$result[26].$result[28].$result[29].$result[30]."오류 신고바랍니다.";
  echo <<< EOD
      {
        "message":
        {
          "text" : "$month 월 학사일정표입니다.\\n$out"

        },
        "keyboard":
        {
          "type" : "buttons",
          "buttons":["청원고", "청원여고", "청원중", "개발자", "버전정보"]
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
          "buttons":["청원고", "청원여고", "청원중", "개발자", "버전정보"]
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
          "buttons":["청원고", "청원여고", "청원중", "개발자", "버전정보"]
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
          "buttons":["청원고", "청원여고", "청원중", "개발자", "버전정보"]
        }
      }';
    }else if($content = "버전정보"){
      echo'
      {
        "message":
        {
          "text" : "현재 버전 : 0.2 \\n 청원 생활알리미는 청원학생들과 함께 만들어집니다! \\n 건의사항은 ms214@ms214.kr 이나 1:1 상담기능을 통해 알려주세요!"
        },
        "keyboard":
        {
          "type" : "buttons",
          "buttons":["청원고", "청원여고", "청원중", "개발자", "버전정보"]
        }
      }';
    }else{
      echo '
      {
        "message":
        {
          "text" : "잘못 입력하셨습니다. 메인으로 돌아갑니다 :)"
        },
        "keyboard":
        {
          "type" : "buttons",
          "buttons":["청원고", "청원여고", "청원중", "개발자", "버전정보"]
        }
      }';
    }
?>
