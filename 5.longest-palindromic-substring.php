<?php

namespace LeetCode\LongestPalindromicSubstring;

require __DIR__ . '/vendor/autoload.php';

/*
 * @lc app=leetcode id=5 lang=php
 *
 * [5] Longest Palindromic Substring
 */

// @lc code=start
class Solution
{

    /**
     * @param string $string
     * @return string
     */
    public function longestPalindrome($string)
    {
        $answer = "";
        for ($i = 0; $i < strlen($string); $i++) {
            $oddPalindrome = $this->findOddPalindrome($string, $i);

            if (strlen($oddPalindrome) > strlen($answer)) {
                $answer = $oddPalindrome;
            }
        }

        for ($i = 0; $i < strlen($string); $i++) {
            $evenPalindrome = $this->findEvenPalindrome($string, $i);

            if (strlen($evenPalindrome) > strlen($answer)) {
                $answer = $evenPalindrome;
            }
        }

        return $answer;
    }

    private function findOddPalindrome($string, $start)
    {
        $answer = $string[$start];

        $left = $start - 1;
        $right = $start + 1;

        while ($left >= 0 && $right < strlen($string)) {
            if ($string[$left] == $string[$right]) {
                $answer = substr($string, $left, $right - $left + 1);
                $left--;
                $right++;
                continue;
            } else {
                break;
            }
        }

        return $answer;
    }

    private function findEvenPalindrome($string, $start)
    {
        $answer = '';
        if ($start == 0) {
            if (strlen($string) > 1 && $string[$start] == $string[$start + 1]) {
                $answer = $string[$start] . $string[$start + 1];
            }
            return $answer;
        }

        if ($start == strlen($string) - 1) {
            if (strlen($string) > 1 && $string[$start - 1] == $string[$start]) {
                $answer = $string[$start - 1] . $string[$start];
            }
            return $answer;
        }

        if ($start == 0 || $start == strlen($string) - 1) {
            return $answer;
        }


        if ($string[$start - 1] == $string[$start]) {
            $answer = $string[$start - 1] . $string[$start];
            $left = $start - 2;
            $right = $start + 1;
        } else if ($string[$start] == $string[$start + 1]) {
            $answer = $string[$start] . $string[$start + 1];
            $left = $start - 1;
            $right = $start + 2;
        } else {
            return $answer;
        }

        while ($left >= 0 && $right < strlen($string)) {
            if ($string[$left] == $string[$right]) {
                $answer = substr($string, $left, $right - $left + 1);
                $left--;
                $right++;
                continue;
            } else {
                break;
            }
        }

        return $answer;
    }
}
// @lc code=end

$solution = new Solution();
$answer = $solution->longestPalindrome('abbacc');
dump($answer);
