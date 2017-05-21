<?php

function signWords(array $words)
{
    $result = [];

    foreach ($words as $word) {
        $sin = str_split($word);
        natsort($sin);
        $result[$word] = implode('', $sin);
    }

    return $result;
}

function sortWords(array $words)
{
    asort($words);

    return $words;
}

function squashWords(array $words)
{
    $result = [];
    foreach ($words as $key => $word) {
        $result[$word][] = $key;
    }

    return array_values($result);
}

function anagrams(array $words)
{
    return squashWords(sortWords(signWords($words)));
}

$words = [
    'pans',
    'pots',
    'opt',
    'snap',
    'stop',
    'tops',
];

$result = anagrams($words);
print_r($result);
