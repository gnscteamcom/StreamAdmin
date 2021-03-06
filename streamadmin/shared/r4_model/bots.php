<?php
	// Do not edit this file, rerun gen.php to update!
	class r4_bots_set extends collectionSet
	{
		public function get_object_by_field(string $fieldname,$value) : ?r4_bots
		{
			return parent::get_object_by_field($fieldname,$value);
		}
		public function get_object_by_id($id=null) : ?r4_bots
		{
			return parent::get_object_by_id($id);
		}
		public function get_first() : ?r4_bots
		{
			return parent::get_first();
		}
	}

	class r4_bots extends genClass
	{
		protected $use_table = "bots";
		protected $dataset = array(
			"id" => array("type"=>"int","value"=>null),
			"bot_description" => array("type"=>"str","value"=>null),
			"bot_enabled" => array("type"=>"bool","value"=>0),
			"bot_uuid" => array("type"=>"str","value"=>null),
			"bot_key" => array("type"=>"str","value"=>null),
			"bot_type" => array("type"=>"str","value"=>null),
			"bot_invites" => array("type"=>"int","value"=>0),
			"bot_ims" => array("type"=>"int","value"=>0),
			"bot_notecards" => array("type"=>"int","value"=>0),
			"bot_im_before" => array("type"=>"str","value"=>null),
			"bot_im_after" => array("type"=>"str","value"=>null),
		);
		public function get_id() : ?int
		{
			return $this->get_field("id");
		}
		public function get_bot_description() : ?string
		{
			return $this->get_field("bot_description");
		}
		public function get_bot_enabled() : ?bool
		{
			return $this->get_field("bot_enabled");
		}
		public function get_bot_uuid() : ?string
		{
			return $this->get_field("bot_uuid");
		}
		public function get_bot_key() : ?string
		{
			return $this->get_field("bot_key");
		}
		public function get_bot_type() : ?string
		{
			return $this->get_field("bot_type");
		}
		public function get_bot_invites() : ?int
		{
			return $this->get_field("bot_invites");
		}
		public function get_bot_ims() : ?int
		{
			return $this->get_field("bot_ims");
		}
		public function get_bot_notecards() : ?int
		{
			return $this->get_field("bot_notecards");
		}
		public function get_bot_im_before() : ?string
		{
			return $this->get_field("bot_im_before");
		}
		public function get_bot_im_after() : ?string
		{
			return $this->get_field("bot_im_after");
		}
	}
?>
