<?php
	// Do not edit this file, rerun gen.php to update!
	class syslogs_set extends collectionSet
	{
		public function get_object_by_field(string $fieldname,$value) : ?syslogs
		{
			return parent::get_object_by_field($fieldname,$value);
		}
		public function get_object_by_id($id=null) : ?syslogs
		{
			return parent::get_object_by_id($id);
		}
		public function get_first() : ?syslogs
		{
			return parent::get_first();
		}
	}
	
	class syslogs extends genClass
	{
		protected $use_table = "syslogs";
		protected $dataset = array(
			"id" => array("type"=>"int","value"=>null),
			"date" => array("type"=>"str","value"=>null),
			"time" => array("type"=>"str","value"=>null),
			"title" => array("type"=>"str","value"=>null),
			"message" => array("type"=>"str","value"=>null),
		);
		public function get_id() : ?int
		{
			return $this->get_field("id");
		}
		public function get_date() : ?string
		{
			return $this->get_field("date");
		}
		public function get_time() : ?string
		{
			return $this->get_field("time");
		}
		public function get_title() : ?string
		{
			return $this->get_field("title");
		}
		public function get_message() : ?string
		{
			return $this->get_field("message");
		}
	}
?>