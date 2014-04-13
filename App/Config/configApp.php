<?php

class configApp{
	
	public static $localhost = true;
	
	public static $local_folder = 1;
	
	public static $debug = true;

	public static $log = true;

	public static $keep_log_files = 7; //DAYS



	public static function Error(){
		  
			$assets = URL::to('assets');
			View::make('head',array('assets' => $assets));
		    View::make('error');
   
	}


}
