<!DOCTYPE html>
<html lang='en'>
	<head>
		<title> URL shorter</title>
		<link rel="stylesheet" href="/assets/css/styles.css" />
	</head>
	<body>
		<div id="container">
			<h2>Uber-shortener</h2>
			{{Form::open(array('url' => '/', 'method' => 'post'))}}

			{{Form::text('link', Input::old('link'),
				array('placehorder' =>
				'Insert your url here and press enter'))}}

			{{Form::close()}}

			@if(Session::has('errors'))
			<h3 class="error">{{$errors->first('link')}}</h3>
			@endif

			@if(Session::has('link'))
			<h3 class="success">
			{{Html::link(Session::get('link'),'Click here for your
			shortened URL')}}
			</h3>
			@endif


		</div>

	</body>

</html>