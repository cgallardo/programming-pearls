<?php

echo "Running...";

$numbers = array_fill(0, 10000000, 0);
$inputFile = new SplFileObject('input.txt', 'r');

while (!$inputFile->eof()) {
    $key = (int) $inputFile->fgets();
    $numbers[$key] = 1;
}

unset($inputFile);

$outputFile = new SplFileObject('output.txt', 'w');
foreach ($numbers as $key => $value) {
    if (1 === $value) {
        $outputFile->fwrite(strval($key) . PHP_EOL);
    }
}

unset($outputFile);

echo "\nFinished";


