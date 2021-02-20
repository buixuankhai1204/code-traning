<?php

interface ClientFacer {
    public function callToClient($phoneNumber);
    public function attendMeetings($phoneNumber);
  }
?>