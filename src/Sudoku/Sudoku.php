<?php

declare(strict_types=1);

namespace Sudoku;

final class Sudoku {

    private $cells;

    private $solved;

    private $solver;

    public function __construct(array $cells) {
        $this->cells  = $cells;
        $this->solved = false;
        $this->solver = new Solver();
    }

    public function solve(){
        $this->solved = $this->solver->solve($this->cells);
    }

    public function isSolved(): bool {
        return $this->solved;
    }

    public function getCells(): array {
        return $this->cells;
    }
}
