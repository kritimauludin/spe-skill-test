<?php

class SpeSkillTest
{

    public function __construct()
    {
        //trigger narcissisticNumber function
        $this->narcissisticNumber(1634);
        $this->narcissisticNumber(153);
        $this->narcissisticNumber(111);
        echo PHP_EOL;

        //trigger outlier function
        $this->outlier([2, 4, 0, 100, 4, 11, 2602, 36]);
        $this->outlier([160, 3, 1719, 19, 11, 13, -21]);
        $this->outlier([11, 13, 15, 19, 9, 13, -21]);
        $this->outlier([10, 12, 14, 18, 10, 16, -20]);
        echo PHP_EOL;

        //trigger findNeedle function
        $this->findNeedle(["red", "blue", "yellow", "black", "grey"], "blue");
        $this->findNeedle(["red", "blue", "yellow", "black", "grey", "grey"], "grey");
        echo PHP_EOL;

        //trigger blueOcean function
        $this->blueOcean([1, 2, 3, 4, 6, 10], [1]);
        echo PHP_EOL;
    }

    private function narcissisticNumber(int $value): bool
    {
        // just positive number
        if ($value > 0) {
            $arrayOfValue = str_split($value);
            $lengthOfValue = count($arrayOfValue);
            $narcissistic = 0;

            foreach ($arrayOfValue as $arr) {
                $narcissistic += pow($arr, $lengthOfValue);
            }
            if ($value == $narcissistic) {
                echo 'true (' . $value . ' is Narcissistic Number)' . PHP_EOL;
                return true;
            } else {
                echo 'false (' . $value . ' Not Narcissistic Number)' . PHP_EOL;
                return false;
            }
        }
    }

    private function outlier(array $args)
    {
        $odd = 0;
        $oddNumber = 0;
        $oddArray = [];

        $even = 0;
        $evenNumber = 0;
        $evenArray = [];


        foreach ($args as $arr) {
            if ($arr % 2 == 0) {
                $even += 1;
                $evenNumber = $arr;
                array_push($evenArray, $arr);
            } else {
                $odd += 1;
                $oddNumber = $arr;
                array_push($oddArray, $arr);
            }
        }

        if ($odd == 1) {
            echo $oddNumber . '(the only odd number)' . PHP_EOL;
        } elseif ($even == 1) {
            echo $evenNumber . '(the only even number)' . PHP_EOL;
        } elseif (count($oddArray) == count($args)) {
            echo 'false (all odd integer, no outlier)' . PHP_EOL;
        } elseif (count($evenArray) == count($args)) {
            echo 'false (all even integer, no outlier)' . PHP_EOL;
        }
    }

    private function findNeedle(array $haystackArray, string $needle)
    {
        $i = 0;
        foreach ($haystackArray as $arr) {
            if ($arr == $needle) {
                echo $i . ' index of ' . $needle . PHP_EOL;
            }
            $i++;
        }
    }

    private function blueOcean(array $data, array $numberOfData)
    {
        $newData = [];
        foreach ($data as $arr) {
            if ($arr != $numberOfData[0]) {
                array_push($newData, $arr);
            }
        }

        $newStringOfData = implode(", ", $newData);

        echo 'Should return [' . $newStringOfData . '] because ' . $numberOfData[0] . ' is present in the second list' . PHP_EOL;
    }
}


$SpeSkillTest = new SpeSkillTest();
