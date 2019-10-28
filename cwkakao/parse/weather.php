<?php
$date = date("Ymd", time());
$clock = date("Hi");
$ch = curl_init();
$url = 'http://newsky2.kma.go.kr/service/SecndSrtpdFrcstInfoService2/ForecastSpaceData'; /*URL*/
$queryParams = '?' . urlencode('ServiceKey') . '=rjcGO4DFxpsop1EGyV579MBlyj%2BB%2FnaCznbYTLlv4dPVqm0%2B5TnqbgvuArTktq42NNolxVqh7V7miF7Q3nlpOg%3D%3D'; /*Service Key*/
$queryParams .= '&' . urlencode('base_date') . '=' . urlencode($date);
$queryParams .= '&' . urlencode('base_time') . '=' . urlencode($clock);
$queryParams .= '&' . urlencode('nx') . '=' . urlencode('61'); /*예보지점의 X 좌표값*/
$queryParams .= '&' . urlencode('ny') . '=' . urlencode('129'); /*예보지점의 Y 좌표값*/
$queryParams .= '&' . urlencode('numOfRows') . '=' . urlencode('10'); /*한 페이지 결과 수*/
$queryParams .= '&' . urlencode('pageNo') . '=' . urlencode('1'); /*페이지 번호*/
$queryParams .= '&' . urlencode('_type') . '=' . urlencode('xml'); /*xml(기본값), json*/

curl_setopt($ch, CURLOPT_URL, $url . $queryParams);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
$response = curl_exec($ch);//출력값
curl_close($ch);
$xml = simplexml_load_string($response);

$length = count($xml->body->items->item);
$items = $xml->body->items;

$skystatus = $xml->body->items->item[5]->fcstValue;
$rain = $xml->body->items->item[1]->fcstValue;//강수 형태
$rainabout = $xml->body->items->item[2]->fcstValue;//6시간 강수량
//var_dump($response);
switch($skystatus){
  case 1:
    $skystatus = "맑음";
    break;
  case 3:
    $skystatus = "구름 많음";
    break;
  case 4:
    $skystatus = "흐림";
    break;
  default:
    $skystatus = "잘못된 값";
    break;
}
switch($rain){
  case 0:
    $rain = "없음";
    break;
  case 1:
    $rain = "비";
    break;
  case 2:
    $rain = "진눈개비";
    break;
  case 3:
    $rain = "눈";
    break;
  case 4:
    $rain = "소나기";
    break;
  default:
    $rain = "잘못된 값";
    break;
}
echo "현재 날씨: $rain <br>하늘상태: $skystatus <br>6시간 강수량: $rainabout"."mm";
?>
