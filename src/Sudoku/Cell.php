<?php

declare(strict_types=1);

namespace Sudoku;

class Cell {

    private $blocked;

    private $line;

    private $column;

    private $range;

    private $value;

    public function __construct(
        int $line,
        int $column,
        int $value = null
    ) {
        $this->line       = $line;
        $this->column     = $column;
        $this->value      = $value;
        $this->blocked    = 0 !== $value;
        $this->range = $value ? [$value => $value] :
            array_combine(
                range(1, 9),
                range(1, 9)
            );
    }

    public function getLine(): int {
        return $this->line;
    }

    public function getColumn(): int {
        return $this->column;
    }

    public function getValue(): int {
        return $this->value;
    }

    public function setValue(int $value) {
        $this->value = $value;
        $this->range = [$value => $value];
    }

    public function isBlocked(): bool {
        return $this->blocked;
    }

    public function getRange(): array {
        return $this->range;
    }

    public function removeValue($value) {
        if(count($this->range) === 1) {
            return;
        }
        unset($this->range[$value]);
    }

    public function __toString() {
       return $this->value > 0 ? (string) $this->value : '';
    }
}
