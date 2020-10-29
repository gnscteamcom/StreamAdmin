<?php
	// Do not edit this file, rerun gen.php to update!
	class notice_notecard_set extends collectionSet { }
	
	class notice_notecard extends genClass
	{
		protected $use_table = "notice_notecard";
		protected $dataset = array(
			"id" => array("type"=>"int","value"=>null),
			"name" => array("type"=>"str","value"=>null),
			"missing" => array("type"=>"bool","value"=>0),
		);
		public function get_name() : ?string {  return $this->get_field("name");  } 
		public function get_missing() : ?bool {  return $this->get_field("missing");  } 
		public function set_name(?string $newvalue) : array {  return $this->update_field("name",$newvalue);  } 
		public function set_missing(?bool $newvalue) : array {  return $this->update_field("missing",$newvalue);  } 
	}
?>