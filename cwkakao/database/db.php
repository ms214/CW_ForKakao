<?php
$ip = "localhost";
$name = "cwkakao";
$passwd = "";
$connect = mysqli_connect($ip, $name, $passwd, $name);

$q1 = "SET CHARSET UTF8";
mysqli_query($connect, $q1);

  function firstdb($userkey){
    $i=0;
    $query = "SELECT * FROM cheongwon where user_key = '$userkey'";
    $conn = $GLOBALS['connect'];
    $result = mysqli_query($GLOBALS['connect'], $query);
    $row =  mysqli_fetch_assoc($result);
    //$row = mysqli_fetch_array($result)
    if(!$row){
        $i=1;//데이터 없음
      }
    return $i;// $i==0일때 데이터 있음/$i==1일때 데이터 없음
  }

  function ckhistory($userkey){
    $query = "SELECT * FROM history where user_key = '$userkey'";
    $conn = $GLOBALS['connect'];
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    if(!$row){
      $query = "INSERT INTO history (user_key, history) VALUES ('$userkey', '')";
      $conn = $GLOBALS['connect'];
      $result = mysqli_query($conn, $query);
    }
  }

  function uphistory($userkey, $history){
    $query = "UPDATE history SET history = '$history' WHERE user_key = '$userkey'";
    $conn = $GLOBALS['connect'];
    $result = mysqli_query($conn, $query);
  }

  function selecthistory($userkey){
    $query = "SELECT history FROM history WHERE user_key = '$userkey'";
    $conn = $GLOBALS['connect'];
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result)){
        return $row['history'];
    }
  }

//user_key추가
  function insertuserkey($userkey){
    $query = "INSERT INTO cheongwon (user_key, school, grade, class) VALUES ('$userkey', 'null', 'null', 'null')";
    $conn = $GLOBALS['connect'];
    $result = mysqli_query($conn, $query);
  }
  function selectrecommender($userkey){
    $query = "SELECT * FROM recommender where user_key = '$userkey'";
    $conn = $GLOBALS['connect'];
    $result = mysqli_query($conn, $query);
    $row =  mysqli_fetch_assoc($result);
    if(!$row){
      return 0;
      //$userkey에 대한 내용이 없다.
    }else{
      return 1;
    }
  }
  function createrecommender($userkey){
    $query = "INSERT INTO recommender (user_key, recommender) VALUES ('$userkey', 'NULL')";
    $conn = $GLOBALS['connect'];
    $result = mysqli_query($conn, $query);
  }
  function recommender($userkey, $recommender){
    $query = "UPDATE recommender set recommender = '$recommender' WHERE user_key='$userkey'";
    $conn = $GLOBALS['connect'];
    $result = mysqli_query($conn, $query);
  }
//school, grade, class추가
  function insertSchool($userkey, $school){
    $query = "UPDATE cheongwon set school = '$school' WHERE user_key = '$userkey'";
    $conn = $GLOBALS['connect'];
    $result = mysqli_query($conn, $query);
  }
  function insertGrade($userkey, $Grade){
    $query = "UPDATE cheongwon set grade = '$Grade' WHERE user_key = '$userkey'";
    $conn = $GLOBALS['connect'];
    $result = mysqli_query($conn, $query);
  }
  function insertClass($userkey, $Class){
    $query = "UPDATE cheongwon set class = '$Class' WHERE user_key = '$userkey'";
    $conn = $GLOBALS['connect'];
    $result = mysqli_query($conn, $query);
  }
  //학교 선택
  function selectSchool($userkey){
    $query = "SELECT * FROM cheongwon";
    $conn = $GLOBALS['connect'];
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result)){
      if($userkey==$row['user_key']){
        return $row['school'];
      }
    }
  }

  //학년 선택
  function selectGrade($userkey){
    $query = "SELECT * FROM cheongwon";
    $conn = $GLOBALS['connect'];
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result)){
      if($userkey==$row['user_key']){
        return $row['grade'];
      }
    }
  }

//반 선택
  function selectClass($userkey){
    $query = "SELECT * FROM cheongwon";
    $conn = $GLOBALS['connect'];
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result)){
      if($userkey==$row['user_key']){
        return $row['class'];
      }
    }
  }

  function timetable($school, $grade, $class ,$day){
    $query = "SELECT * FROM timetable where school='$school' AND grade='$grade' AND class='$class' AND day='$day'";
    $conn = $GLOBALS['connect'];
    $result = mysqli_query($conn, $query);
    $return = "저장된 시간표가 없습니다. \\n시간표 등록은 cw.ms214.kr 에서 등록해주세요";
    while($row = mysqli_fetch_array($result)){
        $return = $row['timetable'];
    }
    return $return;
  }//시간표 데이터베이스 통해

  function easter_count($easter){
    $now = date("Y-m-d H:i:s");
    $query = "SELECT * FROM easter_egg where easter_cmd='$easter'";
    $conn = $GLOBALS['connect'];
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    if(!$row){
      $query1 = "INSERT INTO easter_egg (easter_cmd, count, time_log) values('$easter', 1, '$now')";
      $result1 = mysqli_query($conn, $query1);
      return 1;
    }else{
      $count;
      $query2 = "SELECT * FROM easter_egg where easter_cmd='$easter'";
      $result2 = mysqli_query($conn, $query2);
      while($row1 = mysqli_fetch_array($result2)){
          $count = $row1['count'];
      }
      $count=$count+1;
      $query = "UPDATE easter_egg set count='$count'where easter_cmd='$easter'";
      mysqli_query($conn, $query);
      $query = "UPDATE easter_egg set time_log='$now'where easter_cmd='$easter'";
      mysqli_query($conn, $query);
      return $count;
    }
  }

//bus데이터베이스에 정보 존재여부확인
  function ckuserbus($userkey){
    $query = "SELECT * FROM bus where user_key='$userkey'";
    $conn = $GLOBALS['connect'];
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if(!$row){
      //정보 없음
      $query = "INSERT into bus (user_key, station_code) VALUES ('$userkey', 'null')";
      $result = mysqli_query($conn, $query);
      return "0";
    }else{
      //정보 있음
      return "1";
    }
  }

  function upuserbus($userkey, $station){
    $query = "UPDATE bus set station_code='$station' WHERE user_key='$userkey'";
    $conn = $GLOBALS['connect'];
    $result = mysqli_query($conn, $query);
  }

  function selectbus($userkey){
    $query = "SELECT station_code FROM bus where user_key='$userkey'";
    $conn = $GLOBALS['connect'];
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result)){
      return $row['station_code'];
    }
  }

  function delbus($userkey){
    $query = "DELETE from bus where user_key='$userkey'";
    $conn = $GLOBALS['connect'];
    $result = mysqli_query($conn, $query);
  }

  function dropUser($userkey){
    $query = "DELETE FROM cheongwon WHERE user_key='".$userkey."'";
    $conn = $GLOBALS['connect'];
    $result = mysqli_query($conn, $query);
    $query = "DELETE FROM history WHERE user_key='".$userkey."'";
    $result = mysqli_query($conn, $query);
  }

  function close(){
    mysqli_close($GLOBALS['connect']);
  }
?>
