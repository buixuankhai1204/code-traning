<?php


class JsonReportFormatter
{
    protected $Report;
 
public function __construct(Report $Report)
{
    $this->Report = $Report;
}
    public function format()
    {
        return json_encode($this->Report->getContents());
    }
}
?>