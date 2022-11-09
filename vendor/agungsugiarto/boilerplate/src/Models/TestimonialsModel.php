<?php

namespace agungsugiarto\boilerplate\Models;
use agungsugiarto\boilerplate\Entities\MenuEntity;
use CodeIgniter\Model;
use App\Libraries\Datatable;

class TestimonialsModel extends Model
{
    function __construct()
    {
        parent::__construct();
        $this->datatable = new Datatable();
    }

    public function testimonialsListDatatable($where = null)
    {
        $this->db->table('testimonials')->where("1=1")->get();
        $sql = $this->db->getLastQuery();
        // echo $sql;
        return $this->datatable->LoadJson($sql);
    }

    public function getTestimonials($where = null)
    {
        if(!empty($where))
            return $this->db->table('testimonials')->where($where)->orderBy('date','desc')->get()->getResultArray();
        else
            return $this->db->table('testimonials')->orderBy('date','desc')->get()->getResultArray();
    }

    public function deleteTestimonials($id)
    {
       return $this->db->table('testimonials')->where("id",$id)->delete();
    }
}
