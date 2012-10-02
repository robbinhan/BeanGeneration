<?php
class Bill extends Model implements Api
{
    private $f_id = null;
    private $f_status = null;
    private $f_uid = null;
    private $f_operuid = null;
    public function  setId($id)
    {
         $this->id = $id;
    }
    public function  setStatus($status)
    {
         $this->status = $status;
    }
    public function  setUid($uid)
    {
         $this->uid = $uid;
    }
    public function  setOperuid($operuid)
    {
         $this->operuid = $operuid;
    }
    public function  getId()
    {
        return $this->id;
    }
    public function  getStatus()
    {
        return $this->status;
    }
    public function  getUid()
    {
        return $this->uid;
    }
    public function  getOperuid()
    {
        return $this->operuid;
    }
}
