<?php

class MySQLDatabase implements Database
{
    public function selectQuery(string $sql): array
    {
        // mysql specific code
        $arr=[
            1,2,3,4  
            ];
        return $arr;
    }
}
?>