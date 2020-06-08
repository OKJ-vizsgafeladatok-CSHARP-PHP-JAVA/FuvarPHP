<?php

require 'Fuvar.php';
$behuzas='&nbsp&nbsp&nbsp&nbsp&nbsp';
function beolvas(){
    $tomb=array();
    try {
        $file= file_get_contents("fuvar.csv");
        $sorok= explode("\n", $file);
        for ($i = 0; $i < count($sorok); $i++) {
                if(strlen($sorok[$i])>3)
                {
                    $split= explode(";", $sorok[$i]);
                    $o=new Fuvar(
                            $split[0], 
                            $split[1], 
                            $split[2], 
                            $split[3], 
                            $split[4], 
                            $split[5], 
                        $split[6]);
                    $tomb[]=$o;
                }
        }
    } catch (Exception $exc) {
        die("Hiba a beolvasásnál. "+$exc);
    }
    array_shift($tomb);
    return $tomb;
}

$a=beolvas();
echo '3 .feladat: '.count($a).' fuvar<br>';
//4. feladat:
$fuv=0;
$dollar=0.0;

foreach ($a as $item) {
    if($item->getTaxiid()==6185){
        $fuv++;
        $dollar+= str_replace(",",".",$item->getViteldij());
    }
}
echo '4. feladat: '.$fuv.' fuvar alatt: '.number_format($dollar,2,",","").'$<br>';
echo '5. feladat: <br>';
$fizetesModok=array();
foreach ($a as $item) {
    $fizetesModok[]=$item->getFizetesmodja();
}
$fizetesModok= array_count_values($fizetesModok);
foreach ($fizetesModok as $key=>$value) {
    echo $behuzas.$key.': '.$value.' fuvar<br>';
}

$sum=array();
foreach ($a as $item) {
    $sum[]= str_replace(",",".",$item->getTavolsag())*1.6;
}
echo '6. feladat: '. number_format(array_sum($sum),2,",","").'km<br>';

//7. feladat: 
$leghAlany=null;
$legh=0;
foreach ($a as $item) {
    if($item->getIdotartam()>$legh){
        $leghAlany=$item;
        $legh=$item->getIdotartam();
    }
}
$tav= str_replace(",",".",$leghAlany->getTavolsag());
echo '7. feladat: Leghosszabb fuvar: <br>';
echo $behuzas.'Fuvar hossza: '.$leghAlany->getIdotartam().' másodperc<br>';
echo $behuzas.'Taxi azonosító: '.$leghAlany->getTaxiid().'<br>';
echo $behuzas.'Megtett távolság: '. number_format(($tav*1.6),2,",","").'<br>';//a feladatkiírásban nem szoroztak 1,6-al!
echo $behuzas.'Viteldíj: '.$leghAlany->getViteldij().'$<br>';
//8. feladat:
$fajlba="﻿taxi_id;indulas;idotartam;tavolsag;viteldij;borravalo;fizetes_modja\n";
foreach ($a as $item) {
    if($item->getIdotartam()>0&&$item->getViteldij()>0 && $item->getTavolsag()==0){
        $fajlba.=
                $item->getTaxiid().";".
                $item->getIndulas().";".
                $item->getIdotartam().";".
                $item->getTavolsag().";".
                $item->getViteldij().";".
                $item->getBorravalo().";".
                $item->getFizetesmodja();//itt a string magában foglalja a "\n"-t, így nem kell sort törni.
    }
}

$myFile= fopen("hibak.txt", "w");
fwrite($myFile, $fajlba);
echo '8. feladat: hibak.txt';

