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

    protected array $cache = [];

    protected array $cacheUsedCounter = [];

    protected array $recentlyUsedKeys = [];

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
        if ($this->capacity == 0) {
            return -1;
        }

        if (isset($this->cache[$key])) {
            $this->cacheUsedCounter[$key]++;
            $this->recentlyUsedKeys[] = $key;
            return $this->cache[$key];
        } else {
            $this->recentlyUsedKeys[] = $key;
            return -1;
        }
    }

    /**
     * @param int $key
     * @param int $value
     * @return null
     */
    public function put($key, $value)
    {
        if ($this->capacity == 0) {
            return;
        }

        if (isset($this->cache[$key])) {
            $this->cacheUsedCounter[$key]++;
            $this->cache[$key] = $value;
            $this->recentlyUsedKeys[] = $key;
        } else {
            if (count($this->cache) == $this->capacity) {
                $minUsedCounterKeys = array_keys($this->cacheUsedCounter, min($this->cacheUsedCounter));
                if (count($minUsedCounterKeys) == 1) {
                    $minUsedCounterKey = $minUsedCounterKeys[0];
                    unset($this->cacheUsedCounter[$minUsedCounterKey]);
                    unset($this->cache[$minUsedCounterKey]);
                } else {
                    $usedKeys = [];
                    while (count($this->recentlyUsedKeys) > 0) {
                        $usedKey = array_pop($this->recentlyUsedKeys);
                        if (in_array($usedKey, $minUsedCounterKeys)) {
                            $usedKeys[$usedKey] = true;
                        }

                        if (count($usedKeys) == count($minUsedCounterKeys)) {
                            unset($this->cacheUsedCounter[$usedKey]);
                            unset($this->cache[$usedKey]);
                            break;
                        }
                    }
                }
            }

            $this->cacheUsedCounter[$key] = 1;
            $this->cache[$key] = $value;
            $this->recentlyUsedKeys[] = $key;
        }
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
