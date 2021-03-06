<?php
	// Do not edit this file, rerun gen.php to update!
	class r4_items_set extends collectionSet
	{
		public function get_object_by_field(string $fieldname,$value) : ?r4_items
		{
			return parent::get_object_by_field($fieldname,$value);
		}
		public function get_object_by_id($id=null) : ?r4_items
		{
			return parent::get_object_by_id($id);
		}
		public function get_first() : ?r4_items
		{
			return parent::get_first();
		}
	}

	class r4_items extends genClass
	{
		protected $use_table = "items";
		protected $dataset = array(
			"id" => array("type"=>"int","value"=>null),
			"packageid" => array("type"=>"int","value"=>null),
			"sold" => array("type"=>"int","value"=>0),
			"streamurl" => array("type"=>"str","value"=>null),
			"streamport" => array("type"=>"str","value"=>null),
			"streampassword" => array("type"=>"str","value"=>null),
			"baditem" => array("type"=>"int","value"=>0),
			"adminurl" => array("type"=>"str","value"=>null),
			"adminusername" => array("type"=>"str","value"=>null),
			"adminpassword" => array("type"=>"str","value"=>null),
			"serverlocid" => array("type"=>"int","value"=>1),
			"addon1" => array("type"=>"str","value"=>null),
			"addon2" => array("type"=>"str","value"=>null),
			"addon3" => array("type"=>"str","value"=>null),
			"addon4" => array("type"=>"str","value"=>null),
		);
		public function get_id() : ?int
		{
			return $this->get_field("id");
		}
		public function get_packageid() : ?int
		{
			return $this->get_field("packageid");
		}
		public function get_sold() : ?int
		{
			return $this->get_field("sold");
		}
		public function get_streamurl() : ?string
		{
			return $this->get_field("streamurl");
		}
		public function get_streamport() : ?string
		{
			return $this->get_field("streamport");
		}
		public function get_streampassword() : ?string
		{
			return $this->get_field("streampassword");
		}
		public function get_baditem() : ?int
		{
			return $this->get_field("baditem");
		}
		public function get_adminurl() : ?string
		{
			return $this->get_field("adminurl");
		}
		public function get_adminusername() : ?string
		{
			return $this->get_field("adminusername");
		}
		public function get_adminpassword() : ?string
		{
			return $this->get_field("adminpassword");
		}
		public function get_serverlocid() : ?int
		{
			return $this->get_field("serverlocid");
		}
		public function get_addon1() : ?string
		{
			return $this->get_field("addon1");
		}
		public function get_addon2() : ?string
		{
			return $this->get_field("addon2");
		}
		public function get_addon3() : ?string
		{
			return $this->get_field("addon3");
		}
		public function get_addon4() : ?string
		{
			return $this->get_field("addon4");
		}
	}
?>
