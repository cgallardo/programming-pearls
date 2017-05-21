<?php

function loadNumbers($inputFileName, array &$numbers)
{
    $inputFile = new SplFileObject($inputFileName, 'r');

    while (!$inputFile->eof()) {
        $key = (int) $inputFile->fgets();
        $numbers[$key] = 1;
    }

    unset($inputFile);
}

function writeNumbers($outputFileName, array $numbers)
{
    $outputFile = new SplFileObject($outputFileName, 'w');

    foreach ($numbers as $key => $value) {
        if (1 === $value) {
            $outputFile->fwrite(strval($key) . PHP_EOL);
        }
    }

    unset($outputFile);
}

$numbers = array_fill(0, 10000000, 0);
loadNumbers('input.txt', $numbers);
writeNumbers('output.txt', $numbers);
