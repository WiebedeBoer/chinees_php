<?php

class Counter{
	public $ncquery;
	public $counter;
	function set_query($query) {
		$this->ncquery = $query;
	}			
	function give_count(){
		$ncid = $conn->prepare($this->ncquery);
		$ncid->bind_param('s', $num);
		$ncid->execute();
		$ncid->bind_result($counter);
		//$this->counter = $counter
		$ncid->fetch();
		$ncid->close();
		//return $this->counter;
		return $counter;
	}
}

/*
class Updater{
	public $ncquery;
	public $counter;
	function set_query($query) {
		$this->ncquery = $query;
	}			
	function give_count(){
		$ncid = $conn->prepare($this->ncquery);
		$ncid->bind_param('s', $num);
		$ncid->execute();
		$ncid->bind_result($counter);
		//$this->counter = $counter
		$ncid->fetch();
		$ncid->close();
		//return $this->counter;
		return $counter;
	}
}
*/


?>