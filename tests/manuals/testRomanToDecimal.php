<?php
$path = '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'libs';
require_once($path . DIRECTORY_SEPARATOR . 'Roman.php');
$romanNumbers = [
    'I',
    'II',
    'III',
    'IV',
    'V',
    'VI',
    'VII',
    'VIII',
    'IX',
    'X',
    'XI',
    'XII',
    'XIII',
    'XIV',
    'XV',
    'XVI',
    'XVII',
    'XVIII',
    'XIX',
    'XX',
    'XXI',
    'XXII',
    'XXIII',
    'XXIV',
    'XXV',
    'XXVI',
    'XXVII',
    'XXVIII',
    'XXIX',
    'XXX',
    'XXXI',
    'XXXII',
    'XXXIII',
    'XXXIV',
    'XXXV',
    'XXXVI',
    'XXXVII',
    'XXXVIII',
    'XXXIX',
    'XL',
    'XLI',
    'XLII',
    'XLIII',
    'XLIV',
    'XLV',
    'XLVI',
    'XLVII',
    'XLVIII',
    'XLIX',
    'L'
];

$conversor = new Roman("I");
foreach ($romanNumbers as $romanNumber) {
    $conversor->setNumber($romanNumber);
    echo "$romanNumber: {$conversor->toDecimal()}" . "\n";
}