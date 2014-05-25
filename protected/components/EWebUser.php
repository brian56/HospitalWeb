<?php 
class EWebUser extends CWebUser{

	protected $_model;

	function isAdmin(){
		$user = $this->loadUser();
		if ($user)
			return $user->user_level_id==LevelLookUp::ADMIN;
		return false;
	}
	
	function isManager(){
		$user = $this->loadUser();
		if ($user)
			return $user->user_level_id==LevelLookUp::MANAGER;
		return false;
	}
	
	function getHospitalId(){
		$user = $this->loadUser();
		if ($user)
			return $user->hospital_id;
		return -1;
	}

	// Load user model.
	protected function loadUser()
	{
		if ( $this->_model === null ) {
			$this->_model = User::model()->findByPk( $this->id );
		}
		return $this->_model;
	}
}
?>