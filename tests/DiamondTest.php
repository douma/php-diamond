<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Diamond\Diamond;

final class DiamondTest extends TestCase
{
    public function test_number_of_outside_dots(): void
    {
        $diamond = new Diamond;
        $this->assertEquals(4,$diamond->numberOfOutsideDots(0, 5));
        $this->assertEquals(3,$diamond->numberOfOutsideDots(1, 5));
        $this->assertEquals(2,$diamond->numberOfOutsideDots(2, 5));
        $this->assertEquals(1,$diamond->numberOfOutsideDots(3, 5));
        $this->assertEquals(0,$diamond->numberOfOutsideDots(4, 5));
    }

    public function test_number_of_total_chars(): void
    {
        $diamond = new Diamond;
        $this->assertEquals(9,$diamond->numberOfTotalChars(0, 5));
    }

    public function test_number_of_total_chars_invalid_index(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $diamond = new Diamond;
        $diamond->numberOfTotalChars(1, 5);
    }

    public function test_get_number_of_middle_dots(): void
    {
        $diamond = new Diamond;
        $this->assertEquals(0,$diamond->numberOfMiddleDots(0,5));
        $this->assertEquals(1,$diamond->numberOfMiddleDots(1,5));
        $this->assertEquals(3,$diamond->numberOfMiddleDots(2,5));
        $this->assertEquals(5,$diamond->numberOfMiddleDots(3,5));
        $this->assertEquals(7,$diamond->numberOfMiddleDots(4,5));
    }

    public function test_get_list_of_letters(): void
    {
        $diamond = new Diamond;
        $this->assertEquals(['A'],$diamond->listOfLetters('A'));
        $this->assertEquals(['A','B'],$diamond->listOfLetters('B'));
        $this->assertEquals(['A','B','C'],$diamond->listOfLetters('C'));
        $this->assertEquals(['A','B','C','D'],$diamond->listOfLetters('D'));
        $this->assertEquals(['A','B','C','D','E'],$diamond->listOfLetters('E'));
    }
}
