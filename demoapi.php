<?php
class Cart{
    private "$member";
    private $buylist;
    fuction __construct($member){
        $this->member = $member;
        $this->buylist = array();
}
    function addItem($pid,$qty){
      if(!isset($this->buylist[$pid])){
          $this->buylist[$pid]=$qty;
      }
    }
    function editem($pid, $qty){
        if(!isset($this->buylist[$pid])){
            $this->buylist[$pid]=$qty;
        }
    }
    function rmItem($pid){
        if(!isset($this->buylist[$pid])){
            $this->buylist[$pid]=$qty;
        }
    }
    function getBuylist(){
        return $this->buylist;
    }
}

class Member{
    private $id,$name,$level;
    function __construct($id,$name,$level){
        $this->id = $id;
        $this->name = $name;
        $this->level = $level;

    }
    function getName(){return $this->name;}
    function getId(){return $this->id;}
    function getLevel(){return $this->level;}



}