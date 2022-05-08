<?php

namespace LeetCode\LFUCache;

require __DIR__ . '/vendor/autoload.php';

/*
 * @lc app=leetcode id=460 lang=php
 *
 * [460] LFU Cache
 */

// @lc code=start
class LFUCache
{
    protected int $capacity = 0;

    /**
     * @param int $capacity
     */
    public function __construct($capacity)
    {
        $this->capacity = $capacity;
    }

    /**
     * @param int $key
     * @return int
     */
    public function get($key)
    {
    }

    /**
     * @param int $key
     * @param int $value
     * @return null
     */
    public function put($key, $value)
    {
    }
}

/**
 * Your LFUCache object will be instantiated and called as such:
 * $obj = LFUCache($capacity);
 * $ret_1 = $obj->get($key);
 * $obj->put($key, $value);
 */
// @lc code=end

$lfu = new LFUCache(3);
$lfu->put(1, 1);
$lfu->put(2, 2);
$lfu->put(3, 3);
$lfu->put(4, 4);
dump($lfu->get(4)); //4
dump($lfu->get(3)); //3
dump($lfu->get(2)); //2
dump($lfu->get(1)); //-1
$lfu->put(5, 5);
dump($lfu->get(1)); //-1
dump($lfu->get(2)); //2
dump($lfu->get(3)); //3
dump($lfu->get(4)); //-1
dump($lfu->get(5)); //5
