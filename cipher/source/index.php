<?php
include 'flag.php';
$part1 = "WebTF{";
$part2 = "s0m3b0dy_";
$part3 = "w1ll_b3_4bl3_t0";
$part4 = "_0v3rc0m3_";
$part5 = "4ny_3ncryp7";
$part6 = "10n_73chn1qu3";
$part7 = "_y0u_us3}";

function xor_string($string, $key){
    for($i = 0; $i < strlen($string); $i++)
        $string[$i] = ($string[$i] ^ $key[$i % strlen($key)]);
    return $string;
}
try{
$cipher = "WebTF{}";
$ascii = isset($_GET['ascii']) == iconv('UTF-8','ASCII',$cipher);
if($ascii==1)
    echo $part1;
$hex = isset($_GET['hex']) == bin2hex($cipher);
if($hex==1)
    echo $part2;
$rot13 = isset($_GET['rot13']) == str_rot13($cipher);
if($rot13==1)
    echo $part3;
$base64 = isset($_GET['base64']) == base64_encode($cipher);
if($base64==1)
    echo $part4;
$md5 = isset($_GET['md5']) == md5($cipher);
if($md5==1)
    echo $part5;
$sha1 = isset($_GET['sha1']) == sha1($cipher);
if($sha1==1)
    echo $part6;
$xor = isset($_GET['xor']) == xor_string($cipher,"c1ph3r");
if($xor==1)
    echo $part7;
}
catch(Exception $e){echo $e;}
?>
