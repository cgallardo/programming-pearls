<?php

$input = [31, -41, 59, 26, -53, 58, 97, -93, -23, 84];

function scanning(array $input)
{
    $maxSoFar = 0;
    $maxEndingHere = 0;

    for ($i = 0; $i < sizeof($input); $i++) {
        $maxEndingHere = max($maxEndingHere + $input[$i], 0);
        $maxSoFar = max($maxSoFar, $maxEndingHere);
    }

    return $maxSoFar;
}

function divideAndConquer(array $input, $l, $u)
{
    if ($l > $u) {
        return 0;
    }

    if ($l == $u) {
        return max(0, $input[$l]);
    }

    $m = ($l + $u) / 2;

    $lmax = 0;
    $sum = 0;

    for ($i = $m; $i >= $l; $i--) {
        $sum += $input[$i];
        $lmax = max($lmax, $sum);
    }

    $rmax = 0;
    $sum = 0;

    for ($i = $m; $i < $u; $i++) {
        $sum += $input[$i];
        $rmax = max($rmax, $sum);
    }

    return max($lmax + $rmax, divideAndConquer($input, $l, $m), divideAndConquer($input, $m + 1, $u));
}

function nCubed(array $input)
{
    $maxSoFar = 0;

    for ($i = 0; $i < sizeof($input); $i++) {
        for ($j = $i; $j < sizeof($input); $j++) {
            $sum = 0;
            for ($k = $i; $k < $j; $k++) {
                $sum += $input[$k];
            }

            $maxSoFar = max($maxSoFar, $sum);
        }
    }

    return $maxSoFar;
}

function quadratic(array $input)
{
    $maxSoFar = 0;

    for ($i = 0; $i < sizeof($input); $i++) {
        $sum = 0;
        for ($j = $i; $j < sizeof($input); $j++) {
            $sum += $input[$j];
            $maxSoFar = max($maxSoFar, $sum);
        }
    }

    return $maxSoFar;
}

echo scanning($input) . "\n";
echo divideAndConquer($input, 0, sizeof($input) - 1) . "\n";
echo nCubed($input) . "\n";
echo quadratic($input) . "\n";

