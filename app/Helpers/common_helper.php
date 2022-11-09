<?php

function getAllStoresName()
{
    $db = \Config\Database::connect();
    return $db->table('stores')->where('status = 1')->get()->getResultArray();
}

function getGeneralSetting($name)
{
    $db = \Config\Database::connect();
    $setting = $db->table('general_settings')->where("name = '$name'")->get()->getResultArray();
    if(!empty($setting))
    {
        echo $setting[0]['value'];
    }
    else
    {
        echo "";
    }
}


?>
