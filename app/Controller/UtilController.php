<?php
class UtilController extends AppController {
	public $uses = array('User', 'Paging',  'UserDetail', 'Order','Country','State','City');
	public $helpers = array('Html','Form','Ajax','Javascript','SpecialCharacter','Util','Time');
	public $components = array('Encrypt','Cookie','Session','Email','Graph','RequestHandler');
	
	public function beforeFilter() {
		parent::beforeFilter();		
	}
	public function gat_state_list($country,$divId){
		$statesList = $this->State->getStatesList($country);
		$statesList = array('0'=>'Select State') + $statesList;
		echo "<select name='data[UserDetail][city]' id='UserDetailCity' onchange='changeCity(this.value,\"".$divId."\")'>";
		foreach ($statesList as $key =>$val){
			echo "<option value='".$key."'>".$val."</option>";
		}
		echo "</select>";
		die;
	}
	public function gat_city_list($stateId){
		$citiesList = $this->City->getCitiesList($stateId);
		$citiesList = array('0'=>'Select City') + $citiesList;
		echo "<select name='data[UserDetail][city]' id='UserDetailCity'>";
		foreach ($citiesList as $key =>$val){
			echo "<option value='".$key."'>".$val."</option>";
		}
		echo "</select>";
		die;
	}
	public function checkAvalibility(){
		if(isset($_POST['email']))
			$email=$_POST['email'];

		$errorArr = $this->User->userValidation(array('email' => trim($email)), 1);
        if (isset($errorArr['email'])) {
            $error = $errorArr['email'];
        }
        if(isset($error)){
            echo '<span class="text10 errMsg">' . $error . '</span>';
			exit();
        }
		echo 'success';
        exit();
	}
}
?>