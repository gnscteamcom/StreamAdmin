<?php
	// Do not edit this file, rerun gen.php to update!
	class stream_set extends collectionSet { }
	
	class stream extends genClass
	{
		protected $use_table = "stream";
		protected $dataset = array(
			"id" => array("type"=>"int","value"=>null),
			"serverlink" => array("type"=>"int","value"=>null),
			"rentallink" => array("type"=>"int","value"=>null),
			"packagelink" => array("type"=>"int","value"=>null),
			"port" => array("type"=>"int","value"=>null),
			"needwork" => array("type"=>"bool","value"=>0),
			"original_adminusername" => array("type"=>"str","value"=>null),
			"adminusername" => array("type"=>"str","value"=>null),
			"adminpassword" => array("type"=>"str","value"=>null),
			"djpassword" => array("type"=>"str","value"=>null),
			"stream_uid" => array("type"=>"str","value"=>null),
			"mountpoint" => array("type"=>"str","value"=>null),
			"last_api_sync" => array("type"=>"int","value"=>0),
			"api_uid" => array("type"=>"str","value"=>null),
		);
		public function get_serverlink() : ?int {  return $this->get_field("serverlink");  } 
		public function get_rentallink() : ?int {  return $this->get_field("rentallink");  } 
		public function get_packagelink() : ?int {  return $this->get_field("packagelink");  } 
		public function get_port() : ?int {  return $this->get_field("port");  } 
		public function get_needwork() : ?bool {  return $this->get_field("needwork");  } 
		public function get_original_adminusername() : ?string {  return $this->get_field("original_adminusername");  } 
		public function get_adminusername() : ?string {  return $this->get_field("adminusername");  } 
		public function get_adminpassword() : ?string {  return $this->get_field("adminpassword");  } 
		public function get_djpassword() : ?string {  return $this->get_field("djpassword");  } 
		public function get_stream_uid() : ?string {  return $this->get_field("stream_uid");  } 
		public function get_mountpoint() : ?string {  return $this->get_field("mountpoint");  } 
		public function get_last_api_sync() : ?int {  return $this->get_field("last_api_sync");  } 
		public function get_api_uid() : ?string {  return $this->get_field("api_uid");  } 
		public function set_serverlink(?int $newvalue) : array {  return $this->update_field("serverlink",$newvalue);  } 
		public function set_rentallink(?int $newvalue) : array {  return $this->update_field("rentallink",$newvalue);  } 
		public function set_packagelink(?int $newvalue) : array {  return $this->update_field("packagelink",$newvalue);  } 
		public function set_port(?int $newvalue) : array {  return $this->update_field("port",$newvalue);  } 
		public function set_needwork(?bool $newvalue) : array {  return $this->update_field("needwork",$newvalue);  } 
		public function set_original_adminusername(?string $newvalue) : array {  return $this->update_field("original_adminusername",$newvalue);  } 
		public function set_adminusername(?string $newvalue) : array {  return $this->update_field("adminusername",$newvalue);  } 
		public function set_adminpassword(?string $newvalue) : array {  return $this->update_field("adminpassword",$newvalue);  } 
		public function set_djpassword(?string $newvalue) : array {  return $this->update_field("djpassword",$newvalue);  } 
		public function set_stream_uid(?string $newvalue) : array {  return $this->update_field("stream_uid",$newvalue);  } 
		public function set_mountpoint(?string $newvalue) : array {  return $this->update_field("mountpoint",$newvalue);  } 
		public function set_last_api_sync(?int $newvalue) : array {  return $this->update_field("last_api_sync",$newvalue);  } 
		public function set_api_uid(?string $newvalue) : array {  return $this->update_field("api_uid",$newvalue);  } 
	}
?>