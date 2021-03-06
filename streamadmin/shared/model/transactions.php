<?php
	// Do not edit this file, rerun gen.php to update!
	class transactions_set extends collectionSet { }
	
	class transactions extends genClass
	{
		protected $use_table = "transactions";
		protected $dataset = array(
			"id" => array("type"=>"int","value"=>null),
			"avatarlink" => array("type"=>"int","value"=>null),
			"packagelink" => array("type"=>"int","value"=>null),
			"streamlink" => array("type"=>"int","value"=>null),
			"resellerlink" => array("type"=>"int","value"=>null),
			"regionlink" => array("type"=>"int","value"=>null),
			"amount" => array("type"=>"int","value"=>null),
			"unixtime" => array("type"=>"int","value"=>null),
			"transaction_uid" => array("type"=>"str","value"=>null),
			"renew" => array("type"=>"bool","value"=>0),
		);
		public function get_avatarlink() : ?int {  return $this->get_field("avatarlink");  } 
		public function get_packagelink() : ?int {  return $this->get_field("packagelink");  } 
		public function get_streamlink() : ?int {  return $this->get_field("streamlink");  } 
		public function get_resellerlink() : ?int {  return $this->get_field("resellerlink");  } 
		public function get_regionlink() : ?int {  return $this->get_field("regionlink");  } 
		public function get_amount() : ?int {  return $this->get_field("amount");  } 
		public function get_unixtime() : ?int {  return $this->get_field("unixtime");  } 
		public function get_transaction_uid() : ?string {  return $this->get_field("transaction_uid");  } 
		public function get_renew() : ?bool {  return $this->get_field("renew");  } 
		public function set_avatarlink(?int $newvalue) : array {  return $this->update_field("avatarlink",$newvalue);  } 
		public function set_packagelink(?int $newvalue) : array {  return $this->update_field("packagelink",$newvalue);  } 
		public function set_streamlink(?int $newvalue) : array {  return $this->update_field("streamlink",$newvalue);  } 
		public function set_resellerlink(?int $newvalue) : array {  return $this->update_field("resellerlink",$newvalue);  } 
		public function set_regionlink(?int $newvalue) : array {  return $this->update_field("regionlink",$newvalue);  } 
		public function set_amount(?int $newvalue) : array {  return $this->update_field("amount",$newvalue);  } 
		public function set_unixtime(?int $newvalue) : array {  return $this->update_field("unixtime",$newvalue);  } 
		public function set_transaction_uid(?string $newvalue) : array {  return $this->update_field("transaction_uid",$newvalue);  } 
		public function set_renew(?bool $newvalue) : array {  return $this->update_field("renew",$newvalue);  } 
	}
?>