<?php

namespace agungsugiarto\boilerplate\Models;
use agungsugiarto\boilerplate\Entities\MenuEntity;
use CodeIgniter\Model;
use App\Libraries\Datatable;

class GeneralSettingsModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function updateSetting($data, $where)
    {
        return $this->db->table('general_settings')->set($data)->where($where)->update();
        
    }

    public function getSettings($where)
    {
        if(!empty($where))
        {
            return $this->db->table('general_settings')->where($where)->get()->getResultArray();
        }
        else
        {
            return $this->db->table('general_settings')->get()->getResultArray();
        }
    }

    public function updateBulkSettings($data)
    {
        if(!empty($data))
        {
            $totalData = count($data);
            for($i = 0; $i < $totalData; $i++)
            {
                $tempWhere = array();
                $tempWhere['name'] = $data[$i]['name'];
                $tempData['value'] = $data[$i]['value'];

                $this->updateSetting($tempData, $tempWhere);
            }
        }
    }
}
