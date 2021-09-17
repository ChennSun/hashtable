<?php

require_once("./HashtableInterface.php");


class Hashtable implements HashtableInterface
{

    private $capacity;

    private $storageArray;

    public function __construct(int $capacity) {
        $this->capacity = $capacity;
        $this->storageArray = [];
    }

    /**
     * 哈希方法
     * @return mixed
     */
    private function hashFunction($key): int {
        return crc32($key);
    }

    /**
     * 获取key对应的位置
     * @return int
     */
    private function getIndexByKey($key): int{
        return $this->hashFunction($key) % $this->capacity;
    }

    public function set($key, $value) : bool{
        $index = $this->getIndexByKey($key);
        if (empty($this->storageArray[$index])) {
            $this->storageArray[$index][] = [
                'key'   => $key,
                'value' => $value,
            ];
        }else{
            foreach ($this->storageArray[$index] as $k => $node){
                if($node['key'] == $key){
                    unset($this->storageArray[$index][$k]);
                    $this->storageArray[$index][] = [
                        'key'   => $key,
                        'value' => $value,
                    ];
                }
            }
        }
        return true;
    }

    public function get($key){
        $index = $this->getIndexByKey($key);
        foreach ($this->storageArray[$index] as $node){
            if($node['key'] == $key){
                return $node['value'];
            }
        }
    }

    public function getStorageArray() {
        return $this->storageArray;
    }

}

