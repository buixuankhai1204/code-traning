<?php
class Report
{
    public $Title;
    public $Date;
    public function __construct($Title,$Date)
     {
         $this->Title = $Title;
         $this->Date = $Date;
     }
    public function getContents()
    {
        return [
            'title' => $this->Title,
            'date' => $this->Date,
        ];
    }
}
?>