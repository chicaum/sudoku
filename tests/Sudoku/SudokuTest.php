<?php

declare(strict_types=1);

namespace Sudoku;

use League\CLImate\CLImate;
use PHPUnit\Framework\TestCase;

class SudokuTest extends TestCase {

    /**
     * @dataProvider provideData
     * @param array $cells
     * @throws \PHPUnit\Framework\AssertionFailedError
     */
    public function testSudoku($cells){

        $sudoku = new Sudoku($cells);
        $sudoku->solve();

        $climate = new CLImate();
        $climate->table($sudoku->getCells());

        $this->assertTrue($sudoku->isSolved());
    }

    public function provideData(){
        $easyOneValues = [
          [9,0,4,0,7,0,6,2,0],
          [0,0,0,0,0,0,4,0,5],
          [0,0,3,0,4,1,0,8,9],
          [2,0,7,0,9,4,0,0,0],
          [1,0,0,3,0,7,0,0,2],
          [0,0,0,2,8,0,1,0,7],
          [7,1,0,4,3,0,5,0,0],
          [8,0,6,0,0,0,0,0,0],
          [0,5,9,0,6,0,8,0,3]
        ];

        $easyOneSolution = [
          [9,8,4,5,7,3,6,2,1],
          [6,7,1,8,2,9,4,3,5],
          [5,2,3,6,4,1,7,8,9],
          [2,6,7,1,9,4,3,5,8],
          [1,4,8,3,5,7,9,6,2],
          [3,9,5,2,8,6,1,4,7],
          [7,1,2,4,3,8,5,9,6],
          [8,3,6,9,1,5,2,7,4],
          [4,5,9,7,6,2,8,1,3]
        ];

        return [
            [
                'easy one' => $this->fillCells($easyOneValues)
            ]
        ];
    }

    public function fillCells($values){
        $cells = [];
        for($line=1; $line<=9; $line++){
            for($column=1; $column<=9; $column++){
                $cells[$line][$column] = new Cell(
                    $line,
                    $column,
                    $values[$line-1][$column-1]
                );
            }
        }

        return $cells;
    }
}
