<?php

class ListManager
{
    private array $list;

    public function __construct(array $list)
    {
        $this->list = $list;
    }

    public function delete(string $what): void
    {
            foreach ($this->list as $key => $item) {
                if ($item[0] == $what) {
                    unset($this->list[$key]);
                }
            }
    }

    public function add(string $what): void
    {
            $n = count($this->list);
            $this->list[$n] = [($n . $n), $what];
    }

    public function getList():array
    {
        return $this->list;
    }


}