<?php
/*
 * Hooks determine what happens on some events, e.g: before router starts (preRouter)
 */
class Hooks{
	
	public static function preRouter(){
		
		#echo "\nI am pre router";
		
	}
	
	public static function preController(){
		
		
		
	}
	
	
	
	public static function preModel(){
		
		#echo "\nI am pre model";
		
	}
	
	public static function preExtension(){
		
		
		
	}
	
	public static function preOutput(){
		
		$assets = URL::to('assets');
		View::make('head',array('assets' => $assets));
	}
	
}
