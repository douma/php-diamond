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

    public function output(string $letter) : string
    {
        $letters = $this->listOfLetters($letter);
        $numberOfLetters = count($letters);
        $output = "";
        foreach($letters as $index=>$letter) {
            $output .= $this->outputLetter($index, $letter, $numberOfLetters);
        }
        $reversed = $letters;
        $reversed = array_reverse($reversed,true);
        unset($reversed[count($reversed) -1]);
        foreach($reversed as $index=>$letter) {
            $output .= $this->outputLetter($index, $letter, $numberOfLetters);
        }
        return $output;
    }

    private function outputLetter(int $index, string $letter, int $numberOfLetters) : string
    {
        $numberOfMiddleDots = $this->numberOfMiddleDots($index, $numberOfLetters);
        $numberOfOutsideDots = $this->numberOfOutsideDots($index, $numberOfLetters);

        $output = "";
        for($x = 0;$x<$numberOfOutsideDots;$x++) {
            $output .= "·";
        }
        $output .= $letter;
        if($numberOfMiddleDots > 0) {
            for($x = 0;$x<$numberOfMiddleDots;$x++) {
                $output .= "·";
            }
            $output .= $letter;
        }
        for($x = 0;$x<$numberOfOutsideDots;$x++) {
            $output .= "·";
        }
        $output .= PHP_EOL;
        return $output;
    }
}
