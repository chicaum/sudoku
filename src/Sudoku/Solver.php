<?php

declare(strict_types=1);

namespace Sudoku;

use League\CLImate\CLImate;

class Solver {

    private $climate;

    public function __construct() {
        $this->climate = new CLImate();
    }

    public function solve(array $cells) : bool{
        return false;
    }
}
