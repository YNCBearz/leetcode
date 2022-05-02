<?php

namespace LeetCode\RemoveNthNodeFromEndOfList;

/*
 * @lc app=leetcode id=19 lang=php
 *
 * [19] Remove Nth Node From End of List
 */

// @lc code=start
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution
{

    /**
     * @param ListNode $head
     * @param int $n
     * @return ListNode
     */
    function removeNthFromEnd($head, $n)
    {
        if (is_null($head->next)) {
            return null;
        }

        $pointer1 = $head;
        $pointer2 = $head;

        for ($i = 0; $i < $n; $i++) {
            if (is_null($pointer1->next)) {
                return $head->next;
            }
            $pointer1 = $pointer1->next;
        }

        while (!is_null($pointer1->next)) {
            $pointer1 = $pointer1->next;
            $pointer2 = $pointer2->next;
        }

        $pointer2->next = $pointer2->next->next;
        return $head;
    }
}
// @lc code=end