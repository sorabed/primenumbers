<?php
/**
 * Created by Sam Mirza.
 * Date: 4/1/2017
 */
// sleeping the system for 1 second.
sleep(1);

// Request Post Variable
$number = $_REQUEST['field'];
$return = array();
if (!validateEntry($number))
{
    $return['error'] = true;
    $return['message'] = "This is not a valid input";
    $return['numbers'] = null; // added for the code consistency
    echo json_encode($return);
}
else{
    $return['error'] = false;
    $return['message'] = "Here are your prime numbers:";
    $return['numbers'] = genprime($number);
    echo json_encode($return);
}
// A PHP function to calculate prime numbers less than input N
//function genprime($num)
//{
//    $k = 0;
//    $p = array();
//    for($a=2;$a<=$num;$a++) {
//        for ($b = 2; $b < $a; $b++) {
//            if ($a % $b == 0) {
//                break;
//            }
//        }
//        if($b==$a)
//            $p[$k] = $a;
//        $k++;
//    }
//    return $p;
//}

// A PHP function to find the first Nth prime number
function genprime($num)
{
    $count1 = 0;
    $p = array(); // defining array
    $ini = 2;
    while ($count1 < $num) {
        $count2 = 0;
        for ($i = 1; $i <= $ini; $i++) {
            if (($ini % $i) == 0) {
                $count2++;
            }
        }
        if ($count2 < 3) {
            $p[$count1] = $ini;
            $count1 = $count1 +1;
        }
                $ini = $ini +1;
    }
    return $p; //returning array
}
// Regular expression validation
function validateEntry($num)
{
    return (preg_match("/^([1-9]|[1-9][0-9]|[1-9][0-9][0-9]|1000)$/", $num));
}

?>