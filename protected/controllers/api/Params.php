<?php
class Params {
	
	// status and message define
	const status_success = 1;
	const message_success = 'Success. Object:';
	const status_no_record = 0;
	const message_no_record = 'No records were found. Object:';
	const status_params_missing = - 1;
	const message_params_missing = 'Missing params:';
	const status_params_error = - 2;
	const message_params_error = 'Params format error:';
	const status_failed = - 3;
	const message_failed = 'Can not excute request.';
	
	// param's name define
	const param_Id = 'id';
	const param_Offset = 'offset';
	const param_Limit = 'limit';
	const param_Order = 'order';
	
	// user params
	const param_Email = 'email';
	const param_Password = 'password';
	const param_User_Name = 'user_name';
	const param_Contact_Phone = 'contact_phone';
	const param_Device_Id = 'device_id';
	const param_Token = 'token';
	const param_Is_Actived = 'is_actived';
	
	// info, info's comment params
	const param_Status = 'appointment_status';
	const param_Title = 'title';
	const param_Content = 'content';
	
	// foreign key params
	const param_User_Id = 'user_id';
	const param_Hospital_Id = 'hospital_id';
	const param_Access_Level_Id = 'access_level_id';
	const param_User_Level_Id = 'user_level_id';
	const param_Info_Type_Id = 'info_type_id';
	const param_Info_Id = 'info_id';
	const param_Event_Id = 'event_id';
	const param_Device_Os_Id = 'device_os_id';
	
	const param_Last_Time_Update = 'last_time_update';
}
?>