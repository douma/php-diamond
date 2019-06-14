<?php

namespace Diamond;

class Command
{
    private $diamond;

    public function __construct(Diamond $diamond)
    {
        $this->diamond = $diamond;
    }

    public function run()
    {
        if(!isset($_SERVER['argv'][1])) {
            echo "Please provide a letter" . PHP_EOL;
            exit;
        }

        print $this->diamond->output($_SERVER['argv'][1]);
    }
}
