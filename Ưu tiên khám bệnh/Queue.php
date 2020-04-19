<?php
include 'QueueHospital.php';

class Queue implements QueueHospital
{

    public $queue;
    public $limit;

    public function __construct($limit = 10)
    {
        $this->limit = $limit;
        $this->queue = [];
    }

    public function isFull()
    {
        return count($this->queue) == $this->limit;
    }

    function isEmpty()
    {
        return empty($this->queue);
        // TODO: Implement isEmpty() method.
    }

    function enqueue($code, $name)
    {
        if (!$this->isFull()) {
            array_push($this->queue, [
                'code' => $code,
                'name' => $name
            ]);
        } else {
            echo "Is full";
        }
        return $this->queue;
        // TODO: Implement enqueue() method.
    }



    function dequeue()
    {
        $arr = $this->queue;
        usort($arr,function ($a,$b) {
            if ($a['code'] > $b['code']) {
                return true;
            }
            return false;
        });
        return $arr[0];
    }

    public function __toString()
    {
        return implode(",", $this->queue);
    }
}