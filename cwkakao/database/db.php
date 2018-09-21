<?php
$ip = "localhost";
$name = "cwweb";//cwweb : 오픈베타 / cheongwon : 정식서비스
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
        $i=1;
      }
    return $i;// $i==0일때 데이터 있음/$i==1일때 데이터 없음
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

  function timetable($school, $grade, $class ,$day){
    $query = "SELECT * FROM timetable";
    $conn = $GLOBALS['connect'];
    $result = mysqli_query($conn, $query);
    $temp = "없음";
    $return = "";
    while($row = mysqli_fetch_array($result)){
      if($school==$row['school'] && $grade==$row['grade'] && $class==$row['class'] && $day==$row['day']){
        $temp = $row['timetable'];
      }
    }
    if(empty($return)){
      $return = "본인 학급의 시간표가 등록되어있지 않습니다. 다음 링크를 통해 등록해 주시기 바랍니다. \nhttps://goo.gl/forms/Gtj9VzjOsYuIK11u2";
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
