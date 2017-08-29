<?php

declare(strict_types=1);

namespace Sudoku;

final class Sudoku {

    private $cells;

    public function __construct() {
        $this->cells = ['foo' => 'bar'];
    }

    public function getCells(): array {
        return $this->cells;
    }
}