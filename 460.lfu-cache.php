<?php

namespace LeetCode\LFUCache;

require __DIR__ . '/vendor/autoload.php';

/*
* @lc app=leetcode id=460 lang=php
*
* [460] LFU Cache
*/
// @lc code=start
class Node
{
    public ?int $key;
    public ?int $value;
    public int $frequence;
    public ?Node $prev;
    public ?Node $next;

    public function __construct(
        ?int $key,
        ?int $value
    ) {
        $this->key = $key;
        $this->value = $value;

        $this->frequence = 1;
        $this->prev = null;
        $this->next = null;
    }
}

class DoubleLinkedList
{
    protected Node $sentinel;
    public int $size;

    public function __construct()
    {
        $this->sentinel = new Node(null, null);
        $this->sentinel->next = $this->sentinel;
        $this->sentinel->prev = $this->sentinel;

        $this->size = 0;
    }

    public function append(Node $node)
    {
        $node->prev = $this->sentinel;
        $node->next = $this->sentinel->next;

        $this->sentinel->next->prev = $node;
        $this->sentinel->next = $node;

        $this->size++;
    }

    public function pop(?Node $node = null): ?Node
    {
        if ($this->size == 0) {
            return null;
        }

        //good thinking
        if (is_null($node)) {
            $node = $this->sentinel->prev;
        }

        $node->prev->next = $this->sentinel;
        $this->sentinel->prev = $node->prev;

        $this->size--;

        return $node;
    }
}

class LFUCache
{
    protected int $capacity;
    protected int $size;
    protected array $nodeDictionary;
    protected array $doubleListCollection;
    protected int $minFrequence;

    const NODE_NOT_EXISTS = -1;

    /**
     * @param int $capacity
     */
    public function __construct($capacity)
    {
        $this->capacity = $capacity;
        $this->size = 0;
        $this->nodeDictionary = [];
        $this->doubleListCollection = [];
        $this->minFrequence = 0;
    }

    /**
     * @param int $key
     * @return int
     */
    public function get($key)
    {
        if (!isset($this->nodeDictionary[$key])) {
            return self::NODE_NOT_EXISTS;
        }

        $node = $this->nodeDictionary[$key];
        $frequence = $node->frequence;

        $doubleLinkedList = $this->doubleListCollection[$frequence];
        $doubleLinkedList->pop($node);

        if ($doubleLinkedList->size == 0 && $frequence == $this->minFrequence) {
            $this->minFrequence++;
        }

        $node->frequence++;
        $frequence = $node->frequence;

        if (!isset($this->doubleListCollection[$frequence])) {
            $this->doubleListCollection[$frequence] = new DoubleLinkedList();
        }

        $doubleLinkedList = $this->doubleListCollection[$frequence];
        $doubleLinkedList->append($node);

        return $node->value;
    }

    /**
     * @param int $key
     * @param int $value
     * @return void
     */
    public function put($key, $value): void
    {
        if ($this->capacity == 0) {
            return;
        }

        if (isset($this->nodeDictionary[$key])) {
            $node = $this->nodeDictionary[$key];
            $node->value = $value;
            $frequence = $node->frequence;

            $doubleLinkedList = $this->doubleListCollection[$frequence];
            $doubleLinkedList->pop($node);

            if ($doubleLinkedList->size == 0 && $frequence == $this->minFrequence) {
                $this->minFrequence++;
            }

            $node->frequence++;
            $frequence = $node->frequence;

            if (!isset($this->doubleListCollection[$frequence])) {
                $this->doubleListCollection[$frequence] = new DoubleLinkedList();
            }

            $doubleLinkedList = $this->doubleListCollection[$frequence];
            $doubleLinkedList->append($node);

            return;
        }

        if ($this->size == $this->capacity) {
            $doubleLinkedList = $this->doubleListCollection[$this->minFrequence];
            $unsetNode = $doubleLinkedList->pop();

            $unsetNodeKey = $unsetNode->key;
            unset($this->nodeDictionary[$unsetNodeKey]);

            $this->size--;

            if ($doubleLinkedList->size == 0 && $this->minFrequence > 0) {
                $this->minFrequence--;
            }
        }

        $node = new Node($key, $value);
        $this->nodeDictionary[$key] = $node;

        if (!isset($this->doubleListCollection[1])) {
            $this->doubleListCollection[1] = new DoubleLinkedList();
        }

        $doubleLinkedList = $this->doubleListCollection[1];
        $doubleLinkedList->append($node);

        $this->minFrequence = 1;
        $this->size++;
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
