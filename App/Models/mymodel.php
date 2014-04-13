<?php

class myModel{

	public static function myFunction(){
		$query = DB::table('myTable')->get();
		return $query;
	}
	
}