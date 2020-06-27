<?php
	// Do not edit this file, rerun gen.php to update!
	class slconfig_set extends collectionSet
	{
		public function get_object_by_field(string $fieldname,$value) : ?slconfig
		{
			return parent::get_object_by_field($fieldname,$value);
		}
		public function get_object_by_id($id=null) : ?slconfig
		{
			return parent::get_object_by_id($id);
		}
		public function get_first() : ?slconfig
		{
			return parent::get_first();
		}
	}
	
	class slconfig extends genClass
	{
		protected $use_table = "slconfig";
		protected $dataset = array(
			"id" => array("type"=>"int","value"=>null),
			"db_version" => array("type"=>"str","value"=>"'install'"),
			"new_resellers" => array("type"=>"bool","value"=>0),
			"new_resellers_rate" => array("type"=>"int","value"=>0),
			"sllinkcode" => array("type"=>"str","value"=>null),
			"publiclinkcode" => array("type"=>"str","value"=>null),
			"owner_av" => array("type"=>"int","value"=>null),
			"eventstorage" => array("type"=>"bool","value"=>0),
			"http_inbound_secret" => array("type"=>"str","value"=>null),
			"smtp_host" => array("type"=>"str","value"=>null),
			"smtp_port" => array("type"=>"int","value"=>null),
			"smtp_username" => array("type"=>"str","value"=>null),
			"smtp_accesscode" => array("type"=>"str","value"=>null),
			"smtp_from" => array("type"=>"str","value"=>null),
			"smtp_replyto" => array("type"=>"str","value"=>null),
		);
		public function get_id() : ?int
		{
			return $this->get_field("id");
		}
		public function get_db_version() : ?string
		{
			return $this->get_field("db_version");
		}
		public function get_new_resellers() : ?bool
		{
			return $this->get_field("new_resellers");
		}
		public function get_new_resellers_rate() : ?int
		{
			return $this->get_field("new_resellers_rate");
		}
		public function get_sllinkcode() : ?string
		{
			return $this->get_field("sllinkcode");
		}
		public function get_publiclinkcode() : ?string
		{
			return $this->get_field("publiclinkcode");
		}
		public function get_owner_av() : ?int
		{
			return $this->get_field("owner_av");
		}
		public function get_eventstorage() : ?bool
		{
			return $this->get_field("eventstorage");
		}
		public function get_http_inbound_secret() : ?string
		{
			return $this->get_field("http_inbound_secret");
		}
		public function get_smtp_host() : ?string
		{
			return $this->get_field("smtp_host");
		}
		public function get_smtp_port() : ?int
		{
			return $this->get_field("smtp_port");
		}
		public function get_smtp_username() : ?string
		{
			return $this->get_field("smtp_username");
		}
		public function get_smtp_accesscode() : ?string
		{
			return $this->get_field("smtp_accesscode");
		}
		public function get_smtp_from() : ?string
		{
			return $this->get_field("smtp_from");
		}
		public function get_smtp_replyto() : ?string
		{
			return $this->get_field("smtp_replyto");
		}
	}
?>