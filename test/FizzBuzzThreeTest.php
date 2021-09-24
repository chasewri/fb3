<?php
// ./vendor/bin/phpunit test
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class FizzBuzzThreeTest extends TestCase
{
    public function testCorrectNumTotal(): void
    {
        $fb = new FizzBuzzThree(1, 100);
        $fb_str = $fb->resultString();
        $capture_arr = explode(" ", trim($fb_str));
        $this->assertSame(100, count($capture_arr));
    }

    public function testCorrectNumberAllCounts(): void
    {
        $fb = new FizzBuzzThree(1, 100);
        $fb->resultString();
        $this->assertSame(100, $fb->countTotal());
    }

    public function testMultiplesOfThree(): void
    {
        $fb = new FizzBuzzThree(1, 100);
        $test_arr = range(3, 100, 3);
        foreach ($test_arr as $key => $val) {
            $three_check = preg_match("/3/", strval($val));
            if ($val % 5 !== 0 && !$three_check) {
                $this->assertSame("fizz", trim($fb->getSingleResult($val)));
            }
        }
    }

    public function testMultiplesOfFive(): void
    {
        $fb = new FizzBuzzThree(1, 100);
        $test_arr = range(5, 100, 5);
        foreach ($test_arr as $key => $val) {
            $three_check = preg_match("/3/", strval($val));
            if ($val % 3 !== 0 && !$three_check) {
                $this->assertSame("buzz", trim($fb->getSingleResult($val)));
            }
        }
    }

    public function testMultiplesOfFifteen(): void
    {
        $fb = new FizzBuzzThree(1, 100);
        $test_arr = range(15, 100, 15);
        foreach ($test_arr as $key => $val) {
            $three_check = preg_match("/3/", strval($val));
            if (!$three_check) {
                $this->assertSame("fizzbuzz", trim($fb->getSingleResult($val)));
            }
        }
    }

    public function testReturnIntegersAndLucky(): void
    {
        $fb = new FizzBuzzThree(1, 100);
        $test_arr = range(1, 100);
        foreach ($test_arr as $key => $val) {
            $three_check = preg_match("/3/", strval($val));
            if ($three_check) {
                $this->assertSame("lucky", trim($fb->getSingleResult($val)));
            } else if ($val % 3 !== 0 && $val % 5 !== 0) {
                $this->assertGreaterThan(0, (int)trim($fb->getSingleResult($val)));
            }
        }
    }

    public function testReverse(): void
    {
        $fb = new FizzBuzzThree(1, 100);
        $fb_str = $fb->resultString();
        $capture_arr = explode(" ", trim($fb_str));
        $test_arr = range(1, 100);
        foreach ($capture_arr as $key => $val) {
            switch ($val) {
                case 'fizz':
                    $this->assertTrue($test_arr[$key] % 3 === 0);
                    break;
                case 'buzz':
                    $this->assertTrue($test_arr[$key] % 5 === 0);
                    break;
                case 'fizzbuzz':
                    $this->assertTrue($test_arr[$key] % 15 === 0);
                    break;
                case 'lucky':
                    $this->assertSame(1, preg_match("/3/", (string)$test_arr[$key]));
                    break;
                default:
                    $this->assertSame((int)$capture_arr[$key], $test_arr[$key]);
                    break;
            }
        }
    }
}
