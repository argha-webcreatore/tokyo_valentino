<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\GeneralSettingsModel;

class ContactUs extends BaseController
{

    public function __construct()
    {
        $this->generalSettingsModel = new GeneralSettingsModel();
    }
	public function index()
	{
        $reponse = $this->generalSettingsModel->getAllGeneralSettings();
        $data['address'] = '';
        $data['telephone'] = '';
        $data['email'] = '';
        $data['store_hours'] = '';
        $data['gmap'] = '';
        if(!empty($reponse))
        {
            $totalArrayLength = count($reponse);
            for($i = 0; $i < $totalArrayLength; $i++)
            {
                if($reponse[$i]['name'] == "contact_us_address")
                {
                    $data['address'] = $reponse[$i]['value'];
                }
                if($reponse[$i]['name'] == "contact_us_telephone")
                {
                    $data['telephone'] = $reponse[$i]['value'];
                }
                if($reponse[$i]['name'] == "contact_us_email")
                {
                    $data['email'] = $reponse[$i]['value'];
                }
                if($reponse[$i]['name'] == "contact_us_store_hours")
                {
                    $data['store_hours'] = $reponse[$i]['value'];
                }
                if($reponse[$i]['name'] == "contact_us_gmap")
                {
                    $data['gmap'] = $reponse[$i]['value'];
                }
            }
        }
		return view('contact', $data);
	}
}
