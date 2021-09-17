<?php
require_once('./Hashtable.php');

$text = file_get_contents('c:/tmp/test.txt');
$wordList = [];
$i = 0;
$mbLength = 2;
while (true){
    $word = mb_substr($text, $i, $mbLength);
    if(empty($word)){
        break;
    }
    $wordList[] = $word;
    $i += $mbLength;
}

$hashtable = new Hashtable(11111111);
foreach ($wordList as $word){
    $hashtable->set($word, uniqid());
}

$value = $hashtable->get($wordList[5]);

$res = $hashtable->getStorageArray();