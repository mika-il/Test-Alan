<?php

function transformedArray(array $inputArray) : array
{
    $countArr = count($inputArray);
    $nonZeroIndex = 0;
    $countZero = 0;

    for($i=0; $i < $countArr; $i++){
        if($inputArray[$i] != 0) {
            $inputArray[$nonZeroIndex] = $inputArray[$i];
            $nonZeroIndex ++;
        } else {
            $countZero ++;
        }
    }
    
    if($countZero === 0) {
        return $inputArray;
    }
    

    while($nonZeroIndex < $countArr) {
        $inputArray[$nonZeroIndex++] = 0;
    }

    $lastNonZero = 0;
    $restOfZero = $countZero - ceil($countZero/2);
    for ($j = $countArr - 1; $j >= 0; $j--) {
        if ($inputArray[$j] === 0 && $restOfZero > 0) {
            $restOfZero--;
            continue;
        }

        if (!$lastNonZero) {
            $lastNonZero = $j;
        }
 
        if ($inputArray[$j] !== 0) {
            $inputArray[$lastNonZero--] = $inputArray[$j];
        }  
    }

    while ($lastNonZero >= 0) {
        $inputArray[$lastNonZero--] = 0;
    }

    return $inputArray;
}

$inputArray = [3,5,6,0,7,0,1];
print_r(transformedArray($inputArray));