<?php
	// Do not edit this file, rerun gen.php to update!
	class r4_mail_contents_set extends collectionSet
	{
		public function get_object_by_field(string $fieldname,$value) : ?r4_mail_contents
		{
			return parent::get_object_by_field($fieldname,$value);
		}
		public function get_object_by_id($id=null) : ?r4_mail_contents
		{
			return parent::get_object_by_id($id);
		}
		public function get_first() : ?r4_mail_contents
		{
			return parent::get_first();
		}
	}

	class mail_contents extends genClass
	{
		protected $use_table = "mail_contents";
		protected $dataset = array(
			"id" => array("type"=>"int","value"=>null),
			"name" => array("type"=>"str","value"=>null),
			"contenttype" => array("type"=>"str","value"=>null),
			"lastfound" => array("type"=>"int","value"=>null),
		);
		public function get_id() : ?int
		{
			return $this->get_field("id");
		}
		public function get_name() : ?string
		{
			return $this->get_field("name");
		}
		public function get_contenttype() : ?string
		{
			return $this->get_field("contenttype");
		}
		public function get_lastfound() : ?int
		{
			return $this->get_field("lastfound");
		}
	}
?>
