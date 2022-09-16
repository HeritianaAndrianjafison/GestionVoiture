<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AjoutTrajet extends CI_Controller {

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
	$this->load->model('insert_trajet_model');
	$this->load->model('Voiture_model');
	}

	public function index()
	{

		if($this->session->userdata('usernamefo') != 0)
		{
			if($this->insert_trajet_model->checkDepart())
			{
				$response=$this->insert_trajet_model->getDepart();
				$this->load->view('utilisateur/ajoutTrajetArrive',array(
				'test' =>$response ));
			}
			else 
			{
				$response=$this->Voiture_model->voitureDispo();
				$this->load->view('utilisateur/ajoutTrajetDepart',array(
				'listVoiture' =>$response ));
			}
		
		}
		else{
			redirect(base_url() . 'LoginAdmin/login');
		}
	}
    function add()
    {
    	if($this->session->userdata('usernamefo') != 0)
    	{
	    	//$this->load->view('utilisateur/ajoutTrajet');
	        if($this->input->post('ok'))

	        	$checkHeure=0;
	        	$checkkilometrage = 0;

	        	$dateDepart=$this->input->post('dateDepart');
	        	$heureDepart=$this->input->post('heureDepart');
	        	$kilometrageDepart=$this->input->post('kilometrageDepart');

	        	if($heureDepart>=0 && $heureDepart<25)
	        	{
	        		$checkHeure=1;
	        	}

	        	if($kilometrageDepar>=0)
	        	{
	        		$checkkilometrage=1;
	        	}
	        		if($checkHeure==1 AND $checkkilometrage ==1)
	        		{
	        			$MemberData = array(
		                'idVoiture' => $this->input->post('idVoiture'),
		                'idChauffeur' => $this->session->userdata('usernamefo'),
		                'carburant' => 0,
		                'dateArrive' => NULL,
		                'dateDepart' => $dateDepart,
		                'heureArrive' => 0,
		                'heureDepart' => $heureDepart,
		                'lieuArrive' => $this->input->post('lieuArrive'),
		                'prixCarburant' => 0,
		                'motif' => $this->input->post('motif'),
		                'lieuDepart' => $this->input->post('lieuDepart'),
		                'kilometrageDepart' => $kilometrageDepart,
		                'kilometrageArrive' => 0,
		            	);

		            	 $insertMemberData = $this->insert_trajet_model->insert($MemberData);
		            	 $this->Voiture_model->setInDisponible($this->input->post('idVoiture'));
		            	 redirect(base_url() . 'ajoutTrajet/');
		            	 $this->session->set_flashdata('ErrKilometrage', 'insertion Trajet avec Succee ');
		        	}
		        else if($checkHeure == 0)
	            {
	            	$this->session->set_flashdata('ErrKilometrage', 'Heure inexacte');
	            	redirect(base_url() . 'ajoutTrajet/');
	            }
	            else if($checkkilometrage == 0)
	            {
	            	$this->session->set_flashdata('ErrKilometrage', 'Kilometrage negatif ou incorrect');
	            	redirect(base_url() . 'ajoutTrajet/');
	            }
	        		
    	}
     }

     function addArrive()
     {
     	if($this->session->userdata('usernamefo') != 0)
     	{
     		if($this->session->userdata('usernamefo') != 0)
     		{
	        	$dateDepart=$this->input->post('dateDepart');
	        	$dateArrive=$this->input->post('dateArrive');
	        	$heureDepart=$this->input->post('heureDepart');
	        	$heureArrive=$this->input->post('heureArrive');

	        	$kilometrageArrive=$this->input->post('kilometrageArrive');
	        	$kilometrageArrive=$this->input->post('kilometrageDepart');

	        	$idTrajet = $this->input->post('idTrajet');

	        	$checkKilometrage =0;
	        	$checkHeure=0;
	        	$checkVitesse=0;
	        	$checkDate=0;

	        	$dateDifference = abs(strtotime($dateArrive) - strtotime($dateDepart));

				$years  = floor($dateDifference / (365 * 60 * 60 * 24));
				$months = floor(($dateDifference - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
				$days   = floor(($dateDifference - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 *24) / (60 * 60 * 24));

				$jrestant =  $years." anne,  ".$months." mois et ".$days." jours";
				$jrestant2=($years*365)+($months*24)+$days;

				if($jrestant2>0)
				{
					$checkDate=1;
				}

				if($heureDepart > 0 And $heureArrive > 0 AND $heureArrive > $heureDepart )
	        	{
	        		$checkHeure=1;
	        	
	        	}

	        	if($kilometrageDepart > 0 AND $kilometrageArrive > 0 AND  $kilometrageArrive> $kilometrageDepart)
	        	{
	        		$checkKilometrage=1;
	        	}

	        	if($checkHeure==1 AND $checkKilometrage=1 )
	        	{
	        		$distance = $kilometrageArrive-$kilometrageDepart;
	        		$temp=$heureArrive-$heureDepart;
	        		$vitesseMoyenne = $distance/$temp;

	        		if($vitesseMoyenne>72)
	        		{
	        			$checkVitesse=1;
	        		}
	        	}

	        	if($checkKilometrage == 1 ANd $checkVitesse==1 AND  $checkDate==1)
	        	{
	        		$MemberData = array(
	                
	                'carburant' => $this->input->post('carburant'),
	                'dateArrive' => $dateArrive,
	                'heureArrive' => $heureArrive,
	                'prixCarburant' => $this->input->post('prixCarburant'),
	                'kilometrageArrive' => $kilometrageArrive,
	            	);

	        		$this->Voiture_model->setDisponible($this->input->post('idVoiture'));
	            	 $insertMemberData = $this->insert_trajet_model->setArrive($idTrajet,$MemberData);
	            	 redirect(base_url() . 'ajoutTrajet/');
	            	 $this->session->set_flashdata('ErrKilometrage', 'insertion Trajet avec Succee ');
	        	}

	        	else if($checkKilometrage == 0)
	            {
	            	$this->session->set_flashdata('ErrKilometrage', 'le kilometrage n est pas coherent ');
	            	redirect(base_url() . 'ajoutTrajet/');
	            }

	            else if($checkVitesse == 0)
	            {
	            	$this->session->set_flashdata('ErrKilometrage', 'la vitesse moyenne doit etre superieur a 70 Km/h ');
	            	redirect(base_url() . 'ajoutTrajet/');
	            }

	            else if($checkDate==0)
	            {
	            	$this->session->set_flashdata('ErrKilometrage', 'Date incoherent ');
	            	redirect(base_url() . 'ajoutTrajet/');
	            }
     		}
     	}

     	else
	     {
	        $this->session->set_flashdata('error_msg', 'Some problems occured, please try again.');
	     }
     }
}
