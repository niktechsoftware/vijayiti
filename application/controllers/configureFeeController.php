<?php
 class ConfigureFeeController extends CI_Controller{
 	
 function __construct()
	{
		parent::__construct();
		$this->is_login();
		
	}
	
	function is_login(){
		$is_login = $this->session->userdata('is_login');
		$is_lock = $this->session->userdata('is_lock');
		$logtype = $this->session->userdata('login_type');
		if($is_login != "admin"){
			//echo $is_login;
			redirect("index.php/homeController/index");
		}
		elseif(!$is_login){
			//echo $is_login;
			redirect("index.php/homeController/index");
		}
		elseif(!$is_lock){
			redirect("index.php/homeController/lockPage");
		}
	}
 	
 	function schoolFeeConfigure(){
 		$data['pageTitle'] = 'Fee Configuration';
 		$data['smallTitle'] = 'Fee Configuration';
 		$data['mainPage'] = 'Fee';
 		$data['subPage'] = 'Fee Configuration';
 		
 		$this->load->model("configureFeeModel");
 		$data['column'] = $this->configureFeeModel->feeColumnLIst();
 		
 		$data['title'] = 'Fee Configuration';
 		$data['headerCss'] = 'headerCss/configureClassCss';
 		$data['footerJs'] = 'footerJs/configureFeeJs';
 		$data['mainContent'] = 'configureFee';
 		$this->load->view("includes/mainContent", $data);
 	}
 	
 	function saveFeeFields(){
 		$del_deposit = 'DROP TABLE IF EXISTS fee_deposit';
 		$fee_deposit = 'CREATE TABLE `fee_deposit` (
					  `id` int(11) NOT NULL AUTO_INCREMENT,
					  `student_id` varchar(10) NOT NULL,';
 		foreach ($this->input->post("month") as $row):
 			$fee_deposit .= '`'.$row.'` decimal(10,2) NOT NULL,';
 		endforeach;
		$fee_deposit .= '`other_fee_reason` text NOT NULL,
					  `payment_mode` varchar(10) NOT NULL,
					  `previous_balance` decimal(10,2) NOT NULL,
					  `total` decimal(10,2) NOT NULL,
					  `paid` decimal(10,2) NOT NULL,
					  `current_balance` decimal(10,2) NOT NULL,
					  `sub_total` decimal(10,2) NOT NULL,
					  `diposit_month` int(2) NOT NULL,
					  `diposit_date` date NOT NULL,
					  `till_diposit` date NOT NULL,
					  PRIMARY KEY (`id`)
					) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1';
//----------------------------------------------------------------------------------------------------------		
				
		$del_schdule = 'DROP TABLE IF EXISTS fee_shedule';
 		$fee_schdule = 'CREATE TABLE `fee_shedule` (
					  `id` int(11) NOT NULL AUTO_INCREMENT,
					  `student_id` varchar(10) NOT NULL,';
		foreach ($this->input->post("month") as $row):
 			$fee_schdule .= '`'.$row.'` decimal(10,2) NOT NULL,';
 		endforeach;
		$fee_schdule .= 'PRIMARY KEY (`id`)
					) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1';
 		
//----------------------------------------------------------------------------------------------------------
 		$del_one_time_fee = 'DROP TABLE IF EXISTS one_time_fee';
 		$one_time_fee = 'CREATE TABLE `one_time_fee` (
					  `id` int(11) NOT NULL AUTO_INCREMENT,
					  `student_id` varchar(10) NOT NULL,';
 		foreach ($this->input->post("annual") as $row):
 			$one_time_fee .= '`'.$row.'` decimal(10,2) NOT NULL,';
 		endforeach;
			
			$one_time_fee .= '`diposit_date` date NOT NULL,
					  PRIMARY KEY (`id`)
					) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1';
 		
		
		$this->db->query($del_deposit);
 		$this->db->query($fee_deposit);
 		$this->db->query($del_schdule);
 		$this->db->query($fee_schdule);
 		$this->db->query($del_one_time_fee);
 		$this->db->query($one_time_fee);
 		
 		$this->schoolFeeConfigure();
 	}
 	
 }