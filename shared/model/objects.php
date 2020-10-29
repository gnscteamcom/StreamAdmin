<?php
	// Do not edit this file, rerun gen.php to update!
	class objects_set extends collectionSet { }
	
	class objects extends genClass
	{
		protected $use_table = "objects";
		protected $dataset = array(
			"id" => array("type"=>"int","value"=>null),
			"avatarlink" => array("type"=>"int","value"=>null),
			"regionlink" => array("type"=>"int","value"=>null),
			"objectuuid" => array("type"=>"str","value"=>null),
			"objectname" => array("type"=>"str","value"=>null),
			"objectmode" => array("type"=>"str","value"=>null),
			"objectxyz" => array("type"=>"str","value"=>null),
			"lastseen" => array("type"=>"int","value"=>0),
		);
		public function get_avatarlink() : ?int {  return $this->get_field("avatarlink");  } 
		public function get_regionlink() : ?int {  return $this->get_field("regionlink");  } 
		public function get_objectuuid() : ?string {  return $this->get_field("objectuuid");  } 
		public function get_objectname() : ?string {  return $this->get_field("objectname");  } 
		public function get_objectmode() : ?string {  return $this->get_field("objectmode");  } 
		public function get_objectxyz() : ?string {  return $this->get_field("objectxyz");  } 
		public function get_lastseen() : ?int {  return $this->get_field("lastseen");  } 
		public function set_avatarlink(?int $newvalue) : array {  return $this->update_field("avatarlink",$newvalue);  } 
		public function set_regionlink(?int $newvalue) : array {  return $this->update_field("regionlink",$newvalue);  } 
		public function set_objectuuid(?string $newvalue) : array {  return $this->update_field("objectuuid",$newvalue);  } 
		public function set_objectname(?string $newvalue) : array {  return $this->update_field("objectname",$newvalue);  } 
		public function set_objectmode(?string $newvalue) : array {  return $this->update_field("objectmode",$newvalue);  } 
		public function set_objectxyz(?string $newvalue) : array {  return $this->update_field("objectxyz",$newvalue);  } 
		public function set_lastseen(?int $newvalue) : array {  return $this->update_field("lastseen",$newvalue);  } 
	}
?>