<?php  

if (isset($_POST['album'])){
    $album = $_POST['album'];
    $izvodac = $_POST['izvodac'];
    $godina = $_POST['godina'];
    $zanr = $_POST['zanr'];
    $prijedlog = $_POST['prijedlog'];
    $ocjena = $_POST['ocjena'];
    
    $ispis = '';
    $ispis .= "<Album>\n";
    $ispis .= "<ImeAlbuma>" . $album . "</ImeAlbuma>\n";
    $ispis .= "<Izvodac>" . $izvodac . "</Izvodac>\n";
    $ispis .= "<Godina>" . $godina . "</Godina>\n";
    $ispis .= "<Zanr>" . $zanr . "</Zanr>\n";
    $ispis .= "<Prijedlog>" . $prijedlog . "</Prijedlog>\n";
    $ispis .= "<Ocjena>" . $ocjena . "</Ocjena>\n";
    $ispis .= "</Album>\n";

    $filename = 'Albumi.xml';
    if(file_exists($filename)){
        $dok = file_get_contents($filename);
        $dok = str_replace("</Albumi>\n", '', $dok);
        file_put_contents($filename, $dok);
        file_put_contents($filename, $ispis, FILE_APPEND);
        file_put_contents($filename,"</Albumi>\n",FILE_APPEND);
    }else{
        $file = '';
        $file .= "<?xml version='1.0' encoding='UTF-8' standalone='no' ?>\n";
$file .= "<Albumi>\n";
    $file .= $ispis;
    $file .= "</Albumi>\n";
file_put_contents($filename, $file);
}
die('Uspješno generiran XML!');
}