<?php

namespace agungsugiarto\boilerplate\Controllers;

use agungsugiarto\boilerplate\Models\GeneralSettingsModel;
use agungsugiarto\boilerplate\Models\HomeModel;
use CodeIgniter\Files\File;
use agungsugiarto\boilerplate\Models\StoreModel;
use agungsugiarto\boilerplate\Models\TestimonialsModel;
/**
 * Class DashboardController.
 */
class Home extends BaseController
{
    function __construct()
    {
        $this->homeModel = new HomeModel();
        $this->storeModel = new StoreModel();
        $this->testimonialsModel = new TestimonialsModel();
        $this->generalSettings = new GeneralSettingsModel();
    }
    public function banner_images()
    {
        $data = [
            'title' => 'Banner Images',
        ];

        return view('agungsugiarto\boilerplate\Views\Home\bannerImages', $data);
    }

    public function stores()
    {
        $data = [
            'title' => 'Stores',
        ];
        return view('agungsugiarto\boilerplate\Views\Home\stores\list', $data);
    }
    public function testimonials()
    {
        $data = [
            'title' => 'Testimonials',
        ];
        return view('agungsugiarto\boilerplate\Views\Home\testimonials\list', $data);
    }

    public function storeDatatable()
    {
        $records = $this->storeModel->storeListDatatable();
        $data = array();
		$count=0;
		foreach ($records['data']  as $row) 
		{
            $img = base_url('uploads/storeImages/'.$row['image']);
            $checked = ($row['status'] == 1) ? "checked=''" : "";
			$data[]= array(
				++$count,
				'<img width="100" src="'.$img.'" class="img-fluid"/>',
				$row['name'],
				$row['address'],
				$row['contact'],
				(strlen($row['description']) > 100) ? substr($row['description'],0,100)."..." : $row['description'],
                '<div class="custom-control custom-switch">
                    <input type="checkbox" onchange="changeStoreStatus('.$row['id'].','.$row['status'].')" '.$checked.' class="custom-control-input" id="store_'.$row['id'].'">
                    <label class="custom-control-label" for="store_'.$row['id'].'"></label>
                </div>',
                '<a title="Edit" href="'.base_url('admin/home/stores/edit/'.$row['id']).'" class="btn-product-details btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>',
                '<button title="Delete" onClick = "deleteStore('.$row['id'].')" class="btn-product-details btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>'
			);
		}
		$records['data']=$data;
		echo json_encode($records);	
    }
    public function testimonialsDatatable()
    {
        $records = $this->testimonialsModel->testimonialsListDatatable();
        $data = array();
		$count=0;
		foreach ($records['data']  as $row) 
		{
            $img = base_url('uploads/testiMonialsImages/'.$row['image']);
			$data[]= array(
				++$count,
				'<img width="100" src="'.$img.'" class="img-fluid"/>',
				$row['name'],
				$row['location'],
				(strlen($row['description']) > 100) ? substr($row['description'],0,100)."..." : $row['description'],
                '<a title="Edit" href="'.base_url('admin/home/testimonials/edit/'.$row['id']).'" class="btn-product-details btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>',
                '<button title="Delete" onClick = "deleteTestimonial('.$row['id'].')" class="btn-product-details btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>'
			);
		}
		$records['data']=$data;
		echo json_encode($records);
    }

    public function add_store()
    {
        $data = [
            'title' => 'Add Store',
        ];

        if($this->request->getPost())
        {
            $postValidation = [
                'store_name' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Store name is required.'
                    ]
                ],
                'store_address' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Store address is required.'
                    ]
                ],
                'store_contact' => [
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => 'Store contact is required.',
                        'numeric' => 'This field must be a number.'
                    ]
                ],
                'store_description' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Store description is required.'
                    ]
                ],
                'file' => [
                    'label' => 'Store Image',
                    'rules' => 'uploaded[file]'
                        . '|is_image[file]'
                        . '|mime_in[file,image/jpg,image/jpeg,image/png]'
                ]
            ];
            if(!$this->validate($postValidation))
            {
                return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
            }
            $newFileName = "";
            if($this->request->getFile('file'))
            {
                $file = $this->request->getFile('file');
                $newFileName = $file->getRandomName();
                $file->move('uploads/storeImages', $newFileName);
            }
            $postData = $this->request->getPost();
            $insertData = array();
            $insertData['name'] = $this->request->getPost('store_name');
            $insertData['address'] = $this->request->getPost('store_address');
            $insertData['contact'] = $this->request->getPost('store_contact');
            $insertData['slug'] = $this->slugify($this->request->getPost('store_name'));
            $insertData['description'] = $this->slugify($this->request->getPost('store_description'));
            $insertData['image'] = $newFileName;
            if($this->homeModel->insertStore($insertData))
            {
                return redirect()->to('admin/home/stores')->with('sweet-success', 'Store added successfully');
            }
            else
            {
                return redirect()->back()->withInput('sweet-error', 'Unable to add the store');
            }
            
        }
        else
        {
            $data['states'] = $this->homeModel->getAllStates();
            return view('agungsugiarto\boilerplate\Views\Home\stores\add', $data);
        }
        
    }
    public function add_testimonials()
    {
        $data = [
            'title' => 'Add Testimonials',
        ];

        if($this->request->getPost())
        {
            $postValidation = [
                'name' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Name is required.'
                    ]
                ],
                'location' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Location is required.'
                    ]
                ],
                'description' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Description is required.'
                    ]
                ],
                'file' => [
                    'label' => 'Image',
                    'rules' => 'uploaded[file]'
                        . '|is_image[file]'
                        . '|mime_in[file,image/jpg,image/jpeg,image/png]'
                ]
            ];
            if(!$this->validate($postValidation))
            {
                return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
            }
            $newFileName = "";
            if($this->request->getFile('file'))
            {
                $file = $this->request->getFile('file');
                $newFileName = $file->getRandomName();
                $file->move('uploads/testiMonialsImages', $newFileName);
            }
            $postData = $this->request->getPost();
            $insertData = array();
            $insertData['name'] = $this->request->getPost('name');
            $insertData['location'] = $this->request->getPost('location');
            $insertData['description'] = $this->request->getPost('description');
            $insertData['image'] = $newFileName;
            if($this->homeModel->insertTestimonials($insertData))
            {
                return redirect()->to('admin/home/testimonials')->with('sweet-success', 'Testimonial added successfully');
            }
            else
            {
                return redirect()->back()->withInput('sweet-error', 'Unable to add the testimonial');
            }
            
        }
        else
        {
            return view('agungsugiarto\boilerplate\Views\Home\testimonials\add', $data);
        }
    }

    public function edit_store($id)
    {
        if(!empty($id))
        {
            if($this->request->getPost())
            {
                $insertData = array();
                $postValidation = [
                    'store_name' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Store name is required.'
                        ]
                    ],
                    'store_address' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Store address is required.'
                        ]
                    ],
                    'store_contact' => [
                        'rules' => 'required|numeric',
                        'errors' => [
                            'required' => 'Store contact is required.',
                            'numeric' => 'This field must be a number.'
                        ]
                    ],
                    'store_description' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Store description is required.'
                        ]
                    ],
                ];
                if(!$this->validate($postValidation))
                {
                    return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
                }
                $newFileName = "";
                if(!empty($_FILES['file']['name']))
                {
                    $fileValidationRule = [
                        'file' => [
                            'label' => 'Store Image',
                            'rules' => 'uploaded[file]'
                                . '|is_image[file]'
                                . '|mime_in[file,image/jpg,image/jpeg,image/png]'
                        ]
                    ];
                    if(!$this->validate($fileValidationRule))
                    {
                        return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
                    }
                    else
                    {
                        $file = $this->request->getFile('file');
                        $newFileName = $file->getRandomName();
                        $file->move('uploads/storeImages', $newFileName);
                        $insertData['image'] = $newFileName;
                    }
                }
                $postData = $this->request->getPost();
                
                $insertData['name'] = $this->request->getPost('store_name');
                $insertData['address'] = $this->request->getPost('store_address');
                $insertData['contact'] = $this->request->getPost('store_contact');
                $insertData['slug'] = $this->slugify($this->request->getPost('store_name'));
                $insertData['description'] = $this->slugify($this->request->getPost('store_description'));
                $where = array(
                    'id' => $id
                );
                if($this->homeModel->insertStore($insertData, $where))
                {
                    return redirect()->to('admin/home/stores')->with('sweet-success', 'Store updated successfully');
                }
                else
                {
                    return redirect()->back()->withInput('sweet-error', 'Unable to add the store');
                }
                
            }
            else
            {
                $where = array(
                    "id" => $id
                );
                $store = $this->storeModel->getStore($where);
                if(!empty($store))
                {
                    $data = [
                        'title' => 'Update Store',
                        'store' => $store[0]
                    ];
                    return view('agungsugiarto\boilerplate\Views\Home\stores\edit', $data);
                }
                else
                {
                    return redirect()->back()->with('sweet-error', "Store not found.");
                }
            }
            
        }
    }
    public function edit_testimonials($id)
    {
        $data = [
            'title' => 'Update Testimonial',
        ];

        if($this->request->getPost())
        {
            $insertData = array();
            $postValidation = [
                'name' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Name is required.'
                    ]
                ],
                'location' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Location is required.'
                    ]
                ],
                'description' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Description is required.'
                    ]
                ]
            ];
            if(!$this->validate($postValidation))
            {
                return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
            }
            $newFileName = "";
            if(!empty($_FILES['file']['name']))
            {
                $fileValidationRule = [
                    'file' => [
                        'label' => 'Image',
                        'rules' => 'uploaded[file]'
                            . '|is_image[file]'
                            . '|mime_in[file,image/jpg,image/jpeg,image/png]'
                    ]
                ];
                if(!$this->validate($fileValidationRule))
                {
                    return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
                }
                else
                {
                    $file = $this->request->getFile('file');
                    $newFileName = $file->getRandomName();
                    $file->move('uploads/testiMonialsImages', $newFileName);
                    $insertData['image'] = $newFileName;
                }
            }
            $postData = $this->request->getPost();
            
            $insertData['name'] = $this->request->getPost('name');
            $insertData['location'] = $this->request->getPost('location');
            $insertData['description'] = $this->request->getPost('description');
            $where = array(
                'id' => $id
            );
            if($this->homeModel->insertTestimonials($insertData,$where))
            {
                return redirect()->to('admin/home/testimonials')->with('sweet-success', 'Testimonial updated successfully');
            }
            else
            {
                return redirect()->back()->withInput('sweet-error', 'Unable to add the testimonial');
            }
            
        }
        else
        {
            $where = array(
                "id" => $id
            );
            $testimonial = $this->testimonialsModel->getTestimonials($where);
            if(!empty($testimonial))
            {
                $data = [
                    'title' => 'Update Testimonial',
                    'testimonial' => $testimonial[0]
                ];
                return view('agungsugiarto\boilerplate\Views\Home\testimonials\edit', $data);
            }
            else
            {
                return redirect()->back()->with('sweet-error', "Testimonial not found.");
            }
        }
    }



    public function updateStore()
    {
        if($this->request->getPost())
        {
            $data = $this->request->getPost();
            $set = array(
                "status" => ($data['status'] == 0) ? 1 : 0
            );
            $where = array(
                "id" => $data['sId']
            );
            if($this->homeModel->insertStore($set, $where))
            {
                echo 1;
            }
            else
            {
                echo 0;
            }
        }
    }

    public function slugify($string) {
        $string = utf8_encode($string);
        $string = iconv('UTF-8', 'ASCII//TRANSLIT', $string);   
        $string = preg_replace('/[^a-z0-9- ]/i', '', $string);
        $string = str_replace(' ', '-', $string);
        $string = trim($string, '-');
        $string = strtolower($string);
    
        if (empty($string)) {
            return 'n-a';
        }
    
        return $string;
    }

    public function deleteStore()
    {
        if($this->request->getPost())
        {
            $data = $this->request->getPost();
            if($this->storeModel->deleteStore($data['sId']))
            {
                echo 1;
            }
            else
            {
                echo 0;
            }
        }
    }
    public function deleteTestimonials()
    {
        if($this->request->getPost())
        {
            $data = $this->request->getPost();
            if($this->testimonialsModel->deleteTestimonials($data['sId']))
            {
                echo 1;
            }
            else
            {
                echo 0;
            }
        }
    }


    public function about()
    {
        if($this->request->getPost())
        {

            $updateDescriptionWhere = array(
                "name" => "about_description"
            );
            $description = $this->request->getPost('description');
            $updateDescription['value'] = $description;
            $this->generalSettings->updateSetting($updateDescription, $updateDescriptionWhere);
            
            $newFileName = "";
            if(!empty($_FILES['file']['name']))
            {
                $fileValidationRule = [
                    'file' => [
                        'label' => 'Video',
                        'rules' => 'uploaded[file]'
                            . '|mime_in[file,video/mp4]'
                    ]
                ];
                if(!$this->validate($fileValidationRule))
                {
                    return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
                }
                else
                {
                    $file = $this->request->getFile('file');
                    $newFileName = $file->getRandomName();
                    $file->move('uploads/aboutVideo', $newFileName);
                    $updateVideoWhere = array(
                        "name" => "about_video"
                    );
                    $updateVideo['value'] = $newFileName;
                    $this->generalSettings->updateSetting($updateVideo, $updateVideoWhere);
                }
            }
            return redirect()->to('admin/home/about')->with('sweet-success', 'About updated successfully');
        }
        $aboutVideoWhere = array(
            "name" => "about_video"
        );
        $aboutDescriptionWhere = array(
            "name" => "about_description"
        );
        $videoResponse = $this->generalSettings->getSettings($aboutVideoWhere);
        $descriptionResponse = $this->generalSettings->getSettings($aboutDescriptionWhere);
        $video = "";
        $description = "";

        if(!empty($videoResponse))
        {
            $video = $videoResponse[0]['value'];
        }
        if(!empty($descriptionResponse))
        {
            $description = $descriptionResponse[0]['value'];
        }
        $data = [
            'title' => 'About',
            "video" => $video,
            "description" => $description
        ];
        return view('agungsugiarto\boilerplate\Views\Home\about', $data);
    }
}
