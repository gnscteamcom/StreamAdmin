<?php
	// Do not edit this file, rerun gen.php to update!
	class notecards_out_set extends collectionSet
	{
		public function get_object_by_field(string $fieldname,$value) : ?notecards_out
		{
			return parent::get_object_by_field($fieldname,$value);
		}
		public function get_object_by_id($id=null) : ?notecards_out
		{
			return parent::get_object_by_id($id);
		}
		public function get_first() : ?notecards_out
		{
			return parent::get_first();
		}
	}
	
	class notecards_out extends genClass
	{
		protected $use_table = "notecards_out";
		protected $dataset = array(
			"id" => array("type"=>"int","value"=>null),
			"touuid" => array("type"=>"str","value"=>null),
			"toname" => array("type"=>"str","value"=>null),
			"namenotecard" => array("type"=>"str","value"=>null),
			"notecardtext" => array("type"=>"str","value"=>null),
		);
		public function get_id() : ?int
		{
			return $this->get_field("id");
		}
		public function get_touuid() : ?string
		{
			return $this->get_field("touuid");
		}
		public function get_toname() : ?string
		{
			return $this->get_field("toname");
		}
		public function get_namenotecard() : ?string
		{
			return $this->get_field("namenotecard");
		}
		public function get_notecardtext() : ?string
		{
			return $this->get_field("notecardtext");
		}
	}
?>