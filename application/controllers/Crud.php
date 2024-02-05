<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Crud extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url_helper');
        $this->load->library('form_validation');
        $this->load->database();
		$this->load->model('crud_model');

		
	}
	
	public function index()
	{
	
		$data['student_details'] = $this->crud_model->get_students();
		$data['title'] = 'CRUD';
		$this->load->view('partials/header', $data);
		$this->load->view('home', $data);
		$this->load->view('partials/footer');
	}
	
	public function view_student($stu_id = NULL) {
		$data['student_details'] = $this->crud_model->get_students($stu_id);
        if (empty($data['student_details'])) {
            redirect('/home');
        }
		$data['title'] = 'CRUD';
		$this->load->view('partials/header');
		$this->load->view('view_profile', $data);
		$this->load->view('partials/footer');
	}

	public function add_student() {
		$this->load->helper('form');
        $this->load->library('form_validation');
		$message = '';
		$query = array(
			'f_name' => ucwords($this->input->post('f_name')),
			'm_name' => ucwords($this->input->post('m_name')),
			'l_name' => ucwords($this->input->post('l_name')),
		);
 
		if ($this->db->insert('student_details', $query)){
			$message = 'success';
		} else {
			$message = 'failed';
		}
		$output['success'] = $message;
		echo json_encode($output);
	}
	
	public function update_student($stu_id) {
		$message = '';
		$this->db->where('student_id', $stu_id);
		$query = array(
			'f_name' => $this->input->post('f_name'),
			'm_name' => $this->input->post('m_name'),
			'l_name' => $this->input->post('l_name'),
		);

		if($this->db->update('student_details', $query)){
			$message = 'success';
		} else {
			$message = 'failed';
		}
		$output['success'] = $message;
		echo json_encode($output);
	}
	public function delete_student($stu_id) {
		$message = '';
		$this->db->where('student_id', $stu_id);

		if($this->db->delete('student_details')){
			$message = 'success';
		} else {
			$message = 'failed';
		}
		$output['success'] = $message;
		echo json_encode($output);
	}
}
