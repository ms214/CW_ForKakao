<?php
$ip = "localhost";
$name = "cheongwon";//cwweb : 오픈베타 / cheongwon : 정식서비스
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

  function insertuserkey($userkey){
    $query = "INSERT INTO cheongwon (user_key, school, grade, class) VALUES ('$userkey', '청원고', '1', '11')";
    $conn = $GLOBALS['connect'];
    $result = mysqli_query($conn, $query);
  }

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

  function selectname($userkey){
    $query = "SELECT * FROM cheongwon where user_key = '$userkey'";
    $conn = $GLOBALS['connect'];
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    return $row['name'];
  }
  function insertname($userkey, $name){
    $query = "UPDATE cheongwon set name='$name' WHERE user_key='$userkey'";
    $conn = $GLOBALS['connect'];
    $result = mysqli_query($conn, $query);
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

  function dropUser($userkey){
    $query = "DELETE FROM cheongwon WHERE user_key='".$userkey."'";
    $conn = $GLOBALS['connect'];
    $result = mysqli_query($conn, $query);
  }

  function close(){
    mysqli_close($GLOBALS['connect']);
  }
?>
