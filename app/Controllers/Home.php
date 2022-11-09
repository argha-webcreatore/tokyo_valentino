<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\HomeModel;
use App\Models\GeneralSettingsModel;

class Home extends BaseController
{
	public function __construct(){
		$this->homeModel = new HomeModel();
		$this->generalSettingsModel = new GeneralSettingsModel();
	}
	public function index()
	{
		$testiMonials = $this->homeModel->getAllTestiMonials();
		$stores = $this->homeModel->getAllStores();
		$general_settings_where = "name IN ('about_video','about_description')";
		$general_settings = $this->generalSettingsModel->getAllGeneralSettings($general_settings_where);
		$data['testimonials'] = $testiMonials;
		$data['stores'] = $stores;
		$data['about_video'] = "";
		$data['about_description'] = "";

		for($i = 0; $i < count($general_settings); $i++)
		{
			if($general_settings[$i]['name'] == "about_video")
			{
				$data['about_video'] = $general_settings[$i]['value'];
			}

			if($general_settings[$i]['name'] == "about_description")
			{
				$data['about_description'] = $general_settings[$i]['value'];
			}
		}
		return view('home',$data);
	}
}
