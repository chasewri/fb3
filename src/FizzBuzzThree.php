<?php

declare(strict_types=1);

final class FizzBuzzThree
{
    // int > 0
    private $start;
    // int >= $start
    private $stop;

    private $count = array('fizz' => 0, 'buzz' => 0, 'fizzbuzz' => 0, 'lucky' => 0, 'integer' => 0);

    public function __construct(int $start, int $stop)
    {
        $this->start = $start;
        $this->stop = $stop;
    }
    
    public function getSingleResult(int $num): string
    {
        if (preg_match("/3/", strval($num))) {
            $this->count['lucky'] += 1;
            return "lucky ";
        }

        $return_val = "";
        if ($num % 15 === 0) {
            $this->count['fizzbuzz'] += 1;
            $return_val .= "fizzbuzz ";
        } else if ($num % 3 === 0) {
            $this->count['fizz'] += 1;
            $return_val .= "fizz ";
        } else if ($num % 5 === 0) {
            $this->count['buzz'] += 1;
            $return_val .= "buzz ";
        } else {
            $this->count['integer'] += 1;
            $return_val .= strval($num) . " ";
        }

        return $return_val;
    }

    public function countTotal(): int
    {
        return array_sum($this->count);
    }

    private function countString(): string
    {
        $count_str = "";
        foreach ($this->count as $key => $val) {
            $count_str .= $key . ": " . strval($val) . "\n";
        }
        return $count_str;
    }

    public function resultString(): string
    {
        $result = "";
        for ($i = $this->start; $i < $this->stop + 1; $i++) {
            $result .= $this->getSingleResult($i);
        }
        return $result;
    }


    public function gatherResultString(): string
    {
        $main_str = $this->resultString();
        $count_str = $this->countString();
        return $main_str . "\n" . $count_str . "\n";
    }

    public static function printResult(int $start, int $stop): int
    {
        return print((new self($start, $stop))->gatherResultString());
    }
}

FizzBuzzThree::printResult(1, 20);
