<?php


class FizzBuzzThree
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


    public function get_single_result(int $num): string
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

    public function count_total(): int
    {
        return array_sum($this->count);
    }

    private function count_string(): string
    {
        $count_str = "";
        foreach ($this->count as $key => $val) {
            $count_str .= $key . ": " . strval($val) . "\n";
        }
        return $count_str;
    }

    public function result_string(): string
    {
        $result = "";
        for ($i = $this->start; $i < $this->stop + 1; $i++) {
            $result .= $this->get_single_result($i);
        }
        return $result;
    }

    public function print_result(): int
    {
        $main_str = $this->result_string();
        $count_str = $this->count_string();
        return print($main_str . "\n" . $count_str . "\n");
    }
}

$fb = new FizzBuzzThree(1, 20);
$fb->print_result();
