<?php

// Start of algorithm.php library

/**
 * @author - Adriskk, Poland
 * Sorting algorithms, structure algorithms,
 * and a little of the mathematic algorithms
 * @link
 *
 */

/*
 *  Algorithm functions:
 */


    /*
     *  Algorithm~sort functions:
     */

/**
 * Sorts the array of integers (bubble sort)
 * @param $array
 * - the array of integers
 * @return array
 * returns the sorted array from lower to the highest, to get the array
 * reversed, --> rev_bubble_sort()
 */
function bubble_sort(&$array) : array{
    for($i = 0; $i < sizeof($array); $i++)
    {
        for ($j = 0; $j < sizeof($array) - $i - 1; $j++)
        {
            if ($array[$j] > $array[$j+1])
            {
                $t = $array[$j];
                $array[$j] = $array[$j+1];
                $array[$j+1] = $t;
            }
        }
    }

    return $array;
  }

/**
 * Sorts the array of integers (reversed bubble sort)
 * @param $array
 * - the array of integers
 * @return array
 * returns the sorted array from highest to lower
 */
function rev_bubble_sort(&$array) : array{
    $arr = bubble_sort($array);
    $reversed_arr = [];
    $reverse = sizeof($arr)-1;
    for($i=0; $i<=sizeof($arr); $i++) {
        $reversed_arr[$i] = $arr[$reverse];
        $reverse--;
    }
    array_pop($reversed_arr);
    return $reversed_arr;
}

/**
 * Sorts the array of integers (insert sort)
 * @param $array
 * - the array of integers
 * @return array
 * returns the sorted array from highest to lower
 */
function insert_sort(&$array) : array{
    for($i=0;$i<count($array);$i++){
        $val = $array[$i];
        $j = $i-1;

        while($j>=0 && $array[$j] > $val){
            $array[$j+1] = $array[$j];
            $j--;
        }
        $array[$j+1] = $val;
    }

    return $array;
}


    /*
     *  Algorithm functions:
     */

/**
 * Generates the array of fibonacci numbers for the given length
 * @param $length
 * - gets the (int) length of the array with fibonacci numbers
 * @return array
 * - returns the array with the fibonacci numbers
 * */
function fibonacci($length) : array{
    $fib = [];
    $number = 0;
    for($i=0; $i<$length; $i++){
        if($i == 0) $fib[] += $i;
        else if($i == 1) $fib[] += $i; //
        else {
            $fib[] += ($fib[$i-1] + $fib[$i-2]);
        }
    }

    return $fib;
}

/**
 * Checks if the number is odd or not
 * @param $number
 * - number to check
 * @return boolean
 * - return true if number is odd, either returns false
 * */
function odd($number) : bool{
    if($number %2 == 0) return true;
    else return false;
}

/**
 * Finds the first repeated character
 * @param $string
 * - String to scan
 * @return string
 * - first key is the char, that is repeating first. Second key are the chars,
 *   that string contains more than one time
 * */
function first_repeating_char($string) : string{
    $array = [];

    for($i=0; $i<=strlen($string); $i++) {
        if (!in_array($string[$i], $array, true)){
            $array[$i] .= $string[$i];
        }else {
            return $string[$i];
        }
    }
}

/**
 * Start of the compartment
 * @param int $begin
 * End of the compartment
 * @param int $end
 * How many of those numbers
 * @param int $count
 *
 * Returns the array of non-repeating numbers
 * @return array
 */
function rand_non_rep_number($begin, $end, $count) : array{
    try {
        $array = [];
        $tmp_arr = [];

        for($i=0; $i<$count; $i++) {
            $number = rand($begin, $end);
            while(in_array($number, $tmp_arr)) {
                $number = rand($begin, $end);
            }

            $array[$i] = $number;
            $tmp_arr[$i] = $number;
        }

        return $array;
    } catch(Exception $exception){
        echo "There's an error in function rand_non_rep_number(begin, end, count) nr. {$exception->getCode()}, errorMessage:
              {$exception->getMessage()}";
    }

}

/**
 * The list in array
 * @param array $array
 *
 * Returns reversed linked list
 * @return mixed
 * */
function reversed_linked_list($array) : array{
//    $reversed = [];
//    for($i=0; $i<=sizeof($array); $i++) {
//        $reversed[sizeof($array)-$i] = $array[$i];
//    }

    return array_reverse($array);
}

/**
 * 2D array of integers
 * @param $array
 *
 * Returns reversed array
 * @return mixed
 */
function reversed_2d_array($array) : array{
    $reversed = [];
    $slot = 2;

    for($i=0; $i<=sizeof($array)-1; $i++){
        for($k=0; $k<=2; $k++) {
            $reversed[$i][$k] = $array[$i][$slot];
            $slot--;
        }
        $slot = 2;
    }

    return $reversed;
}

/**
 * Array of integers to check if the given value
 * below exists in array
 * @param $array
 * Number to check in the array
 * @param $x
 * Returns true if exists
 * @return bool
 */
function binary_search($array, $x) : bool{
    {
        if (count($array) === 0) return false;
        $low = 0;
        $high = count($array) - 1;

        while ($low <= $high) {
            $mid = floor(($low + $high) / 2);

            if($array[$mid] == $x) {
                return true;
            }

            if ($x < $array[$mid]) {
                $high = $mid -1;
            } else {
                $low = $mid + 1;
            }
        }

        return false;
    }

}

    /*
     *  Algorithm~structure classes:
     */

interface StructureInterface {
    # ADD A NEW ITEM TO THE STRUCTURE
    public function add_item($item);

    # REMOVE THE ITEM FROM THE STRUCTURE
    public function remove_item();

    # DESTROY THE EXISTING STRUCTURE
    public function destroy_structure();
}

/**
 * Creates a queue structure
 * Makes some functions on this queue
 * */
class Queue implements StructureInterface {
    static $queue = [];

    /**
     * YOU ADDS YOURS ARRAY OF INTEGERS AS QUEUE
     * @param array $queue
     */
    function __construct($queue = []){
        self::$queue = $queue;
    }

    /**
     * Adds an item to the queue
     * @param $item
     * */
    public function add_item($item){
        self::$queue[] += $item;
        //var_dump(self::$queue);
    }

    /**
     * Remove the last item in the queue
     * */
    public function remove_item(){
        return array_pop(self::$queue);
    }

    /**
     * Changes the queue to the null value
     * */
    public function destroy_structure(){
        self::$queue = NULL;
    }
}

/**
 * Creates a stack structure
 * Makes some functions on this stack
 * */
class Stack implements StructureInterface {
    static $stack = [];

    /**
     * YOU ADDS YOURS ARRAY OF INTEGERS AS STACK
     * @param array $stack
     */
    function __construct($stack = []){
        self::$stack = $stack;
    }

    /**
     * Adds an item to the stack
     * @param $item
     * */
    public function add_item($item){
        self::$stack[] += $item;
    }

    /**
     * Remove first item in the stack
     * */
    public function remove_item(){
        return array_shift(self::$stack);
    }

    /**
     * Changes the stack to the null value
     * */
    public function destroy_structure(){
        self::$stack = NULL;
    }
}












