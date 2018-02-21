<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller {

	/**
	 * @author Taufik Anggara
     * Create Module Users
	**/

	public function __construct()
	{
		parent::__construct();
		//Redirect ke halaman login
		if ($this->session->userdata('logged_in') == FALSE){redirect('login');}

        //Load Model
        $this->load->model('member_model');

		//Set Form Validation
		$this->form_validation->set_message('required', '%s harus di isi');
		$this->form_validation->set_message('is_unique', '%s sudah terdaftar di database');
		$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
		$this->form_validation->set_rules('dmember_fname', 'Nama Depan', 'trim|required|xss_clean');
		$this->form_validation->set_rules('dmember_lname', 'Nama Belakang', 'trim|required|xss_clean');
	}

	public function index()
	{
		$data = array(
			'title'    => 'Administrator - Member',
			'subtitle' => 'Member',
			'content'  => 'member/view',
			'member'   => $this->member_model->getAllDataMember()
		);

		$this->load->view('template',$data);
	}

	public function add()
	{
		$data = array(
			'title'    => 'Administrator - Member',
			'subtitle' => 'Tambah Member',
			'content'  => 'member/add',
			'error'    => ''
		);

		$this->load->view('template',$data);
	}

	public function save()
	{

		//Set Form Validation
		$this->form_validation->set_rules('member_email', 'Email', 'trim|required|xss_clean');

		//Set Default Time Zone
		date_default_timezone_set("Asia/Jakarta");

        $member_datecreated = date('Y-m-d H:i:s');

        //Set File Name
        $name = $_FILES['foto']['name'];

        //Upload Directory
        $dir                      = './assets/images/';

        //Configuration Upload File
        $config = array(
            'upload_path'         => $dir,
            'allowed_types'       => 'gif|GIF|jpg|JPG|jpeg|JPEG|png|PNG',
            'max_size'            => '2000',
            'file_name'           => date("YmdHis").'_'.$name
        );
        $this->upload->initialize($config);

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'title'    => 'Administrator - member',
				'subtitle' => 'Tambah member',
				'content'  => 'member/add',
				'error'    => $this->upload->display_errors()
			);

			$this->load->view('template',$data);
		} else {
			if (!$this->upload->do_upload('foto')) {
                $data = array(
                    'title'    => 'Administrator - member',
                    'subtitle' => 'Tambah member',
                    'content'  => 'member/add',
                    'error'    => $this->upload->display_errors()
                );

                $this->load->view('template',$data);
            } else {

                $images_name    = $config['file_name'];
                $source         = $dir.$config['file_name'];
                chmod($source, 0777);

                //Configuration Resize Upload File
                $img_lib['image_library']   = 'gd2';
                $img_lib['source_image']	= './assets/images/'.$images_name;
                $img_lib['new_image']       = './assets/images/members';
                $img_lib['maintain_ratio']  = TRUE;
                $img_lib['width']	        = 700;
                $img_lib['height']	        = 700;

                $this->load->library('image_lib', $img_lib);
                $this->image_lib->resize();

				$member = array(
					'member_email'       => $this->input->post('member_email'),
					'member_status'      => $this->input->post('member_status'),
					'member_datecreated' => $member_datecreated
				);

				$this->model_general->saveTable('tbl_member',$member);

				$idfk = $this->db->insert_id();

				$dmember = array(
					'dmember_idfk'        => $idfk,
					'dmember_fname'       => $this->input->post('dmember_fname'),
					'dmember_lname'       => $this->input->post('dmember_lname'),
					'dmember_dob'         => $this->input->post('dmember_dob'),
					'dmember_pob'         => $this->input->post('dmember_pob'),
					'dmember_martialstat' => $this->input->post('dmember_martialstat'),
					'dmember_religion'    => $this->input->post('dmember_religion'),
					'dmember_occupation'  => $this->input->post('dmember_occupation'),
					'dmember_phone1'      => $this->input->post('dmember_phone1'),
					'dmember_phone2'      => $this->input->post('dmember_phone2'),
					'dmember_address1'    => $this->input->post('dmember_address1'),
					'dmember_district1'   => $this->input->post('dmember_district1'),
					'dmember_city1'       => $this->input->post('dmember_city1'),
					'dmember_prov1'       => $this->input->post('dmember_prov1'),
					'dmember_postalcode1' => $this->input->post('dmember_postalcode1'),
					'dmember_address2'    => $this->input->post('dmember_address2'),
					'dmember_district2'   => $this->input->post('dmember_district2'),
					'dmember_city2'       => $this->input->post('dmember_city2'),
					'dmember_prov2'       => $this->input->post('dmember_prov2'),
					'dmember_postalcode2' => $this->input->post('dmember_postalcode2'),
					'dmember_bio'         => $this->input->post('dmember_bio'),
					'dmember_postalcode2' => $this->input->post('dmember_postalcode2'),
					'dmember_photo'       => $images_name
				);

				$this->model_general->saveTable('tbl_detail_member',$dmember);
				unlink('./assets/images/'.$images_name);
				redirect('member');
			}
		}
	}

	public function edit($id)
	{
		$data = array(
			'title'    => 'Administrator - Member',
			'subtitle' => 'Ubah Member',
			'content'  => 'member/edit',
			'edit'	   => $this->member_model->getAllDataMemberByID($id),
			'error'	   => ''
		);

		$this->load->view('template',$data);
	}

	public function update()
	{

		//Set Form Validation
        $this->form_validation->set_rules('member_email', 'Email', 'trim|required|xss_clean');

		//Set Default Time Zone
		date_default_timezone_set("Asia/Jakarta");

		$member_dateupdated = date('Y-m-d H:i:s');
		$id = $this->input->post('id');

        //Set File Name
        $name = $_FILES['foto']['name'];

        //Upload Directory
        $dir                      = './assets/images/';

        //Configuration Upload File
        $config = array(
            'upload_path'         => $dir,
            'allowed_types'       => 'gif|GIF|jpg|JPG|jpeg|JPEG|png|PNG',
            'max_size'            => '2000',
            'file_name'           => date("YmdHis").'_'.$name
        );
        $this->upload->initialize($config);
        //var_dump($config);die();
		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'title'    => 'Administrator - Member',
				'subtitle' => 'Ubah Member',
				'content'  => 'member/edit',
				'edit'	   => $this->member_model->getAllDataMemberByID($id),
				'error'	   => $this->upload->display_errors()
			);

			$this->load->view('template',$data);
		} else {
			if (empty($name)) {

				$member = array(
                    'member_email'       => $this->input->post('member_email'),
                    'member_status'      => $this->input->post('member_status'),
                    'member_dateupdated' => $member_dateupdated
                );

                $this->model_general->updateTable('tbl_member',array('id' => $id),$member);

                $dmember = array(
                    'dmember_fname'       => $this->input->post('dmember_fname'),
                    'dmember_lname'       => $this->input->post('dmember_lname'),
                    'dmember_dob'         => $this->input->post('dmember_dob'),
                    'dmember_pob'         => $this->input->post('dmember_pob'),
                    'dmember_martialstat' => $this->input->post('dmember_martialstat'),
                    'dmember_religion'    => $this->input->post('dmember_religion'),
                    'dmember_occupation'  => $this->input->post('dmember_occupation'),
                    'dmember_phone1'      => $this->input->post('dmember_phone1'),
                    'dmember_phone2'      => $this->input->post('dmember_phone2'),
                    'dmember_address1'    => $this->input->post('dmember_address1'),
                    'dmember_district1'   => $this->input->post('dmember_district1'),
                    'dmember_city1'       => $this->input->post('dmember_city1'),
                    'dmember_prov1'       => $this->input->post('dmember_prov1'),
                    'dmember_postalcode1' => $this->input->post('dmember_postalcode1'),
                    'dmember_address2'    => $this->input->post('dmember_address2'),
                    'dmember_district2'   => $this->input->post('dmember_district2'),
                    'dmember_city2'       => $this->input->post('dmember_city2'),
                    'dmember_prov2'       => $this->input->post('dmember_prov2'),
                    'dmember_postalcode2' => $this->input->post('dmember_postalcode2'),
                    'dmember_bio'         => $this->input->post('dmember_bio'),
                    'dmember_postalcode2' => $this->input->post('dmember_postalcode2')
                );

                $this->model_general->updateTable('tbl_detail_member',array('dmember_idfk' => $id),$dmember);

                redirect('member');

			} else {

				if (!$this->upload->do_upload('foto')) {
					
                    $data = array(
                        'title'    => 'Administrator - Member',
						'subtitle' => 'Ubah Member',
						'content'  => 'member/edit',
						'edit'	   => $this->member_model->getAllDataMemberByID($id),
						'error'	   => $this->upload->display_errors()
                    );

                    $this->load->view('template',$data);

                } else {

					$ImagesName = $this->model_general->getRowDataFromTable('tbl_detail_member',array('dmember_idfk' => $id));
	                unlink('./assets/images/members/'.$ImagesName->dmember_photo);

					$images_name    = $config['file_name'];
	                $source         = $dir.$config['file_name'];
	                chmod($source, 0777);

	                //Configuration Resize Upload File
	                $img_lib['image_library']   = 'gd2';
	                $img_lib['source_image']    = './assets/images/'.$images_name;
	                $img_lib['new_image']       = './assets/images/members';
	                $img_lib['maintain_ratio']  = TRUE;
	                $img_lib['width']           = 700;
	                $img_lib['height']          = 700;

	                $this->load->library('image_lib', $img_lib);
	                $this->image_lib->resize();

					$member = array(
	                    'member_email'       => $this->input->post('member_email'),
	                    'member_status'      => $this->input->post('member_status'),
	                    'member_dateupdated' => $member_dateupdated
	                );

	                $this->model_general->updateTable('tbl_member',array('id' => $id),$member);

	                $dmember = array(
	                    'dmember_fname'       => $this->input->post('dmember_fname'),
	                    'dmember_lname'       => $this->input->post('dmember_lname'),
	                    'dmember_dob'         => $this->input->post('dmember_dob'),
	                    'dmember_pob'         => $this->input->post('dmember_pob'),
	                    'dmember_martialstat' => $this->input->post('dmember_martialstat'),
	                    'dmember_religion'    => $this->input->post('dmember_religion'),
	                    'dmember_occupation'  => $this->input->post('dmember_occupation'),
	                    'dmember_phone1'      => $this->input->post('dmember_phone1'),
	                    'dmember_phone2'      => $this->input->post('dmember_phone2'),
	                    'dmember_address1'    => $this->input->post('dmember_address1'),
	                    'dmember_district1'   => $this->input->post('dmember_district1'),
	                    'dmember_city1'       => $this->input->post('dmember_city1'),
	                    'dmember_prov1'       => $this->input->post('dmember_prov1'),
	                    'dmember_postalcode1' => $this->input->post('dmember_postalcode1'),
	                    'dmember_address2'    => $this->input->post('dmember_address2'),
	                    'dmember_district2'   => $this->input->post('dmember_district2'),
	                    'dmember_city2'       => $this->input->post('dmember_city2'),
	                    'dmember_prov2'       => $this->input->post('dmember_prov2'),
	                    'dmember_postalcode2' => $this->input->post('dmember_postalcode2'),
	                    'dmember_bio'         => $this->input->post('dmember_bio'),
	                    'dmember_postalcode2' => $this->input->post('dmember_postalcode2'),
	                    'dmember_photo'       => $images_name
	                );

	                $this->model_general->updateTable('tbl_detail_member',array('dmember_idfk' => $id),$dmember);
	                unlink('./assets/images/'.$images_name);
	                redirect('member');
	            }
			}
		}
	}

	public function delete()
	{
        $array_id   = $this->input->post('array_id');
        $id         = $this->input->post('id');

        foreach ($array_id as $key => $value) {
            if(!empty($id[$value])) {
                $this->model_general->deleteRowTable('tbl_users',array('id' => $value));
            }
        }
		redirect('users');
	}

}
