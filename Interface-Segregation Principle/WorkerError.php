<?php
interface Worker {
 
    public function takeBreak();
   
    public function code();
   
    public function callToClient();
   
    public function attendMeetings();
   
    public function getPaid();
  }

?>