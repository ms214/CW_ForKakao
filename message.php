<?php
  $data = json_decode(file_get_contents('php://input'), true);
  $content = $data["content"];
  include("./parse/meal2.php");
  include("./parse/meal3.php");

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
        "buttons":["남고 급식식단", "남고 학사일정", "남고 등교시간", "뒤로가기"]
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
          "buttons":["여고 급식식단", "여고 학사일정", "여고 등교시간", "뒤로가기"]
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
          "buttons":["중교 급식식단", "중교 학사일정", "중교 등교시간", "뒤로가기"]
        }
      }';
    }else if($content == "개발자"){
      echo '
      {
        "message":
        {
          "text" : "본 카카오봇은 청원고 2-14 김민수가 제작하였습니다. \n문의사항이 있으시면 ms214@ms214.kr 로 문의 바랍니다:)"
        },
        "keyboard":
        {
          "type" : "buttons",
          "buttons":["청원고", "청원여고", "청원중", "개발자"]
        }
      }';
    }else if($content == "뒤로가기"){
      echo '
      {
        "message":
        {
          "text" : "메인으로 돌아갑니다!!"
        },
        "keyboard":
        {
          "type" : "buttons",
          "buttons":["청원고", "청원여고", "청원중", "개발자"]
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
          "buttons":["오늘 중식", "오늘 석식", "내일 중식", "내일 석식", "뒤로가기"]
        }
      }';
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
          "buttons":["오늘 중식", "내일 중식", "뒤로가기"]
        }
      }';
    }else if($content == "오늘 중식"){
      $meal = lfmeal(0);
echo <<< EOD
      {
        "message":
        {
          "text" : "$meal[0] 중식은 \\n$meal[1]"
        },
        "keyboard":
        {
          "type" : "buttons",
          "buttons":["청원고", "청원여고", "청원중", "개발자"]
        }
      }
EOD;
    }else if($content == "오늘 석식"){
      $meal = dfmeal(0);
echo <<< EOD
      {
        "message":
        {
          "text" : "$meal[0] 석식은 \\n$meal[1]"
        },
        "keyboard":
        {
          "type" : "buttons",
          "buttons":["청원고", "청원여고", "청원중", "개발자"]
        }
      }
EOD;
    }else if($content == "내일 중식"){
      $meal = lfmeal(1);
echo <<< EOD
      {
        "message":
        {
          "text" : "$meal[0] 중식은 \\n$meal[1]"
        },
        "keyboard":
        {
          "type" : "buttons",
          "buttons":["청원고", "청원여고", "청원중", "개발자"]
        }
      }
EOD;
    }else if($content == "내일 석식"){
      $meal = dfmeal(1);
echo <<< EOD
      {
        "message":
        {
          "text" : "$meal[0] 석식은 \\n$meal[1]"
        },
        "keyboard":
        {
          "type" : "buttons",
          "buttons":["청원고", "청원여고", "청원중", "개발자"]
        }
      }
EOD;
    }else if($content == "남고 학사일정"){
      echo'
      {
        "message":
        {
          "text" : "준비중인 기능입니다. 감사합니다 :)"
        },
        "keyboard":
        {
          "type" : "buttons",
          "buttons":["청원고", "청원여고", "청원중", "개발자"]
        }
      }';
    }else if($content == "여고 학사일정"){
      echo'
      {
        "message":
        {
          "text" : "준비중인 기능입니다. 감사합니다 :)"
        },
        "keyboard":
        {
          "type" : "buttons",
          "buttons":["청원고", "청원여고", "청원중", "개발자"]
        }
      }';
    }else if($content == "중교 학사일정"){
      echo '
      {
        "message":
        {
          "text" : "준비중인 기능입니다. 감사합니다 :)"
        },
        "keyboard":
        {
          "type" : "buttons",
          "buttons":["청원고", "청원여고", "청원중", "개발자"]
        }
      }';
    }else if($content == "남고 등교시간"){
      echo'
      {
        "message":
        {
          "text" : "준비중인 기능입니다. 감사합니다 :)"
        },
        "keyboard":
        {
          "type" : "buttons",
          "buttons":["청원고", "청원여고", "청원중", "개발자"]
        }
      }';
    }else if($content == "여고 등교시간"){
      echo'
      {
        "message":
        {
          "text" : "준비중인 기능입니다. 감사합니다 :)"
        },
        "keyboard":
        {
          "type" : "buttons",
          "buttons":["청원고", "청원여고", "청원중", "개발자"]
        }
      }';
    }else if($content == "중교 등교시간"){
      echo'
      {
        "message":
        {
          "text" : "준비중인 기능입니다. 감사합니다 :)"
        },
        "keyboard":
        {
          "type" : "buttons",
          "buttons":["청원고", "청원여고", "청원중", "개발자"]
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
          "buttons":["청원고", "청원여고", "청원중", "개발자"]
        }
      }';
    }
?>
