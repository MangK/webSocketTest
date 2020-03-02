<?php
$list = [2, 4, 8, 11, 252, 11, 5488, 61, 575, 1, 3, 7, 9, 1,];

/**
 * 快速排序
 */
function quickSort($list)
{
    if (count($list) <= 1) {
        return $list;
    }
    $flag = array_pop($list);
    $leftArr = $rightArr = [];
    foreach ($list as $item) {
        if ($item <= $flag) {
            $leftArr[] = $item;
        } else {
            $rightArr[] = $item;
        }
    }
    return array_merge(quickSort($leftArr), [$flag], quickSort($rightArr));
}

function quictSortBester(&$list, $left, $right)
{
    if ($right - $left <= 0) {
        return $right;
    }
    $flag = $list[$right];
    $mid = ($left + $right) / 2;
    list($list[$flag], $list[$mid]) = [$list[$mid], $list[$flag]];
    foreach ($list as $k => $item) {

    }
}

//var_dump(quickSort($list));
// 5 1 3
// r = 3
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


function partition(&$arr, $leftIndex, $rightIndex)
{
    $pivot = $arr[($leftIndex + $rightIndex) / 2];
    while ($leftIndex <= $rightIndex) {
        while ($arr[$leftIndex] < $pivot) {
            $leftIndex++;
        }

        while ($arr[$rightIndex] > $pivot) {
            $rightIndex--;
        }

        if ($leftIndex <= $rightIndex) {
            list($arr[$leftIndex], $arr[$rightIndex]) = [$arr[$rightIndex], $arr[$leftIndex]];

            $leftIndex++;
            $rightIndex--;
        }
    }

    return $leftIndex;
}

function quickSort1(&$arr, $leftIndex, $rightIndex)
{
    foreach ($arr as $item) {
        echo $item . '-';
    }
    echo "<br>";
    if ($leftIndex < $rightIndex) {
        $index = partition($arr, $leftIndex, $rightIndex);

        quickSort1($arr, $leftIndex, $index - 1);
        quickSort1($arr, $index, $rightIndex);
    }
}

quickSort1($list, 0, count($list) - 1);