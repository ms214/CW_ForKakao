<?php
  function showbusname($stationcode){
    $ch = curl_init();
    $url = 'http://ws.bus.go.kr/api/rest/stationinfo/getStationByUid'; /*URL*/
    $queryParams = '?' . urlencode('ServiceKey') . '=rjcGO4DFxpsop1EGyV579MBlyj%2BB%2FnaCznbYTLlv4dPVqm0%2B5TnqbgvuArTktq42NNolxVqh7V7miF7Q3nlpOg%3D%3D'; /*Service Key*/
    $queryParams .= '&' . urlencode('arsId') . '=' . urlencode($stationcode); /*정류소고유번호*/

    curl_setopt($ch, CURLOPT_URL, $url . $queryParams);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    $response = curl_exec($ch);
    curl_close($ch);
    $xml = simplexml_load_string($response);

    $length = count($xml->msgBody->itemList);
    $busname = array();
    for($i=0; $i<$length; $i++){
      $busname[$i] = $xml->msgBody->itemList[$i]->rtNm;
    }
    return $busname;
  }

  function showbusnext1($stationcode){
    $ch = curl_init();
    $url = 'http://ws.bus.go.kr/api/rest/stationinfo/getStationByUid'; /*URL*/
    $queryParams = '?' . urlencode('ServiceKey') . '=rjcGO4DFxpsop1EGyV579MBlyj%2BB%2FnaCznbYTLlv4dPVqm0%2B5TnqbgvuArTktq42NNolxVqh7V7miF7Q3nlpOg%3D%3D'; /*Service Key*/
    $queryParams .= '&' . urlencode('arsId') . '=' . urlencode($stationcode); /*정류소고유번호*/

    curl_setopt($ch, CURLOPT_URL, $url . $queryParams);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    $response = curl_exec($ch);
    curl_close($ch);
    $xml = simplexml_load_string($response);

    $length = count($xml->msgBody->itemList);

    $nextbus1 = array();
    for($i=0; $i<$length; $i++){
      $nextbus1[$i] = $xml->msgBody->itemList[$i]->arrmsgSec1;
    }
    return $nextbus1;
  }

  function showbusnext2($stationcode){
    $ch = curl_init();
    $url = 'http://ws.bus.go.kr/api/rest/stationinfo/getStationByUid'; /*URL*/
    $queryParams = '?' . urlencode('ServiceKey') . '=rjcGO4DFxpsop1EGyV579MBlyj%2BB%2FnaCznbYTLlv4dPVqm0%2B5TnqbgvuArTktq42NNolxVqh7V7miF7Q3nlpOg%3D%3D'; /*Service Key*/
    $queryParams .= '&' . urlencode('arsId') . '=' . urlencode($stationcode); /*정류소고유번호*/

    curl_setopt($ch, CURLOPT_URL, $url . $queryParams);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    $response = curl_exec($ch);
    curl_close($ch);
    $xml = simplexml_load_string($response);

    $length = count($xml->msgBody->itemList);

    $nextbus2 = array();
    for($i=0; $i<$length; $i++){
      $nextbus2[$i] = $xml->msgBody->itemList[$i]->arrmsgSec2;
    }
    return $nextbus2;
  }

  function showstationname($stationcode){
    $ch = curl_init();
    $url = 'http://ws.bus.go.kr/api/rest/stationinfo/getStationByUid'; /*URL*/
    $queryParams = '?' . urlencode('ServiceKey') . '=rjcGO4DFxpsop1EGyV579MBlyj%2BB%2FnaCznbYTLlv4dPVqm0%2B5TnqbgvuArTktq42NNolxVqh7V7miF7Q3nlpOg%3D%3D'; /*Service Key*/
    $queryParams .= '&' . urlencode('arsId') . '=' . urlencode($stationcode); /*정류소고유번호*/

    curl_setopt($ch, CURLOPT_URL, $url . $queryParams);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    $response = curl_exec($ch);
    curl_close($ch);
    $xml = simplexml_load_string($response);
    $stationname = array();
    $stationname[0] = $xml->msgBody->itemList[0]->stNm;
    $stationname[1] = $xml->msgBody->itemList[0]->nxtStn;

    return $stationname;
  }

?>
