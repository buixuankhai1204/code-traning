<?php

class Heels implements Shoes
{
    public function BackStrap(): int
    {
        throw new Exception('cai nay khong co Quai sau');
    }
}
?>