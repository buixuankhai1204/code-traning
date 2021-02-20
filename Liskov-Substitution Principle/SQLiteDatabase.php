<?php

class SQLiteDatabase implements Database
{
    public function selectQuery(string $sql): array
    {
        // sqlite specific code
    $sql=[$sql,1];
    return $sql;
    }
}
?>