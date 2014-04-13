<?php

class postController{
	
	public static function post($args){

		$postTitle = $args[1];
		$postTitle = str_replace('/', '', $postTitle);

		//Check if our requested post exists in Storage
		if(Storage::open('postsDB')->table('posts')->row($postTitle)->status()){
					//Check if cache for our post exists, if yes then return its content
					if(Cache::exist($postTitle)){
						echo Cache::get($postTitle);
						return;
					}
				//if our cache is non-existent then get our post from Storage 
				$post = Storage::open('postsDB')->table('posts')->row($postTitle)->get();
		    	$assets = URL::to('assets');
		    	$add = URL::to('add');
		    	
		    	if(!empty($post)){
		    			//Output
		    			$title = $post['title'];
		    			$text = $post['text'];
		    			$date = $post['date'];
		    			$url = URL::base();
		    			View::make('post',array('url' => $url,'title' => $title, 'text' => $text,'date' => $date));
		    		
		    	}
		    	View::make('foot',array('assets' => $assets));
		    	//Create new cache
		    	Cache::create('3600',$postTitle);
		}else{
			//write to log what happend + trigge an error
			Logger::write('No post found!');
			trigger_error('No post found!');
		}
		
		
	
	}

	public static function add($args){
		//some security for our local storage
		$title = str_replace('/', '', $_POST['title']);
		$rowName = str_replace(' ', '-', $title);
		$title = Filter::xss($title);
		$text = str_replace('/', '', $_POST['text']);
		$text = Filter::xss($text);
		//Check if post exists, if yes then redirect to homepage
		if(Storage::open('postsDB')->table('posts')->row($rowName)->status()){
			header('Location: '.URL::base());
		}else{
			//if post does not exists yet, create a new row and insert our data
			Storage::open('postsDB')->table('posts')->row($rowName,true)->insert(array(

				'title' => $title,
				'text' => $text,
				'date' => date('Y-m-d')

			));

			header('Location: '.URL::base());
		}
	}

	public static function welcome(){
		//get all posts
    	$posts = Storage::open('postsDB')->table('posts')->getTable();

    	$assets = URL::to('assets');
    	$add = URL::to('add');
    	//Output
    	View::make('form',array('add' => $add));
    	if(!empty($posts)){
    		//display our posts
    		foreach ($posts as $post) {
    			$title = $post['title'];
    			$text = $post['text'];
    			$date = $post['date'];
    			$url = URL::to('post/').str_replace(' ', '-', $title);
    			View::make('post',array('url' => $url,'title' => $title, 'text' => $text,'date' => $date));
    		}
    	}
    	View::make('foot',array('assets' => $assets));
	}

}