<?php
$ip = "localhost";
$name = "cwweb";//cwweb : 오픈베타 / cheongwon : 정식서비스
$passwd = "";
$connect = mysqli_connect($ip, $name, $passwd, $name);

$q1 = "set names utf8;";
mysqli_query($connect, $q1);

  function firstdb($userkey){
    $i=0;
    $query = "SELECT * FROM cheongwon where user_key = '$userkey'";
    $conn = $GLOBALS['connect'];
    $result = mysqli_query($conn, $query);
    $row =  mysqli_fetch_assoc($result);
    //$row = mysqli_fetch_array($result)
    if(!$row){
        $i=1;
      }
    return $i;// $i==0일때 데이터 있음/$i==1일때 데이터 없음
  }

  function insertuserkey($userkey){
    $query = "INSERT INTO cheongwon (user_key, school, grade, class) VALUES ('$userkey', '청원고', '2', '14')";
    $conn = $GLOBALS['connect'];
    $result = mysqli_query($conn, $query);
  }

  function insertSchool($userkey, $school){
    $query = "UPDATE cheongwon set school = $school WHERE user_key = $userkey";
    $conn = $GLOBALS['connect'];
    $result = mysqli_query($conn, $query);
  }
  function insertGrade($userkey, $Grade){
    $query = "UPDATE cheongwon set grade = $Grade WHERE user_key = $userkey";
    $conn = $GLOBALS['connect'];
    $result = mysqli_query($conn, $query);
  }
  function inserClass($userkey, $class){
    $query = "UPDATE cheongwon set class = $class WHERE user_key = $userkey";
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

  function close(){
    mysqli_close($GLOBALS['connect']);
  }
?>
