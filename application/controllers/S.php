<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class S	extends CI_Controller {


	function __construct () 
	{
		parent::__construct();
		// error_reporting(0);
	}

public function about_Us()
	{
		$this->load->view('v/header');
		$this->load->view('v/aboutus');
		$this->load->view('v/footer');
	}

	public function contact_us()
	{
		$this->load->view('v/header');
		$this->load->view('v/contactus');
		$this->load->view('v/footer');
	}

	public function contact_us_mail()
	{
		$mail= $this->input->post('email');
		$name= $this->input->post('name');
		$message= $this->input->post('message');

		$final_message = 'Name: '.$name.'<br>Email: '.$mail.'<br>Query:'.$message;
		$this->load->library('email');
		$this->email->set_newline("\r\n");

        $this->email->from('nathantraderschennai@gmail.com', 'support');
        $this->email->to('nathantraderschennai@gmail.com, yeshwanthgunasekaran@gmail.com'); 

        $this->email->subject('Contact Form');
        $this->email->message($final_message);

		$result = $this->email->send();
		$result_db = $this->model_user->contact_query($name, $mail, $message);

		redirect("s/contact_us_success");
	}

	public function contact_us_success()
	{
		$this->load->view('v/header');
		$this->load->view('v/contactus_success');
		$this->load->view('v/footer');
	}


	public function privacy_policy()
	{
		$this->load->view('v/header');
		$this->load->view('v/privacyp');
		$this->load->view('v/footer');
	}

	public function terms_and_conditions()
	{
		$this->load->view('v/header');
		$this->load->view('v/terms');
		$this->load->view('v/footer');
	}

	public function refund_policy()
	{
		$this->load->view('v/header');
		$this->load->view('v/refundp');
		$this->load->view('v/footer');
	}

	public function return_policy()
	{
		$this->load->view('v/header');
		$this->load->view('v/returnp');
		$this->load->view('v/footer');
	}

	public function cancellation_policy()
	{
		$this->load->view('v/header');
		$this->load->view('v/cancelp');
		$this->load->view('v/footer');
	}
}
?>
