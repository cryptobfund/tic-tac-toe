<?php

namespace Tic\Tac\Toe\strategies;

class Easy
{
    // BEGIN (write your solution here)
    public function go($table)
    {
        for ($i = 0; $i < 3; $i++) {
            for ($k = 0; $k < 3; $k++) {
                if (!isset($table[$i][$k])) {
                    $aiStep = ['row' => $i, 'col' => $k];
                    return $aiStep;
                }
            }
        }
    }
    // END
}
