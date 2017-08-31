<?php

declare(strict_types=1);

namespace Sudoku;

use League\CLImate\CLImate;

final class Sudoku {

    const MAX_TRIES = 10;

    private $cells;

    private $climate;

    public function __construct(array $cells) {
        $this->cells  = $cells;
        $this->climate = new CLImate();
    }

    public function solve() : bool {
        $tries = 0;
        do{
            $this->reduceValues();
            $tries++;
        } while($tries < static::MAX_TRIES && false === $this->isSolved());

        return $this->isSolved();
    }

    private function reduceValues() {
        for($line=1; $line<=9; $line++){
            for($column=1; $column<=9; $column++){
                if(count($this->cells[$line][$column]->getRange()) === 1){
                    $this->eliminateValue($this->cells[$line][$column]);
                }
            }
        }
    }

    private function eliminateValue(Cell $cell) {
        for($i=1; $i<=9; $i++) {
            if($cell->getLine() === $i && $cell->getColumn() === $i) {
                continue;
            }
            $this->cells[$i][$cell->getColumn()]->removeValue($cell->getValue());
            $this->checkCellSolved($this->cells[$i][$cell->getColumn()]);
            $this->cells[$cell->getLine()][$i]->removeValue($cell->getValue());
            $this->checkCellSolved($this->cells[$cell->getLine()][$i]);
        }
    }

    private function checkCellSolved(Cell $cell) {
        if (count($cell->getRange()) === 1) {
            $range = $cell->getRange();
            reset($range);
            $cell->setValue(current($range));
        }
    }

    public function getCells(): array {
        return $this->cells;
    }

    public function isSolved() : bool {
        for($line=1; $line<=9; $line++){
            for($column=1; $column<=9; $column++){
                if(count($this->cells[$line][$column]->getRange()) !== 1){
                    return false;
                }
            }
        }

        return true;
    }
}
