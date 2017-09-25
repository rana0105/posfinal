<!DOCTYPE HTML>
<html>
<head>
<title>404 error page</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
{!! Html::style('errors/css/style.css') !!}
</head>
<body>
	<div class="wrap">
		<div class="content">
			<div class="logo">
				<h1><a href="#"><img src="{{asset('errors/images/logo.png')}}"/></a></h1>
				<span><img src="{{asset('errors/images/signal.png')}}"/>Oops! The Page you requested was not found !</span>
			</div>
			<div class="buttom">
				<div class="seach_bar">
					<p>You can go to <span><a href="/dashboard">Home</a></span> page !</p>
					{{-- <div class="search_box">
					<form>
					   <input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}"><input type="submit" value="">
				    </form>
					 </div> --}}
				</div>
			</div>
		</div>
	</div>
</body>
</html>