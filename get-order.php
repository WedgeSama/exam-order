#!/usr/bin/env php
<?php
/*
 * This file is part of the exam-order package.
 *
 * (c) Benjamin Georgeault
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

if (3 !== count($argv)) {
    echo 'This script need only 2 arguments:';
    echo "\n";
    echo 'Usage: php create-order.php [numberOfGroups] [seed]';
    echo "\n";

    exit;
}

$numberOfGroups = $argv[1];
$seed = (int) hexdec($argv[2]);

mt_srand($seed);

$groups = [];

for ($i = 0; $i < $numberOfGroups; $i++) {
    $groups[] = rand();
}

asort($groups);

echo 'Groups order:';
echo "\n";

foreach (array_keys($groups) as $order) {
    echo 'Group n°' . ($order + 1) . "\n";
}

echo "\n";
