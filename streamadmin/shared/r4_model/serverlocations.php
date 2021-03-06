<?php
	// Do not edit this file, rerun gen.php to update!
	class r4_serverlocations_set extends collectionSet
	{
		public function get_object_by_field(string $fieldname,$value) : ?r4_serverlocations
		{
			return parent::get_object_by_field($fieldname,$value);
		}
		public function get_object_by_id($id=null) : ?r4_serverlocations
		{
			return parent::get_object_by_id($id);
		}
		public function get_first() : ?r4_serverlocations
		{
			return parent::get_first();
		}
	}

	class r4_serverlocations extends genClass
	{
		protected $use_table = "serverlocations";
		protected $dataset = array(
			"id" => array("type"=>"int","value"=>null),
			"name" => array("type"=>"str","value"=>null),
		);
		public function get_id() : ?int
		{
			return $this->get_field("id");
		}
		public function get_name() : ?string
		{
			return $this->get_field("name");
		}
	}
?>
