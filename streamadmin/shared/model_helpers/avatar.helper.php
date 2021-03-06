<?php
class avatar_helper
{
    protected $avatar = null;
    function get_avatar() : avatar
    {
        return $this->avatar;
    }
    function load_or_create(string $avatar_uuid,string $avatar_name,bool $show_errors=false) : bool
    {
        $this->avatar = new avatar();
        if(strlen($avatar_uuid) == 36)
        {
            if($this->avatar->load_by_field("avataruuid",$avatar_uuid) == true)
            {
                return true;
            }
            else
            {
                $this->avatar = new avatar();
                $uid = $this->avatar->create_uid("avatar_uid",8,10);
                if($uid["status"] == true)
                {
                    $this->avatar->set_avatar_uid($uid["uid"]);
                    $this->avatar->set_avatarname($avatar_name);
                    $this->avatar->set_avataruuid($avatar_uuid);
                    $create_status = $this->avatar->create_entry();
                    if($create_status["status"] == false)
                    {
                        if($show_errors == true) echo "[Avatar Helper] -> as unable to create avatar because:".$create_status["message"];
                    }
                    return $create_status["status"];
                }
                else
                {
                    if($show_errors == true) echo "[Avatar Helper] -> Unable to create UID";
                }
            }
        }
        else
        {
            if($show_errors == true) echo "[Avatar Helper] -> UUID not vaild";
        }
        return false;
    }
}
?>
