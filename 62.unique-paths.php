<?php

namespace LeetCode\UniquePaths;

require __DIR__ . '/vendor/autoload.php';

/*
 * @lc app=leetcode id=62 lang=php
 *
 * [62] Unique Paths
 */

// @lc code=start
class Solution
{

    /**
     * @param int $m
     * @param int $n
     * @return int
     */
    public function uniquePaths($m, $n)
    {
        $result = [];

        for ($i = 1; $i <= $m; $i++) {
            for ($j = 1; $j <= $n; $j++) {
                if ($i == 1 || $j == 1) {
                    $result[$i][$j] = 1;
                    continue;
                }

                $result[$i][$j] = $result[$i - 1][$j] + $result[$i][$j - 1];
            }
        }

        return $result[$m][$n];
    }
}
// @lc code=end

// linsheng24: 動態規劃，就是畫表格
// 利用先前的結果往後推導 (類似數學歸納法)
// 一種用空間換取時間的概念

// $solution = new Solution();
// $answer = $solution->uniquePaths(3, 7);
