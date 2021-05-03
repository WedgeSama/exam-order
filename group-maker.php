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
    echo 'Usage: php group-maker.php [perGroupNumber] [seed]';
    echo "\n";

    exit;
}

if (1 > $perGroupNumber = (int) $argv[1]) {
    throw new RuntimeException(sprintf(
        'Set more then 1 person per group.'
    ));
}

$seed = (int) hexdec($argv[2]);

mt_srand($seed);

if (!file_exists($file = __DIR__ . '/names.json')) {
    throw new RuntimeException(sprintf(
        'The file "%s" does not exist.',
        $file
    ));
}

if (false === $string = file_get_contents($file)) {
    throw new RuntimeException(sprintf(
        'Cannot read content from file "%s"',
        $file
    ));
}

$json = json_decode($string, true);

foreach ($json as $key => $name) {
    if (!is_string($name)) {
        throw new RuntimeException(sprintf(
            'The name given in file "%s" at position %d is not a string.',
            $file,
            $key
        ));
    }
}

$namesOrder = [];

for ($i = 0; $i < count($json); $i++) {
    $namesOrder[] = rand();
}

asort($namesOrder);


$groupCounter = 0;
foreach (array_keys($namesOrder) as $i => $order) {
    if (
        0 === $i % $perGroupNumber &&
        ($i !== count($namesOrder) - 1)
    ) {
        echo 'Group n°' . ++$groupCounter . ":\n";
    }

    echo $json[$order] . "\n";
}
