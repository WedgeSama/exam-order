#!/usr/bin/env php
<?php
/*
 * This file is part of the exam-order package.
 *
 * (c) Benjamin Georgeault <https://www.pressop.eu>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * @return string
 * @throws Exception
 */
function generateNumber()
{
    return bin2hex(random_bytes(10));
}

/**
 * @param callable $callable
 * @param int $tryNumber
 * @param array $arguments
 * @return mixed
 * @throws RuntimeException
 */
function tryFunc(callable $callable, int $tryNumber = 10, array $arguments = [])
{
    try {
        return call_user_func_array($callable, $arguments);
    } catch (\Exception $e) {
        if (0 >= $tryNumber) {
            throw new RuntimeException('Cannot run function.');
        }

        return tryFunc($callable, --$tryNumber, $arguments);
    }
}

try {
    echo sprintf('Random seed generated: %s', tryFunc('generateNumber'));
} catch (RuntimeException $e) {
    echo 'Cannot generate number';
}

echo "\n";
