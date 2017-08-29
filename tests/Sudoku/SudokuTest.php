<?php

declare(strict_types=1);

namespace Sudoku;

use League\CLImate\CLImate;
use PHPUnit\Framework\TestCase;

class SudokuTest extends TestCase {

    public function testSudoku(){

        $sudoku = new Sudoku();

        $cells = $sudoku->getCells();

        $this->assertArrayHasKey('foo', $cells);

        $data = [];
        for($l=1; $l<=9; $l++){
            for($c=1; $c<=9; $c++){
                $data[$l][$c] = $l.$c;
            }
        }

        $climate = new CLImate();
        $climate->table($data);

        $this->assertTrue(true);

    }
}
