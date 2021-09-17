<?php

interface HashtableInterface
{

    /**
     * 写入键值对
     * @param $key
     * @return bool
     */
    public function set($key, $value): bool;

    /**
     * 获取键值对
     * @param $key
     * @return bool
     */
    public function get($key);


}