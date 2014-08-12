<?php

Route::get('/', function(){
	return View::make('form');
});

Route::post('/', function(){
	$rules = array(
		'link' => 'required|url'
	);
	$validation = Validator::make(Input::all(), $rules);
	// validation fails
	if ($validation -> fails()){
		return Redirect::to('/')
		-> withInput()
		-> withErrors($validation);
	} else {
		// check the repeated results in db
		$link = Link:: where('url', '=', Input::get('link')) -> first();
		
		if ($link){
			return Redirect::to('/')
			-> withInput()
			-> with('link', $link -> hash);
		} else{
			do{
				$newHash = Str:: random(6);
			} while (Link::where('hash', '=', $newHash) -> count() >0);

			Link::create(array(
				'url'  => Input::get('link'),
				'hash' => $newHash
				));

			Redirect::to('/')
			->withInput()
			->wiht('link', $newHash);
		}

		
	}

});