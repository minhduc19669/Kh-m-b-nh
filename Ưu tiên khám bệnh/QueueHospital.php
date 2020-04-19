<?php

interface QueueHospital
{
    function isEmpty();
    function enqueue($name,$code);
    function dequeue();
    public function __toString();

}