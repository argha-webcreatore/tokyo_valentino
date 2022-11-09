<?php

namespace agungsugiarto\boilerplate\Models;
use agungsugiarto\boilerplate\Entities\MenuEntity;
use CodeIgniter\Model;
use App\Libraries\Datatable;

class StoreModel extends Model
{
    function __construct()
    {
        parent::__construct();
        $this->datatable = new Datatable();
    }

    public function storeListDatatable($where = null)
    {
        $this->db->table('stores')->where("1=1")->get();
        $sql = $this->db->getLastQuery();
        return $this->datatable->LoadJson($sql);
    }

    public function getStore($where = null)
    {
        if(!empty($where))
            return $this->db->table('stores')->where($where)->orderBy('date','desc')->get()->getResultArray();
        else
            return $this->db->table('stores')->orderBy('date','desc')->get()->getResultArray();
    }

    public function deleteStore($id)
    {
       return $this->db->table('stores')->where("id",$id)->delete();
    }
}
