<?php

    $arr[0][0][0][0][0] = 58;
    $arr[0][0][0][0][1] = 11.02;
    $arr[0][0][0][1][0] = 999;
    $arr[0][0][0][1][1] = 5.03;
    $arr[0][0][1][0][0] = "hey";
    $arr[0][0][1][0][1] = 2;
    $arr[0][0][1][1][0] = 6.3654;
    $arr[0][0][1][1][1] = 737;
    $arr[0][1][0][0][0] = 35.345;
    $arr[0][1][0][0][1] = 3.33;
    $arr[0][1][0][1][0] = "ssf";
    $arr[0][1][0][1][1] = "73645";
    $arr[0][1][1][0][0] = 634.5;
    $arr[0][1][1][0][1] = "osisp is pain";
    $arr[0][1][1][1][0] = 234.2;
    $arr[0][1][1][1][1] = 2222;
    $arr[1][0][0][0][0] = 3543.3;
    $arr[1][0][0][0][1] = "aww";
    $arr[1][0][0][1][0] = 333.44;
    $arr[1][0][0][1][1] = 2.1;
    $arr[1][0][1][0][0] = 555;
    $arr[1][0][1][0][1] = "anfg";
    $arr[1][0][1][1][0] = 4152;
    $arr[1][0][1][1][1] = 763467.34
    $arr[1][1][0][0][0] = "jhdfb";
    $arr[1][1][0][0][1] = "jahshbd";
    $arr[1][1][0][1][0] = "jhjbfjsdf";
    $arr[1][1][0][1][1] = "josdi";
    $arr[1][1][1][0][0] = 234.2;
    $arr[1][1][1][0][1] = "gegeg";
    $arr[1][1][1][1][0] = "gdfgd";
    $arr[1][1][1][1][1] = 765.67;

    echo "<br> Исходный массив: ";
    foreach ($arr as $arr1) {
        foreach ($arr1 as $arr2) {
            foreach ($arr2 as $arr3) {
                foreach ($arr3 as $arr4) {
                    foreach ($arr4 as $elem) {
                        echo "$elem ";
                    }
                }
            }
        }
    }

    for ($ind1 = 0; $ind1 < 2; $ind1++) {
        for ($ind2 = 0; $ind2 < 2; $ind2++) {
            for ($ind3 = 0; $ind3 < 2; $ind3++) {
                for ($ind4 = 0; $ind4 < 2; $ind4++) {
                    for ($ind5 = 0; $ind5 < 2; $ind5++) {
                        if (is_string($arr[$ind1][$ind2][$ind3][$ind4][$ind5])) {
                            $arr[$ind1][$ind2][$ind3][$ind4][$ind5] = mb_strtoupper($arr[$ind1][$ind2][$ind3][$ind4][$ind5]);
                        }

                        if (is_float($arr[$ind1][$ind2][$ind3][$ind4][$ind5])) {
                            $arr[$ind1][$ind2][$ind3][$ind4][$ind5] = round($arr[$ind1][$ind2][$ind3][$ind4][$ind5], 2);
                        }

                        if (is_int($arr[$ind1][$ind2][$ind3][$ind4][$ind5])) {
                            unset($arr[$ind1][$ind2][$ind3][$ind4][$ind5]);
                        }
                    }
                }
            }
        }
    }

    echo "<br> Результат: ";
    foreach ($arr as $arr1) {
        foreach ($arr1 as $arr2) {
            foreach ($arr2 as $arr3) {
                foreach ($arr3 as $arr4) {
                    foreach ($arr4 as $elem) {
                        echo "$elem ";
                    }
                }
            }
        }
    }

?>
