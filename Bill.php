<?php
class Bill extends Model
{
    private $f_id = null;
    private $f_status = null;
    private $f_uid = null;
    private $f_operuid = null;
    public function  setFid($fid)
    {
         $this->fid = $fid;
    }
    public function  setFstatus($fstatus)
    {
         $this->fstatus = $fstatus;
    }
    public function  setFuid($fuid)
    {
         $this->fuid = $fuid;
    }
    public function  setFoperuid($foperuid)
    {
         $this->foperuid = $foperuid;
    }
    public function  getFid()
    {
        return $this->fid;
    }
    public function  getFstatus()
    {
        return $this->fstatus;
    }
    public function  getFuid()
    {
        return $this->fuid;
    }
    public function  getFoperuid()
    {
        return $this->foperuid;
    }
}
