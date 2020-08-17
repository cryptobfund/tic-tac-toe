<?php

namespace Tic\Tac\Toe\strategies;

class Normal
{
    // BEGIN (write your solution here)
    public function go($table)
    {
        for ($i = 2; $i >= 0; $i--) {
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
