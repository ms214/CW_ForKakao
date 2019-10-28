<?
header('Content-type: application/json; charset=UTF-8');
include_once("Snoopy.class.php");
$URL = "http://comci.kr/st/index.php";
$snoopy = new Snoopy;
$snoopy->fetch($URL);

preg_match('/<!doctype html>(.*?)<\/html>/is', $snoopy->results, $html);
echo $html[0];
?>
