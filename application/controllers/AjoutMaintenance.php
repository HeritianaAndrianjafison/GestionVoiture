<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  AjoutMaintenance extends CI_Controller 
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct()
	{
		/*call CodeIgniter's default Constructor*/
		parent::__construct();
		
		/*load database libray manually*/
		$this->load->database();
		
		/*load Model*/
		$this->load->model('Voiture_model');
		$this->load->model('Insert_Maintenance_model');
	}

	function index()  
      { 
			$response3=$this->Voiture_model->findAllVoiture();
			$response=$this->Insert_Maintenance_model->getTypeMaitenance();
			$this->load->view('backOffice/insertMaintenance',array(
			'allVoiture' =>$response3,
			'typeMaintenance' =>$response,
		)); 
      } 

   function add()  
      { 
      		$MemberData = array(
		     	'idVoiture' => $this->input->post('idVoiture'),
		        'type' =>$this->input->post('type'),
		        'km' => $this->input->post('km'),
		                );

		    $insertMemberData = $this->Insert_Maintenance_model->insert($MemberData);
		    redirect(base_url() . 'ajoutMaintenance/');
      } 
}
