<?php
namespace App\Models;

use CodeIgniter\Model;

class HomeModel extends Model
{
    public function getAllTestiMonials()
    {
        return $this->db->table('testimonials')->get()->getResultArray();
    }
    public function getAllStores()
    {
        return $this->db->table('stores')->where("status = 1")->get()->getResultArray();
    }
}



?>