<?php

error_reporting(1);
function ConvertToUTF8($text){

    $encoding = mb_detect_encoding($text, mb_detect_order(), false);

    if($encoding == "UTF-8")
    {
        $text = mb_convert_encoding($text, 'UTF-8', 'UTF-8');
    }


    $out = iconv(mb_detect_encoding($text, mb_detect_order(), false), "UTF-8//IGNORE", $text);


    return $out;
}

if(isset($_GET['choice']) && isset($_GET['type'])) {
    $choix = $_GET['choice'];
    $type = $_GET['type'];

    $choix = strtoupper($choix);

    $param = "";

    if (isset($_GET['param']))
        $param = $_GET['param'];
    //$type = "VELIB";

    //echo $type." ".$choix." ".$param;
   // echo $param;
    if ($param != "")
        $command = 'python3 WebSemantics_JENA.py '.$type.' '.  $choix .' "'. $param.'"';
    else
        $command = 'python3 WebSemantics_JENA.py '.$type.' '.  $choix;
    //echo $command;
    exec($command,$output);
    //var_dump($output);

    $retour = array();
    for ($i = 0; $i < count($output);$i+=3) {
        $point = array();
        $string= $output[$i];
        //$enc = mb_detect_encoding($string, "UTF-8,ISO-8859-1");
        //$string = iconv($enc, "UTF-8", $string);
        //$string = iconv('UTF-8', "ISO-8859-1//IGNORE", $string);
        $string = iconv("ISO-8859-1","UTF-8",$string);
        $point["name"] = $string;
        $point["latitude"] = $output[$i+1];
        $point["longitude"] = $output[$i+2];
        //$i += +3;
        array_push($retour,$point);
    }
    //var_dump($retour);

    echo(json_encode($retour));
    die();

}
?>