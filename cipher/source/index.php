function xor($string, $key){
    for($i = 0; $i < strlen($string); $i++) 
        $string[$i] = ($string[$i] ^ $key[$i % strlen($key)]);
    return $string;
}
$success = 0;
$cipher = "WebTF{}";
$ascii = $_GET['ascii'] == iconv('UTF-8','ASCII',$cipher);
$hex = $_GET['hex'] == bin2hex($cipher);
$rot13 = $_GET['rot13'] == str_rot13($cipher);
$base64 = $_GET['base64'] == base64_encode($cipher);
$md5 = $_GET['md5'] == md5($cipher);
$sha1 = $_GET['sha1'] == sha1($cipher);
$xor = $_GET['xor'] == xor($cipher,$hex);
<?php

function xor_string($string, $key){
    for($i = 0; $i < strlen($string); $i++)
        $string[$i] = ($string[$i] ^ $key[$i % strlen($key)]);
    return $string;
}
try{
$success = 0;
$cipher = "WebTF{}";
$ascii = isset($_GET['ascii']) == iconv('UTF-8','ASCII',$cipher);
$hex = isset($_GET['hex']) == bin2hex($cipher);
$rot13 = isset($_GET['rot13']) == str_rot13($cipher);
$base64 = isset($_GET['base64']) == base64_encode($cipher);
$md5 = isset($_GET['md5']) == md5($cipher);
$sha1 = isset($_GET['sha1']) == sha1($cipher);
$xor = isset($_GET['xor']) == xor_string($cipher,"c1ph3r");
}
catch(Exception $e){echo $e;}
?>