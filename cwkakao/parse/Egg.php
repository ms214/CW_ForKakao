<?php
  function egg($content, $rand){
    /*if(strpos($content, "안녕")!==false){
      if($rand == "1"){
        echo <<< EOD
        {
          "message":
          {
            "text" : "? 누군데 인사하시죠? (흥칫뿡)"
          }
        }
EOD;
      }
      else if($rand == "2"){
        echo <<< EOD
        {
          "message":
          {
            "text" : "만나서 반가워요 :) 우리 친하게 지내요 ㅎ"
          }
        }
EOD;
      }
      else{
        echo <<< EOD
        {
          "message":
          {
            "text" : "누군데 인사하시죠? 인사만 잘 받겠습니다. 친해지긴 싫네요 ㅋㅋ (농담 ㅎ)"
          }
        }
EOD;
      }//내부 if문 끝
    }
    else{*/
      echo <<< EOD
      {
        "message":
        {
          "text" : "자유 채팅을 이용해 주셔서 감사합니다. 자유 채팅을 입력하다 보면 이스터에그가 있을 수 있어요 :) \\n\\n*탈출시 <메인으로>입력* \\n"
        }
      }
EOD;
    //}
  }
?>
