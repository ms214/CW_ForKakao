<?php
  $data = json_decode(file_get_contents('php://input'), true);
  $content = $data["content"];
  $user_key = $data["user_key"];
  //$content = $_GET['content'];
  //$user_key = $_GET['user'];

  include("./database/db.php"); //db관리파일
  include("./parse/meal2.php");//중식파싱파일
  include("./parse/meal3.php");//석식파싱파일
  include('./parse/hschedule.php');//남고학사일정
  include('./parse/ghschedule.php');//여고학사일정
  include('./parse/mschedule.php');//중교학사일정
  include('./parse/Egg.php');
  include('./parse/bus.php');//버스도착정보

  $return = firstdb($user_key);
  $school="";
  ckhistory($user_key);//히스토리에 user_key인 정보가 있나?
  if($return == 0){
    $school = selectSchool($user_key);
  }

  if($content == "시작하기"){
    $return = firstdb($user_key);
    if($return == 0){
      //아이디 존재 유무에 따라 실행
      echo <<< EOD
      {
        "message":
        {
          "text" : "청원 생활알리미 봇을 시작합니다.\\n2019.05.15공지사항\\n이스터에그는 웹에서 찾아보세요!"
        },
        "keyboard":
        {
          "type" : "buttons",
          "buttons": ["급식식단", "$school", "버스도착정보", "마이페이지", "Copyright", "버전정보", "공지사항", "자유 채팅"]
        }
      }
EOD;
      }else if($return==1){
        $result=insertuserkey($user_key);
        uphistory($user_key, "초기학교");
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
      }//시작하기 끝
    }
else if(strpos($content, "학교") && selecthistory($user_key)=="초기학교"){
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
uphistory($user_key, "초기 학년");
}else if(strpos($content, "학년") && selecthistory($user_key)=="초기 학년"){
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
uphistory($user_key, "초기반");
}else if(strpos($content, "반") && selecthistory($user_key) == "초기반"){
  switch ($content){
    case "1반":
      insertClass($user_key, "1반");
      break;
    case "2반":
      insertClass($user_key, "2반");
      break;
    case "3반":
      insertClass($user_key, "3반");
      break;
    case "4반":
      insertClass($user_key, "4반");
      break;
    case "5반":
      insertClass($user_key, "5반");
      break;
    case "6반":
      insertClass($user_key, "6반");
      break;
    case "7반":
      insertClass($user_key, "7반");
      break;
    case "8반":
      insertClass($user_key, "8반");
      break;
    case "9반":
      insertClass($user_key, "9반");
      break;
    case "10반":
      insertClass($user_key, "10반");
      break;
    case "11반":
      insertClass($user_key, "11반");
      break;
    case "12반":
      insertClass($user_key, "12반");
      break;
    case "13반":
      insertClass($user_key, "13반");
      break;
    case "14반":
      insertClass($user_key, "14반");
      break;
    case "15반":
      insertClass($user_key, "15반");
      break;
    case "16반":
      insertClass($user_key, "16반");
      break;
  }
  $school = selectSchool($user_key);
      echo <<< EOD
      {
        "message":
        {
          "text" : "회원정보를 모두 입력하였습니다. 메인으로 돌아갑니다."
        },
        "keyboard":
        {
          "type" : "buttons",
          "buttons": ["급식식단", "$school", "버스도착정보", "마이페이지", "Copyright", "버전정보", "공지사항", "자유 채팅"]
        }
      }
EOD;
  } //모든 회원정보 입력 끝
  else if($content == "청원고"){
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
    }//각 학교별 메뉴
    else if($content == "Copyright"){
        echo <<< EOD
        {
          "message":
          {
            "text" : "Copyright 2017-2019. 김민수 \\nAll Rights Reserved."
          },
          "keyboard":
          {
            "type" : "buttons",
            "buttons": ["급식식단", "$school", "버스도착정보", "마이페이지", "Copyright", "버전정보", "공지사항", "자유 채팅"]
          }
        }
EOD;
    }//Copyright 끝
      else if(strpos($content, "메인으로")!==false || $content == "수정취소하기" || $content == "아니오"){
        echo <<< EOD
        {
          "message":
          {
            "text" : "메인으로 돌아갑니다."
          },
          "keyboard":
          {
            "type" : "buttons",
            "buttons": ["급식식단", "$school", "버스도착정보", "마이페이지", "Copyright", "버전정보", "공지사항", "자유 채팅"]
          }
        }
EOD;
    }//메인으로 끝
    else if(strpos($content, "급식")!==false){
      echo '
      {
        "message":
        {
          "text" : "언제 식단을 원하세요?"
        },
        "keyboard":
        {
          "type" : "buttons",
          "buttons":["오늘 중식", "오늘 석식", "내일 중식", "내일 석식", "모레 중식", "모레 석식", "메인으로"]
        }
      }';
    }//급식식단 끝
    else if(strpos($content, "오늘 중식")!==false|| strpos($content, "오늘 점심")!==false){
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
            "buttons": ["급식식단", "$school", "버스도착정보", "마이페이지", "Copyright", "버전정보", "공지사항", "자유 채팅"]
          }
        }
EOD;
    }//오늘 중식 끝
    else if(strpos($content, "오늘 석식")!==false || strpos($content, "오늘 저녁")!==false){
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
            "buttons": ["급식식단", "$school", "버스도착정보", "마이페이지", "Copyright", "버전정보", "공지사항", "자유 채팅"]
          }
        }
EOD;
    }//오늘 석식 끝
    else if($content == "내일 중식" || $content == "내일 점심"){
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
            "buttons": ["급식식단", "$school", "버스도착정보", "마이페이지", "Copyright", "버전정보", "공지사항", "자유 채팅"]
          }
        }
EOD;
    }//내일 중식 끝
    else if($content == "내일 석식" || $content == "내일 저녁"){
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
            "buttons": ["급식식단", "$school", "버스도착정보", "마이페이지", "Copyright", "버전정보", "공지사항", "자유 채팅"]
          }
        }
EOD;
    }//내일 석식 끝
    else if($content == "모레 중식" || $content == "모레 점심"){
      $meal = lfmeal(2);
      echo <<< EOD
      {
        "message":
        {
          "text" : "$meal[0] \\n$meal[1]"
        },
        "keyboard":
        {
          "type" : "buttons",
          "buttons": ["급식식단", "$school", "버스도착정보", "마이페이지", "Copyright", "버전정보", "공지사항", "자유 채팅"]
        }
      }
EOD;
    }//모레 중식 끝
    else if($content == "모레 석식" || $content == "모레 저녁"){
      $meal = dfmeal(2);
      echo <<< EOD
      {
        "message":
        {
          "text" : "$meal[0] \\n$meal[1]"
        },
        "keyboard":
        {
          "type" : "buttons",
          "buttons": ["급식식단", "$school", "버스도착정보", "마이페이지", "Copyright", "버전정보", "공지사항", "자유 채팅"]
        }
      }
EOD;
    }//모레 석식 끝
    else if($content == "남고 학사일정"){
      uphistory($user_key, $content);//명령어history저장
echo <<< EOD
      {
        "message":
        {
          "text" : "몇월의 학사일정이 필요합니까? \\n(ex. 9월)"
        }
      }
EOD;
    }//남고 학사일정 끝
    else if($content == "여고 학사일정"){
      uphistory($user_key, $content);//명령어history저장
      echo <<< EOD
            {
              "message":
              {
                "text" : "몇월의 학사일정이 필요합니까? \\n(ex. 9월)"
              }
            }
EOD;
    }//여고 학사일정 끝
    else if($content == "중교 학사일정"){
      uphistory($user_key, $content);
      echo <<< EOD
            {
              "message":
              {
                "text" : "몇월의 학사일정이 필요합니까? \\n(ex. 9월)"
              }
            }
EOD;
    }//중교 학사일정 끝
    else if($content == "남고 등교시간"){
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
    }//남고 등교시간 끝
    else if($content == "여고 등교시간"){
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
    }//여고 등교시간 끝
    else if($content == "중교 등교시간"){
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
    }//중교 등교시간 끝
    else if($content == "버전정보"){
      echo <<< EOD
      {
        "message":
        {
          "text" : "현재 버전 : 2.6.1 \\n 청원 생활알리미는 청원학생들과 함께 만들어집니다! \\n 건의사항은 ms214@ms214.kr 이나 1:1 상담기능을 통해 알려주세요!\\n\\n*이번버전 업데이트 내역*\\n -버스도착정보메뉴 추가 수정\\n -버스 선호정류장 정보 지우기 기능 추가"
        },
        "keyboard":
        {
          "type" : "buttons",
          "buttons": ["급식식단", "$school", "버스도착정보", "마이페이지", "Copyright", "버전정보", "공지사항", "자유 채팅"]
        }
      }
EOD;
    }//버전정보 끝
    else if($content == "남고 학급별 시간표"){
      //학년반을 남고 학년-반 형식으로 입력해 주세요 (ex. 남고 2-1 혹은 남고 2-11) 형식이 맞지 않을 시 답변이 나오지 않습니다.
      echo '
      {
        "message":
        {
          "text" : "데이터베이스에 있는 학생정보를 토대로 시간표를 가져옵니다. 무슨요일의 시간표를 가져올까요?"
        },
        "keyboard":
        {
          "type" : "buttons",
          "buttons":["월요일", "화요일", "수요일", "목요일", "금요일", "메인으로"]
        }
      }';
    }//남고 학급별 시간표
    else if($content == "여고 학급별 시간표"){
      echo '
      {
        "message":
        {
          "text" : "데이터베이스에 있는 학생정보를 토대로 시간표를 가져옵니다. 무슨요일의 시간표를 가져올까요?"
        },
        "keyboard":
        {
          "type" : "buttons",
          "buttons":["월요일", "화요일", "수요일", "목요일", "금요일", "메인으로"]
        }
      }';
    }//여고 학급별 시간표
    else if($content == "중교 학급별 시간표"){
      echo '
      {
        "message":
        {
          "text" : "데이터베이스에 있는 학생정보를 토대로 시간표를 가져옵니다. 무슨요일의 시간표를 가져올까요?"
        },
        "keyboard":
        {
          "type" : "buttons",
          "buttons":["월요일", "화요일", "수요일", "목요일", "금요일", "메인으로"]
        }
      }';
    }//중교 학급별 시간표
    else if($content=="월요일"||$content=="화요일"||$content=="수요일"||$content=="목요일"||$content=="금요일"){
      $school = selectSchool($user_key);
      if($school == "청원고"){
          $grade = selectGrade($user_key);
          $class = selectClass($user_key);
          $result = timetable($school, $grade, $class, $content);

          echo <<< EOD
          {
            "message":
            {
              "text": "$school $grade $class $content 시간표입니다.\\n$result"
            },
            "keyboard":
            {
              "type" : "buttons",
              "buttons":["남고 학사일정", "남고 학급별 시간표", "남고 등교시간", "메인으로"]
            }
          }
EOD;
        }
        else if($school == "청원여고"){
          $grade = selectGrade($user_key);
          $class = selectClass($user_key);
          $result = timetable($school, $grade, $class, $content);

          echo <<< EOD
          {
            "message":
            {
              "text": "$school $grade $class $content 시간표입니다.\\n$result"
            },
            "keyboard":
            {
              "type" : "buttons",
              "buttons":["여고 학사일정", "여고 학급별 시간표", "여고 등교시간", "메인으로"]
            }
          }
EOD;
        }
        else if($school == "청원중"){
          $grade = selectGrade($user_key);
          $class = selectClass($user_key);
          $result = timetable($school, $grade, $class, $content);

          echo <<< EOD
          {
            "message":
            {
              "text": "$school $grade $class $content 시간표입니다.\\n$result"
            },
            "keyboard":
            {
              "type" : "buttons",
              "buttons":["중교 학사일정", "중교 학급별 시간표", "중교 등교시간", "메인으로"]
            }
          }
EOD;
        }
      }//요일분류
      else if(strpos($content, "월") !== false){
        $month = mb_substr($content, 0,3);
        $gethistory = selecthistory($user_key);
        $result;
        $sc;
        if($gethistory == "남고 학사일정"){
            $result = hschedule($month);
        }else if($gethistory == "여고 학사일정"){
          $result = ghschedule($month);
        }else if($gethistory == "중교 학사일정"){
          $result = mschedule($month);
        }

        if($school == "청원고"){
          $sc = "남고";
        }else if($school == "청원여고"){
          $sc = "여고";
        }else if($school == "청원중"){
          $sc = "중교";
        }
        $out = $result[0].$result[1].$result[2].$result[3].$result[4].$result[5].$result[6].$result[7].$result[8].$result[9].$result[10].$result[11].$result[12].$result[13].$result[14].$result[15].$result[16].$result[17].$result[18].$result[19].$result[20].$result[21].$result[22].$result[23].$result[24].$result[25].$result[26].$result[27].$result[28].$result[29].$result[30]."오류 신고바랍니다.";
        echo <<< EOD
        {
          "message":
          {
            "text" : "$month 학사일정표입니다.\\n$out"

          },
          "keyboard":
          {
            "type" : "buttons",
            "buttons":["$sc 학사일정", "$sc 학급별 시간표", "$sc 등교시간", "메인으로"]
          }
        }
EOD;
    }//학사일정 끝
  else if($content == "마이페이지"){
    echo <<< EOD
    {
      "message":
      {
        "text" : "회원님 반갑습니다. \\n무엇을 선택하시겠습니까?"
      },
      "keyboard":
      {
        "type" : "buttons",
        "buttons": ["전체내역 조회", "수정하기", "내 정보 지우기", "선호버스정류장 정보 지우기", "메인으로"]
      }
    }
EOD;
  }//마이페이지 끝
  else if($content == "전체내역 조회"){
    $school = selectSchool($user_key);
    $grade = selectGrade($user_key);
    $class = selectClass($user_key);
    echo <<< EOD
    {
      "message":
      {
        "text" : "전체회원내역입니다. \\n학교: $school \\n학년: $grade\\n반: $class"
      },
      "keyboard":
      {
        "type" : "buttons",
        "buttons": ["전체내역 조회", "수정하기", "내 정보 지우기", "메인으로"]
      }
    }
EOD;
  }//전체내역조회 끝
  else if($content == "수정하기"){
    echo <<< EOD
    {
      "message":
      {
        "text" : "회원님의 정보를 수정합니다. 어느것을 수정하시겠습니까?"
      },
      "keyboard":
      {
        "type" : "buttons",
        "buttons": ["학교 수정", "학년 수정", "반 수정", "수정취소하기"]
      }
    }
EOD;
  }//수정하기 끝
  else if($content == "학교 수정"){
    uphistory($user_key, $content);
    echo <<< EOD
    {
      "message":
      {
        "text" : "현재 학교는 $school 입니다. 어디로 변경하시겠습니까?"
      },
      "keyboard":
      {
        "type" : "buttons",
        "buttons": ["청원고등학교", "청원여자고등학교", "청원중학교", "메인으로"]
      }
    }
EOD;
  }//학교수정하기
  else if(selecthistory($user_key) == "학교 수정"){
    $schooltemp = selectSchool($user_key);
    if($content == "청원고등학교"){
      insertSchool($user_key, "청원고");
    }else if($content == "청원여자고등학교"){
      insertSchool($user_key, "청원여고");
    }else if($content == "청원중학교"){
      insertSchool($user_key, "청원중");
    }
    $school = selectSchool($user_key);
    echo <<< EOD
    {
      "message":
      {
        "text" : "소속학교를 '$schooltemp'에서 '$school'(으)로 수정완료하였습니다."
      },
      "keyboard":
      {
        "type" : "buttons",
        "buttons": ["전체내역 조회", "수정하기", "내 정보 지우기", "메인으로"]
      }
    }
EOD;
  }//수정완료 보내기
  else if($content == "학년 수정"){
    uphistory($user_key, $content);
    $grade = selectGrade($user_key);
    echo <<< EOD
    {
      "message":
      {
        "text" : "현재 $grade 입니다. 몇학년으로 변경하시겠습니까?"
      },
      "keyboard":
      {
        "type" : "buttons",
        "buttons": ["1학년", "2학년", "3학년", "메인으로"]
      }
    }
EOD;
  }//학년 수정 끝
  else if(strpos($content, "학년") && selecthistory($user_key)=="학년 수정"){
    $gradetemp = selectGrade($user_key);
    insertGrade($user_key, $content);
    $grade = selectGrade($user_key);
    echo <<< EOD
    {
      "message":
      {
        "text" : "소속학년을 '$gradetemp'에서 '$grade'(으)로 변경하였습니다."
      },
      "keyboard":
      {
        "type" : "buttons",
        "buttons" : ["전체내역 조회", "수정하기", "내 정보 지우기", "메인으로"]
      }
    }
EOD;
  }//학년수정완료
  else if($content == "반 수정"){
    uphistory($user_key, $content);
    $class = selectClass($user_key);
    echo <<< EOD
    {
      "message":
      {
        "text" : "현재 $class 입니다. 몇반으로 변경하시겠습니까?"
      },
      "keyboard":
      {
        "type" : "buttons",
        "buttons": ["1반", "2반", "3반", "4반", "5반", "6반", "7반", "8반", "9반", "10반", "11반", "12반", "13반", "14반", "15반", "16반", "메인으로"]
      }
    }
EOD;
  }//반 수정 끝
  else if(strpos($content, "반") && selecthistory($user_key) == "반 수정"){
    $classtemp = selectClass($user_key);
    insertClass($user_key ,$content);
    $class = selectClass($user_key);
    echo <<< EOD
    {
      "message":
      {
        "text": "소속반을 '$classtemp'에서 '$class'(으)로 변경하였습니다."
      },
      "keyboard":
      {
        "type" : "buttons",
        "buttons" : ["전체내역 조회", "수정하기", "내 정보 지우기", "메인으로"]
      }
    }
EOD;
  }//반 수정 완료
  else if($content == "내 정보 지우기"){
    echo <<< EOD
    {
      "message":
      {
        "text" : "내 정보를 지우시겠습니까?"
      },
      "keyboard":
      {
        "type" : "buttons",
        "buttons": ["예", "아니오"]
      }
    }
EOD;
  }//내 정보 지우기 끝
  else if($content == "예"){
    dropUser($user_key);
    echo <<< EOD
    {
      "message":
      {
        "text" : "정보를 지웠습니다. 청원 생활알리미를 이용해 주셔서 감사합니다. \\n아래 버튼을 누르시면 초기 등록을 시작합니다."
      },
      "keyboard":
      {
        "type" : "buttons",
        "buttons":["시작하기"]
      }
    }
EOD;
  }//정보지우기 -> 예 끝
  else if($content == "자유 채팅"){
    uphistory($user_key, $content);
    echo<<<EOD
    {
      "message":
      {
        "text" : "자유 채팅입니다. 여러번 메뉴를 거치지 않고 바로 명령어를 실행시킬 수 있습니다. (ex. '오늘 중식'입력 시 오늘 점심메뉴 출력) \\n*탈출 시 <메인으로> 혹은 명령어 실행(ex. 오늘 중식)으로 탈출할 수 있습니다."
      }
    }
EOD;
  }
  else if($content == "공지사항"){
    echo<<<EOD
    {
      "message":
      {
        "text" : "*공지사항* \\n이스터에그는 웹에서 찾아보세요!\\n-2019.07.01-",
        "message_button":
        {
          "label": "웹페이지로 가보기",
          "url": "http://cw.ms214.kr/"
        }
      },
      "keyboard":
      {
        "type" : "buttons",
        "buttons": ["급식식단", "$school", "버스도착정보","마이페이지", "Copyright", "버전정보", "공지사항", "자유 채팅"]
      }
    }
EOD;
  }
  else if($content == "버스도착정보"){
    $return = ckuserbus($user_key);
    if($return == "0"){
      //bus db에 회원정보 없음
      uphistory($user_key, "bus db추가");
      echo <<< EOD
      {
        "message":
        {
          "text" : "회원님의 선호버스정류장 정보가 없습니다. 정보 등록을 시작합니다.(이 과정은 초기에만 실행됩니다.) \\n정문쪽과 후문쪽과 보람아파트쪽 정류장 중 선택하세요"
        },
        "keyboard":
        {
          "type" : "buttons",
          "buttons": ["정문쪽", "후문쪽", "보람아파트쪽"]
        }
      }
EOD;
    }else{
      $station = selectbus($user_key);
      $busname=array();
      $nextbus1=array();
      $nextbus2=array();
      $busname = showbusname($station);
      $nextbus1 = showbusnext1($station);
      $nextbus2 = showbusnext2($station);
      $stationname = showstationname($station);
      $name = $stationname[0];
      $where = $stationname[1];
      $length = count($busname);
      $show="";
      uphistory($user_key, "bus 정류장");
      //bus db에 회원정보 있음
      for($i=0; $i<$length; $i++){
        $show .=$busname[$i]."\\n ".$nextbus1[$i]."\\n ".$nextbus2[$i]."\\n\\n";
      }
      echo <<< EOD
      {
      "message":
      {
        "text": "회원님이 선택한 위치($name, $where 방면)에 대한 모든 버스 정보입니다. \\n\\n$show \\n정보삭제는 마이페이지에서 삭제하실 수 있습니다. 수정은 추후 추가될 예정입니다."
      },
      "keyboard":
      {
        "type" : "buttons",
        "buttons": ["청원고등학교_노원08_상계주공8,9단지", "청원고등학교_노원08_상계주공12단지1202동방면", "청원고등학교_1137,1143_보람아파트1단지방면", "청원고등학교_1137,1143_상계주공12단지1202동방면", "청원고등학교후문_노원02,11_상계주공13단지방면", "청원고등학교후문_노원02,05,11_상원초등학교방면", "상계주공13단지_노원02,11_보람아파트정문방면", "상게주공13단지_노원02,05,11_청원고등학교후문방면", "메인으로"]
      }
    }
EOD;

    }
  }
  else if($content == "청원고등학교_노원08_상계주공8,9단지" && selecthistory($user_key) == "bus 정류장"){
    $station = "11537";
    $busname = array();
    $nextbus1=array();
    $nextbus2=array();
    $busname = showbusname($station);
    $nextbus1 = showbusnext1($station);
    $nextbus2 = showbusnext2($station);
    $stationname = showstationname($station);
    $name = $stationname[0];
    $where = $stationname[1];
    $length = count($busname);
    $show="";
    uphistory($user_key, "bus 정류장");
    for($i=0; $i<$length; $i++){
      $show .=$busname[$i]."\\n ".$nextbus1[$i]."\\n ".$nextbus2[$i]."\\n\\n";
    }
    echo <<< EOD
    {
    "message":
    {
      "text": "회원님이 선택한 위치($name, $where 방면)에 대한 모든 버스 정보입니다. \\n\\n$show"
    },
    "keyboard":
    {
      "type" : "buttons",
      "buttons": ["청원고등학교_노원08_상계주공8,9단지", "청원고등학교_노원08_상계주공12단지1202동방면", "청원고등학교_1137,1143_보람아파트1단지방면", "청원고등학교_1137,1143_상계주공12단지1202동방면", "청원고등학교후문_노원02,11_상계주공13단지방면", "청원고등학교후문_노원02,05,11_상원초등학교방면", "상계주공13단지_노원02,11_보람아파트정문방면", "상게주공13단지_노원02,05,11_청원고등학교후문방면", "메인으로"]
    }
  }
EOD;
  }
  else if($content == "청원고등학교_노원08_상계주공12단지1202동방면" && selecthistory($user_key) == "bus 정류장"){
    $station = "11847";
    $busname = array();
    $nextbus1=array();
    $nextbus2=array();
    $busname = showbusname($station);
    $nextbus1 = showbusnext1($station);
    $nextbus2 = showbusnext2($station);
    $stationname = showstationname($station);
    $name = $stationname[0];
    $where = $stationname[1];
    $length = count($busname);
    $show="";
    uphistory($user_key, "bus 정류장");
    for($i=0; $i<$length; $i++){
      $show .=$busname[$i]."\\n ".$nextbus1[$i]."\\n ".$nextbus2[$i]."\\n\\n";
    }
    echo <<< EOD
    {
    "message":
    {
      "text": "회원님이 선택한 위치($name, $where 방면)에 대한 모든 버스 정보입니다. \\n\\n$show"
    },
    "keyboard":
    {
      "type" : "buttons",
      "buttons": ["청원고등학교_노원08_상계주공8,9단지", "청원고등학교_노원08_상계주공12단지1202동방면", "청원고등학교_1137,1143_보람아파트1단지방면", "청원고등학교_1137,1143_상계주공12단지1202동방면", "청원고등학교후문_노원02,11_상계주공13단지방면", "청원고등학교후문_노원02,05,11_상원초등학교방면", "상계주공13단지_노원02,11_보람아파트정문방면", "상게주공13단지_노원02,05,11_청원고등학교후문방면", "메인으로"]
    }
  }
EOD;
  }
  else if($content == "청원고등학교_1137,1143_보람아파트1단지방면" && selecthistory($user_key) == "bus 정류장"){
    $station = "11190";
    $busname = array();
    $nextbus1=array();
    $nextbus2=array();
    $busname = showbusname($station);
    $nextbus1 = showbusnext1($station);
    $nextbus2 = showbusnext2($station);
    $stationname = showstationname($station);
    $name = $stationname[0];
    $where = $stationname[1];
    $length = count($busname);
    $show="";
    uphistory($user_key, "bus 정류장");
    for($i=0; $i<$length; $i++){
      $show .=$busname[$i]."\\n ".$nextbus1[$i]."\\n ".$nextbus2[$i]."\\n\\n";
    }
    echo <<< EOD
    {
    "message":
    {
      "text": "회원님이 선택한 위치($name, $where 방면)에 대한 모든 버스 정보입니다. \\n\\n$show"
    },
    "keyboard":
    {
      "type" : "buttons",
      "buttons": ["청원고등학교_노원08_상계주공8,9단지", "청원고등학교_노원08_상계주공12단지1202동방면", "청원고등학교_1137,1143_보람아파트1단지방면", "청원고등학교_1137,1143_상계주공12단지1202동방면", "청원고등학교후문_노원02,11_상계주공13단지방면", "청원고등학교후문_노원02,05,11_상원초등학교방면", "상계주공13단지_노원02,11_보람아파트정문방면", "상게주공13단지_노원02,05,11_청원고등학교후문방면", "메인으로"]
    }
  }
EOD;
  }
  else if($content == "청원고등학교_1137,1143_상계주공12단지1202동방면" && selecthistory($user_key) == "bus 정류장"){
    $station = "11276";
    $busname = array();
    $nextbus1=array();
    $nextbus2=array();
    $busname = showbusname($station);
    $nextbus1 = showbusnext1($station);
    $nextbus2 = showbusnext2($station);
    $stationname = showstationname($station);
    $name = $stationname[0];
    $where = $stationname[1];
    $length = count($busname);
    $show="";
    uphistory($user_key, "bus 정류장");
    for($i=0; $i<$length; $i++){
      $show .=$busname[$i]."\\n ".$nextbus1[$i]."\\n ".$nextbus2[$i]."\\n\\n";
    }
    echo <<< EOD
    {
    "message":
    {
      "text": "회원님이 선택한 위치($name, $where 방면)에 대한 모든 버스 정보입니다. \\n\\n$show"
    },
    "keyboard":
    {
      "type" : "buttons",
      "buttons": ["청원고등학교_노원08_상계주공8,9단지", "청원고등학교_노원08_상계주공12단지1202동방면", "청원고등학교_1137,1143_보람아파트1단지방면", "청원고등학교_1137,1143_상계주공12단지1202동방면", "청원고등학교후문_노원02,11_상계주공13단지방면", "청원고등학교후문_노원02,05,11_상원초등학교방면", "상계주공13단지_노원02,11_보람아파트정문방면", "상게주공13단지_노원02,05,11_청원고등학교후문방면", "메인으로"]
    }
  }
EOD;
  }
  else if($content == "청원고등학교후문_노원02,11_상계주공13단지방면" && selecthistory($user_key) == "bus 정류장"){
    $station = "11553";
    $busname = array();
    $nextbus1=array();
    $nextbus2=array();
    $busname = showbusname($station);
    $nextbus1 = showbusnext1($station);
    $nextbus2 = showbusnext2($station);
    $stationname = showstationname($station);
    $name = $stationname[0];
    $where = $stationname[1];
    $length = count($busname);
    $show="";
    uphistory($user_key, "bus 정류장");
    for($i=0; $i<$length; $i++){
      $show .=$busname[$i]."\\n ".$nextbus1[$i]."\\n ".$nextbus2[$i]."\\n\\n";
    }
    echo <<< EOD
    {
    "message":
    {
      "text": "회원님이 선택한 위치($name, $where 방면)에 대한 모든 버스 정보입니다. \\n\\n$show"
    },
    "keyboard":
    {
      "type" : "buttons",
      "buttons": ["청원고등학교_노원08_상계주공8,9단지", "청원고등학교_노원08_상계주공12단지1202동방면", "청원고등학교_1137,1143_보람아파트1단지방면", "청원고등학교_1137,1143_상계주공12단지1202동방면", "청원고등학교후문_노원02,11_상계주공13단지방면", "청원고등학교후문_노원02,05,11_상원초등학교방면", "상계주공13단지_노원02,11_보람아파트정문방면", "상게주공13단지_노원02,05,11_청원고등학교후문방면", "메인으로"]
    }
  }
EOD;
  }
  else if($content == "청원고등학교후문_노원02,05,11_상원초등학교방면" && selecthistory($user_key) == "bus 정류장"){
    $station = "11868";
    $busname = array();
    $nextbus1=array();
    $nextbus2=array();
    $busname = showbusname($station);
    $nextbus1 = showbusnext1($station);
    $nextbus2 = showbusnext2($station);
    $stationname = showstationname($station);
    $name = $stationname[0];
    $where = $stationname[1];
    $length = count($busname);
    $show="";
    uphistory($user_key, "bus 정류장");
    for($i=0; $i<$length; $i++){
      $show .=$busname[$i]."\\n ".$nextbus1[$i]."\\n ".$nextbus2[$i]."\\n\\n";
    }
    echo <<< EOD
    {
    "message":
    {
      "text": "회원님이 선택한 위치($name, $where 방면)에 대한 모든 버스 정보입니다. \\n\\n$show"
    },
    "keyboard":
    {
      "type" : "buttons",
      "buttons": ["청원고등학교_노원08_상계주공8,9단지", "청원고등학교_노원08_상계주공12단지1202동방면", "청원고등학교_1137,1143_보람아파트1단지방면", "청원고등학교_1137,1143_상계주공12단지1202동방면", "청원고등학교후문_노원02,11_상계주공13단지방면", "청원고등학교후문_노원02,05,11_상원초등학교방면", "상계주공13단지_노원02,11_보람아파트정문방면", "상게주공13단지_노원02,05,11_청원고등학교후문방면", "메인으로"]
    }
  }
EOD;
  }
  else if($content == "상계주공13단지_노원02,11_보람아파트정문방면" && selecthistory($user_key) == "bus 정류장"){
    $station = "11560";
    $busname = array();
    $nextbus1=array();
    $nextbus2=array();
    $busname = showbusname($station);
    $nextbus1 = showbusnext1($station);
    $nextbus2 = showbusnext2($station);
    $stationname = showstationname($station);
    $name = $stationname[0];
    $where = $stationname[1];
    $length = count($busname);
    $show="";
    uphistory($user_key, "bus 정류장");
    for($i=0; $i<$length; $i++){
      $show .=$busname[$i]."\\n ".$nextbus1[$i]."\\n ".$nextbus2[$i]."\\n\\n";
    }
    echo <<< EOD
    {
    "message":
    {
      "text": "회원님이 선택한 위치($name, $where 방면)에 대한 모든 버스 정보입니다. \\n\\n$show"
    },
    "keyboard":
    {
      "type" : "buttons",
      "buttons": ["청원고등학교_노원08_상계주공8,9단지", "청원고등학교_노원08_상계주공12단지1202동방면", "청원고등학교_1137,1143_보람아파트1단지방면", "청원고등학교_1137,1143_상계주공12단지1202동방면", "청원고등학교후문_노원02,11_상계주공13단지방면", "청원고등학교후문_노원02,05,11_상원초등학교방면", "상계주공13단지_노원02,11_보람아파트정문방면", "상게주공13단지_노원02,05,11_청원고등학교후문방면", "메인으로"]
    }
  }
EOD;
  }
  else if($content == "상게주공13단지_노원02,05,11_청원고등학교후문방면" && selecthistory($user_key) == "bus 정류장"){
    $station = "11819";
    $busname = array();
    $nextbus1=array();
    $nextbus2=array();
    $busname = showbusname($station);
    $nextbus1 = showbusnext1($station);
    $nextbus2 = showbusnext2($station);
    $stationname = showstationname($station);
    $name = $stationname[0];
    $where = $stationname[1];
    $length = count($busname);
    $show="";
    uphistory($user_key, "bus 정류장");
    for($i=0; $i<$length; $i++){
      $show .=$busname[$i]."\\n ".$nextbus1[$i]."\\n ".$nextbus2[$i]."\\n\\n";
    }
    echo <<< EOD
    {
    "message":
    {
      "text": "회원님이 선택한 위치($name, $where 방면)에 대한 모든 버스 정보입니다. \\n\\n$show"
    },
    "keyboard":
    {
      "type" : "buttons",
      "buttons": ["청원고등학교_노원08_상계주공8,9단지", "청원고등학교_노원08_상계주공12단지1202동방면", "청원고등학교_1137,1143_보람아파트1단지방면", "청원고등학교_1137,1143_상계주공12단지1202동방면", "청원고등학교후문_노원02,11_상계주공13단지방면", "청원고등학교후문_노원02,05,11_상원초등학교방면", "상계주공13단지_노원02,11_보람아파트정문방면", "상게주공13단지_노원02,05,11_청원고등학교후문방면", "메인으로"]
    }
  }
EOD;
  }
  else if($content == "정문쪽" && selecthistory($user_key) == "bus db추가"){
    echo <<< EOD
    {
      "message":
      {
        "text" : "정문쪽 다음 이미지를 보고 정류소 번호를 선택하세요",
        "photo": {
          "url": "http://cheongwon.dothome.co.kr/1_kakao/img/front.jpg",
          "width": 640,
          "height": 480
        }
      },
      "keyboard":
      {
        "type": "buttons",
        "buttons": ["1번", "2번", "3번", "4번"]
      }
    }
EOD;
  uphistory($user_key, "버스정문");
  }
  else if($content == "후문쪽" && selecthistory($user_key) == "bus db추가"){
    echo <<< EOD
    {
      "message":
      {
        "text" : "후문쪽 다음 이미지를 보고 정류소 번호를 선택하세요",
        "photo":{
          "url": "http://cheongwon.dothome.co.kr/1_kakao/img/back.jpg",
          "width": 640,
          "height": 480
        }
      },
      "keyboard":
      {
        "type": "buttons",
        "buttons": ["1번", "2번"]
      }
    }
EOD;
  uphistory($user_key, "버스후문");
  }
  else if($content == "보람아파트쪽" && selecthistory($user_key) == "bus db추가"){
    echo <<< EOD
    {
      "message":
      {
        "text" : "보람아파트쪽 다음 이미지를 보고 정류소 번호를 선택하세요",
        "photo":{
          "url": "http://cheongwon.dothome.co.kr/1_kakao/img/boram.jpg",
          "width": 640,
          "height": 480
        }
      },
      "keyboard":
      {
        "type": "buttons",
        "buttons": ["1번", "2번"]
      }
    }
EOD;
  uphistory($user_key, "버스보람아파트");
  }
  else if($content == "1번" || $content == "2번" || $content == "3번" || $content == "4번"){
    switch (selecthistory($user_key)) {
      case '버스정문':
        if($content == "1번"){
          upuserbus($user_key, "11537");
        }else if($content == "2번"){
          upuserbus($user_key, "11847");
        }else if($content == "3번"){
          upuserbus($user_key, "11190");
        }else if($content == "4번"){
          upuserbus($user_key, "11276");
        }
        break;

        case '버스후문':
          if($content == "1번"){
            upuserbus($user_key, "11553");
          }else if($content == "2번"){
            upuserbus($user_key, "11868");
          }
          break;

        case '버스보람아파트':
          if($content == "1번"){
            upuserbus($user_key, "11560");
          }else if($content == "2번"){
            upuserbus($user_key, "11819");
          }
          break;

      default:
        echo <<< EOD
        {
          "message":
          {
            "text": "잘못된 정보입니다."
          },
          "keyboard":
          {
              "type": "buttons",
              "buttons": ["급식식단", "$school", "버스도착정보", "마이페이지", "Copyright", "버전정보", "공지사항", "자유 채팅"]
          }
        }
EOD;
        break;
    }
    echo <<< EOD
    {
      "message":
      {
        "text": "앞으로 해당정류장에 대한 정보가 제공될 예정입니다. 감사합니다. 메인메뉴로 갑니다."
      },
      "keyboard":
      {
        "type": "buttons",
        "buttons": ["급식식단", "$school", "버스도착정보", "마이페이지", "Copyright", "버전정보", "공지사항", "자유 채팅"]
      }
    }
EOD;
  }
  else if($content == "선호버스정류장 정보 지우기"){
    delbus($user_key);
    echo <<< EOD
    {
      "message":
      {
        "text": "선호버스정류장 정보를 삭제했습니다. 감사합니다."
      },
      "keyboard":
      {
        "type": "buttons",
        "buttons": ["급식식단", "$school", "버스도착정보", "마이페이지", "Copyright", "버전정보", "공지사항", "자유 채팅"]
      }
    }
EOD;

  }
  else{
    if(selecthistory($user_key)!=="자유 채팅"){
      echo <<< EOD
      {
        "message":
        {
          "text" : "잘못 입력하셨거나 아직 준비중인 기능입니다. 형식에 맞게 입력하였는지 다시한번 확인해 주시기 바랍니다.:)"
        },
        "keyboard":
        {
          "type" : "buttons",
          "buttons": ["급식식단", "$school", "버스도착정보", "마이페이지", "Copyright", "버전정보", "공지사항", "자유 채팅"]
        }
      }
EOD;
    }else if(selecthistory($user_key)=="자유 채팅"){
        $rand = mt_rand(1,5);
        $st_rand = (string)$rand;
        egg($content, $st_rand);
    }
  }//라스트 else 문 끝
?>
