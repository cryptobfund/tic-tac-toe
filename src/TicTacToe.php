<?php

namespace Tic\Tac\Toe;

use Tic\Tac\Toe\strategies\Easy;
use Tic\Tac\Toe\strategies\Normal;

class TicTacToe
{
    // BEGIN (write your solution here)
    private $strategy;
    private array $table;

    public function __construct($strategyName = null)
    {
        $mapping = [
            'easy' => fn() => new Easy(),
            'normal' => fn() => new Normal()
        ];
        if (!isset($strategyName)) {
            $strategyName = 'easy';
        }
        $this->strategy = $mapping[$strategyName]();

        $table = [];
        for ($i = 0; $i < 3; $i++) {
            for ($k = 0; $k < 3; $k++) {
                $table[$i][$k] = null;
            }
        }
        $this->table = $table;
    }

    public function go($row = null, $col = null)
    {
        if (isset($row) && isset($col)) {
            $this->table[$row - 1][$col - 1] = 1;
        } else {
            $aiStep = $this->strategy->go($this->table);
            $row = $aiStep['row'];
            $col = $aiStep['col'];
            $this->table[$row][$col] = -1;
        }
        return $this->checkWinner();
    }

    private function checkWinner()
    {
        $data = $this->table;
        $sumDiag1 = 0;
        $sumDiag2 = 0;
        for ($i = 0; $i <= 2; $i++) {
            if (abs(array_sum($data[$i])) === 3) {
                return true;
            }
            if (abs(array_sum(array_column($data, $i))) === 3) {
                return true;
            }
            $sumDiag1 += $data[$i][$i];
            $sumDiag2 += $data[2 - $i][$i];
        }
        if ((abs($sumDiag1) === 3) || (abs($sumDiag2) === 3)) {
            return true;
        }
        //$diag = $table[0][0] + $table[1][1]+ $table[2][2]+
        return false;
    }
    // END
}
