<?php
namespace App\Models;

use CodeIgniter\Model;

class GeneralSettingsModel extends Model
{
    public function getAllGeneralSettings($where = null)
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
}



?>