<?php

include_once('item.php');
class MessageBoard{
	var $messages=array();

	function __construct(){
		$this->receiveMessage();
		$this->loadData();
		$this->showAllMessages();
		$this->showForm();
	}
	function receiveMessage(){
		if(count($_POST) != 0){
			$this->saveData(	$_POST['userName'],$_POST['content'],date("Y-m-d h:i:s",time()));
		}

		//$this->saveData();
	}
	function saveData($u,$t,$c){
			echo "userName: ".$u."<br>";
			echo "time: ".$t."<br>";
			echo "content: ".$c."<br>";
	}
	function loadData(){
		$temp=new Message("Lan","2018-1-6","Tester");
		array_push($this->messages,$temp);
	}

	function showAllMessages(){
		foreach($this->messages as $m){
			$m->show();
		}
	}

	function showForm(){
		echo "<form action='' method='POST' >";
		echo "Name:"."<input type='text' name='userName'>"."<br>";
		echo "Content: "."<input type='text' name='content'>";
		echo "<input type='submit'>";
		echo "</form>";
	}

}
$mb= new MessageBoard();
?>