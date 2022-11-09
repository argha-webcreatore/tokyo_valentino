<?php

namespace agungsugiarto\boilerplate\Controllers;

/**
 * Class DashboardController.
 */
use agungsugiarto\boilerplate\Models\GeneralSettingsModel;
class ContactUsController extends BaseController
{
    function __construct()
    {
        $this->generalSettings = new GeneralSettingsModel();
    }
    public function index()
    {
        if($this->request->getPost())
        {
            $updateArray = array();
            $i = 0;
            if(!empty($this->request->getPost('address')))
            {
                $updateArray[$i]['name'] = "contact_us_address";
                $updateArray[$i]['value'] = $this->request->getPost('address');
                $i++;
            }
            if(!empty($this->request->getPost('email')))
            {
                $updateArray[$i]['name'] = "contact_us_email";
                $updateArray[$i]['value'] = $this->request->getPost('email');
                $i++;
            }
            if(!empty($this->request->getPost('telephone')))
            {
                $updateArray[$i]['name'] = "contact_us_telephone";
                $updateArray[$i]['value'] = $this->request->getPost('telephone');
                $i++;
            }
            if(!empty($this->request->getPost('store_hours')))
            {
                $updateArray[$i]['name'] = "contact_us_store_hours";
                $updateArray[$i]['value'] = $this->request->getPost('store_hours');
                $i++;
            }
            if(!empty($this->request->getPost('gmap')))
            {
                $updateArray[$i]['name'] = "contact_us_gmap";
                $updateArray[$i]['value'] = $this->request->getPost('gmap');
                $i++;
            }

            $this->generalSettings->updateBulkSettings($updateArray);
            return redirect()->to('admin/contact_us')->with('sweet-success', 'Contact us updated successfully');
        }
        $contactUsWhere = "name IN ('contact_us_address','contact_us_telephone','contact_us_email','contact_us_store_hours','contact_us_store_hours','contact_us_gmap')";
        $contactUsResponse = $this->generalSettings->getSettings($contactUsWhere);
        
        $data['contact_us_address'] = "";
        $data['contact_us_telephone'] = "";
        $data['contact_us_email'] = "";
        $data['contact_us_store_hours'] = "";
        $data['contact_us_gmap'] = "";


        if(!empty($contactUsResponse))
        {
            $totalArrayLength = count($contactUsResponse);
            for($i = 0; $i < $totalArrayLength; $i++)
            {
                if($contactUsResponse[$i]['name'] == "contact_us_address")
                {
                    $data['contact_us_address'] = $contactUsResponse[$i]['value'];
                }
                if($contactUsResponse[$i]['name'] == "contact_us_telephone")
                {
                    $data['contact_us_telephone'] = $contactUsResponse[$i]['value'];
                }
                if($contactUsResponse[$i]['name'] == "contact_us_email")
                {
                    $data['contact_us_email'] = $contactUsResponse[$i]['value'];
                }
                if($contactUsResponse[$i]['name'] == "contact_us_store_hours")
                {
                    $data['contact_us_store_hours'] = $contactUsResponse[$i]['value'];
                }
                if($contactUsResponse[$i]['name'] == "contact_us_gmap")
                {
                    $data['contact_us_gmap'] = $contactUsResponse[$i]['value'];
                }
            }
        }

        $data['title'] = 'Contact us';

        return view('agungsugiarto\boilerplate\Views\Contact\index', $data);
    }
}
