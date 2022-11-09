<?php

namespace agungsugiarto\boilerplate\Models;
use agungsugiarto\boilerplate\Entities\MenuEntity;
use CodeIgniter\Model;


class HomeModel extends Model
{
    public function getAllStates()
    {
        return $this->db->table('states')->get()->getResultArray();
    }

    public function insertStore($data, $where = null)
    {
        if(empty($where))
            return $this->db->table('stores')->insert($data);
        else
            return $this->db->table('stores')->set($data)->where($where)->update();
    }
    public function insertTestimonials($data, $where = null)
    {
        if(empty($where))
            return $this->db->table('testimonials')->insert($data);
        else
            return $this->db->table('testimonials')->set($data)->where($where)->update();
    }
}
