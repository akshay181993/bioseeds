<?php 
$config = array(
        'add_dealer' => array(
                                array(
                                        'field' => 'name',
                                        'label' => 'Dealer Name',
                                        'rules' => 'trim|required'
                                ),
                                array(
                                        'field' => 'email',
                                        'label' => 'Email Address',
                                        'rules' => 'trim|required|valid_email'
                                ),
                                array(
                                        'field' => 'mobile_no',
                                        'label' => 'Mobile Number',
                                        'rules' => 'trim|required|regex_match[/^[0-9]{10}$/]'
                                ),
                                array(
                                        'field' => 'address',
                                        'label' => 'Address',
                                        'rules' => 'trim|required'
                                ),
                                array(
                                        'field' => 'city',
                                        'label' => 'City',
                                        'rules' => 'trim|required|alpha'
                                ),
                                array(
                                        'field' => 'pin_code',
                                        'label' => 'Pin Code',
                                        'rules' => 'trim|required'
                                )
                        ),

        'news_rules'  => array(
                                array(
                                        'field' => 'news_title',
                                        'label' => 'News title',
                                        'rules' => 'trim|required'
                                ),
                                array(
                                        'field' => 'news_title_hindi',
                                        'label' => 'समाचार शीर्षक',
                                        'rules' => 'trim|required'
                                ),
                                array(
                                        'field' => 'news_date',
                                        'label' => 'News date',
                                        'rules' => 'trim|required'
                                ),
                                array(
                                        'field' => 'nimage',
                                        'label' => 'News Image',
                                        'rules' => 'trim|required'
                                ),
                                array(
                                        'field' => 'editor1',
                                        'label' => 'News Datails',
                                        'rules' => 'trim|required'
                                ),
                                 array(
                                        'field' => 'editor2',
                                        'label' => 'समाचार विवरण',
                                        'rules' => 'trim|required'
                                )
                        ),

        'products_rules' => array(

                                array(
                                        'field' => 'product_name',
                                        'label' => 'Crop Name',
                                        'rules' => 'trim|required'
                                ),
                                array(
                                        'field' => 'product_name_hindi',
                                        'label' => 'उत्पाद का नाम',
                                        'rules' => 'trim|required'
                                ),
                                array(
                                        'field' => 'category',
                                        'label' => 'Crop Category',
                                        'rules' => 'trim|required'
                                ),
                                array(
                                        'field' => 'pimage',
                                        'label' => 'Crop Image',
                                        'rules' => 'trim|required'
                                ),
                                array(
                                        'field' => 'cultivation_manual1',
                                        'label' => 'Cultivation Manual',
                                        'rules' => 'trim|required'
                                ),
                        ),
        'success_stories_rules' =>  array(
                                array(
                                        'field' => 'person_name',
                                        'label' => 'Person Name',
                                        'rules' => 'trim|required'
                                ),
                                array(
                                        'field' => 'person_name_hindi',
                                        'label' => 'व्यक्ति का नाम',
                                        'rules' => 'trim|required'
                                ),
                                array(
                                        'field' => 'crop',
                                        'label' => 'Crop',
                                        'rules' => 'trim|required'
                                ),
                                array(
                                        'field' => 'success_date',
                                        'label' => 'Success Story Date',
                                        'rules' => 'trim|required'
                                ),
                                array(
                                        'field' => 'mobile_no',
                                        'label' => 'Mobile Number',
                                        'rules' => 'trim|required|regex_match[/^[0-9]{10}$/]'
                                ),
                                array(
                                        'field' => 'address',
                                        'label' => 'Address',
                                        'rules' => 'trim|required'
                                ),
                                array(
                                        'field' => 'city',
                                        'label' => 'City',
                                        'rules' => 'trim|required|alpha'
                                ),
                                array(
                                        'field' => 'city_hindi',
                                        'label' => 'शहर',
                                        'rules' => 'trim|required'
                                ),
                                array(
                                        'field' => 'pin_code',
                                        'label' => 'Pin Code',
                                        'rules' => 'trim|required'
                                ),
                                array(
                                        'field' => 'editor1',
                                        'label' => 'Success Story Details',
                                        'rules' => 'trim|required'
                                ),
                                array(
                                        'field' => 'editor2',
                                        'label' => 'संदेश',
                                        'rules' => 'trim|required'
                                ),
                                array(
                                        'field' => 'simage[]',
                                        'label' => 'Success Story Image',
                                        'rules' => 'trim|required'
                                ),

                        ),
        'login_rules'   => [

                                [
                                        'field' => 'password',
                                        'label' => 'Password',
                                        'rules' => 'trim|required'
                                ],

                                [

                                        'field' => 'email',
                                        'label' => 'Email Address',
                                        'rules' => 'trim|required|valid_email'
                                ]
                        ],
        'password_reset_rules'   => [

                                [
                                        'field' => 'old_password',
                                        'label' => 'Old Password',
                                        'rules' => 'trim|required'
                                ],

                                [

                                        'field' => 'new_password',
                                        'label' => 'New Password',
                                        'rules' => 'trim|required'
                                ],
                                [

                                        'field' => 'confirm_password',
                                        'label' => 'Confirm Password',
                                        'rules' => 'trim|required|matches[new_password]'
                                ]
                        ],

        'profile_rules'  => [

                                [
                                       'field' => 'name',
                                        'label' => 'Name',
                                        'rules' => 'trim|required'
                                ],

                                [

                                        'field' => 'email',
                                        'label' => 'Email Address',
                                        'rules' => 'trim|required|valid_email'
                                ],
                                [

                                        'field' => 'mobile_no',
                                        'label' => 'Mobile Number',
                                        'rules' => 'trim|required|regex_match[/^[0-9]{10}$/]'
                                ],
                                [
                                        'field' => 'city',
                                        'label' => 'City',
                                        'rules' => 'trim|required|alpha'
                                ]
                        ],
        'category_rules'  => [

                                [
                                        'field' => 'category_name',
                                        'label' => 'Category Name',
                                        'rules' => 'trim|required'
                                ],

                                [

                                        'field' => 'category_name_hindi',
                                        'label' => 'श्रेणी नाम',
                                        'rules' => 'trim|required'
                                ],
                                [

                                        'field' => 'image',
                                        'label' => 'Category Image',
                                        'rules' => 'trim|required'
                                ]
                        ],
        'variety_rules'    => [

                                [
                                        'field' => 'product_variety',
                                        'label' => 'Variety Name',
                                        'rules' => 'trim|required'
                                ],
                                [
                                        'field' => 'product',
                                        'label' => 'Product',
                                        'rules' => 'trim|required'
                                ],
                                [
                                        'field' => 'vimage',
                                        'label' => 'Variety Image',
                                        'rules' => 'trim|required'
                                ],
                                [
                                        'field' => 'editor1',
                                        'label' => 'Variety Details',
                                        'rules' => 'trim|required'
                                ],
                                [
                                        'field' => 'editor2',
                                        'label' => 'विविधता विवरण',
                                        'rules' => 'trim|required'
                                ],
        ],

         'forgot_password'    => [

                                [
                                        'field' => 'email',
                                        'label' => 'Email Address',
                                        'rules' => 'trim|required|valid_email'
                                ],
        ],

);

 ?>