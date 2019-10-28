<?php

include("../database/db.php"); //db관리파일

  function egg($content, $rand){
    switch ($content) {
      case strpos($content, "안녕")!==false || strpos($content, "하이") !==false:
        $return = easter_count("안녕");
        if($return == 1){
          echo <<< EOD
          {
            "message":
            {
              "text" : "하이여~ \\n우와 처음발견하셨네요! ㅇ.ㅇ \\n축하해요~"
            }
          }
EOD;
        }else{
          echo <<< EOD
          {
            "message":
            {
              "text" : "하이여~ \\n$return 번째로 찾으셨습니다~"
            }
          }
EOD;
        }
      break;

      case strpos($content, "청원생활알리미.kr")!==false || strpos($content, "cw.ms214.kr")!==false:
        $return = easter_count("청원생활알리미.kr");
        if($return == 1){
          echo <<< EOD
          {
            "message":
            {
              "text" : "이욜~ 어케 알았대? (최고)(최고)\\n너가 처음으로 찾았어 축하해!\\n$content 로 들어가면 학급 시간표 등록할 수 있어. 꼭 등록하고 청원생활알리미 많은 이용 부탁해~"
            }
          }
EOD;
        }else{
          echo <<< EOD
          {
            "message":
            {
              "text" : "$content 로 들어가면 학급 시간표 등록할 수 있어. 꼭 등록하고 청원생활알리미 많은 이용 부탁해~"
            }
          }
EOD;
        }
        // code...
      break;

      case strpos($content, "건의") !== false:
        echo <<< EOD
        {
          "message":
          {
            "text" : "건의사항은 ms214@ms214.kr 로 보내주시거나 상담원과 채팅을 통해 보내실 수 있습니다."
          }
        }
EOD;
      break;

      case "김청원":
      $return = easter_count("김청원");
      if($return == 1){
        echo <<< EOD
        {
          "message":
          {
            "text" : "너가 처음찾았어! 우리 웹사이트를 유심히 잘 봤구나~ 축하행(최고)(최고)"
          }
        }
EOD;
      }else{
        echo <<< EOD
        {
          "message":
          {
            "text" : "앗! 이미 누군가가 찾았어~ 앞으로도 웹사이트에 이스터에그 많이 숨겨놓을게 ㅎ"
          }
        }
EOD;
      }
      break;

      case "김민수":
      $return = easter_count("김민수");
      if($return == 1){
        echo <<< EOD
        {
          "message":
          {
            "text" : "이걸 찾았다고? 정말 난 믿을 수가 없다.. 사실 거기에 더 있어! 너만 주는 힌트 (소곤)"
          }
        }
EOD;
      }else{
        echo <<< EOD
        {
          "message":
          {
            "text" : "앗! 이미 누군가가 찾았어~ 근데 웹에 더 있으니까 더 늦기 전에 찾아봐!"
          }
        }
EOD;
      }
      break;

      default:
      echo <<< EOD
      {
        "message":
        {
          "text" : "자유 채팅을 이용해 주셔서 감사합니다. 자유 채팅을 입력하다 보면 이스터에그가 있을 수 있어요 :) \\n\\n우리 홈페이지 있다는거 알아?\\n*탈출시 '메인으로' 입력* \\n"
        }
      }
EOD;
        break;
    }
  }
?>
