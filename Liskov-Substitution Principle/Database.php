<?php
interface Database 
{
    public function selectQuery(string $sql): array;
}
?>