<?php
	// Do not edit this file, rerun gen.php to update!
	class r4_user_items_support_set extends collectionSet
	{
		public function get_object_by_field(string $fieldname,$value) : ?r4_user_items_support
		{
			return parent::get_object_by_field($fieldname,$value);
		}
		public function get_object_by_id($id=null) : ?r4_user_items_support
		{
			return parent::get_object_by_id($id);
		}
		public function get_first() : ?r4_user_items_support
		{
			return parent::get_first();
		}
	}

	class r4_user_items_support extends genClass
	{
		protected $use_table = "user_items_support";
		protected $dataset = array(
			"id" => array("type"=>"int","value"=>null),
			"mydetails" => array("type"=>"int","value"=>0),
			"renewaccount" => array("type"=>"int","value"=>0),
		);
		public function get_id() : ?int
		{
			return $this->get_field("id");
		}
		public function get_mydetails() : ?int
		{
			return $this->get_field("mydetails");
		}
		public function get_renewaccount() : ?int
		{
			return $this->get_field("renewaccount");
		}
	}
?>
