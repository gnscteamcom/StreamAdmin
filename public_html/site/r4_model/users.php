<?php
	// Do not edit this file, rerun gen.php to update!
	class r4_users_set extends collectionSet
	{
		public function get_object_by_field(string $fieldname,$value) : ?r4_users
		{
			return parent::get_object_by_field($fieldname,$value);
		}
		public function get_object_by_id($id=null) : ?r4_users
		{
			return parent::get_object_by_id($id);
		}
		public function get_first() : ?r4_users
		{
			return parent::get_first();
		}
	}

	class r4_users extends genClass
	{
		protected $use_table = "users";
		protected $dataset = array(
			"id" => array("type"=>"int","value"=>null),
			"itemid" => array("type"=>"int","value"=>null),
			"slkey" => array("type"=>"str","value"=>null),
			"slname" => array("type"=>"str","value"=>null),
			"buyfromboxkey" => array("type"=>"str","value"=>null),
			"venderlanddetail" => array("type"=>"str","value"=>null),
			"noticesent" => array("type"=>"int","value"=>6),
			"notes" => array("type"=>"str","value"=>null),
			"expireunix" => array("type"=>"int","value"=>0),
			"packageid" => array("type"=>"int","value"=>0),
			"locktoreseller" => array("type"=>"int","value"=>0),
		);
		public function get_id() : ?int
		{
			return $this->get_field("id");
		}
		public function get_itemid() : ?int
		{
			return $this->get_field("itemid");
		}
		public function get_slkey() : ?string
		{
			return $this->get_field("slkey");
		}
		public function get_slname() : ?string
		{
			return $this->get_field("slname");
		}
		public function get_buyfromboxkey() : ?string
		{
			return $this->get_field("buyfromboxkey");
		}
		public function get_venderlanddetail() : ?string
		{
			return $this->get_field("venderlanddetail");
		}
		public function get_noticesent() : ?int
		{
			return $this->get_field("noticesent");
		}
		public function get_notes() : ?string
		{
			return $this->get_field("notes");
		}
		public function get_expireunix() : ?int
		{
			return $this->get_field("expireunix");
		}
		public function get_packageid() : ?int
		{
			return $this->get_field("packageid");
		}
		public function get_locktoreseller() : ?int
		{
			return $this->get_field("locktoreseller");
		}
	}
?>
