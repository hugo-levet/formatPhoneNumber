<?php
function formatPhoneNumber(string $phoneNumber, int $maxPhoneNumber = 1, string $separator = ' - ')
{
    // get juste number
    preg_match_all('!\d+!', $phoneNumber, $allPhoneNumbers);
    $allPhoneNumbers = $allPhoneNumbers[0];
    $allPhoneNumbers = str_split(implode($allPhoneNumbers));
    // int var
    $phoneFormating = '';
    $leftOverEnd = 10;
    $leftOverSpace = 2;
    $nextPhoneNumber = '';
    // for each digit
    foreach ($allPhoneNumbers as $phoneNumber) {
        // do nothing if max is reached
        if ($maxPhoneNumber != 0) {
            $nextPhoneNumber .= $phoneNumber;
            --$leftOverEnd;
            --$leftOverSpace;
            if ($leftOverEnd == 0) { // end of phone number
                if ($phoneFormating != '') {
                    $phoneFormating .= $separator;
                }
                $phoneFormating .= $nextPhoneNumber;
                $leftOverEnd = 10;
                $leftOverSpace = 2;
                --$maxPhoneNumber;
                $nextPhoneNumber = '';
            } else if ($leftOverSpace == 0) { // end of pair of number
                $nextPhoneNumber .= ' ';
                $leftOverSpace = 2;
            }
        }
    }
    return $phoneFormating;
}
