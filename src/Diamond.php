<?php

namespace Diamond;

class Diamond
{
    public function numberOfOutsideDots(int $index, int $numberOfLetters) : int
    {
        return $numberOfLetters - ($index + 1);
    }

    public function numberOfTotalChars(int $index, int $numberOfLetters) : int
    {
        if($index === 0) {
            $numberOfOutsideDots = $this->numberOfOutsideDots($index, $numberOfLetters);
            return $numberOfOutsideDots + $numberOfOutsideDots + 1;
        }
        throw new \InvalidArgumentException("Can only calculate for the first index (0)");
    }

    public function numberOfMiddleDots(int $index, int $numberOfLetters) : int
    {
        $totalChars = $this->numberOfTotalChars(0, $numberOfLetters);
        $numberOfOutSideDots = $this->numberOfOutsideDots($index, $numberOfLetters);
        $numberOfMiddleDots = $totalChars - 2 - ($numberOfOutSideDots * 2);
        return ($numberOfMiddleDots < 0) ? 0 : $numberOfMiddleDots;
    }

    public function listOfLetters(string $letter) : array
    {
        return range('A',$letter);
    }
}
