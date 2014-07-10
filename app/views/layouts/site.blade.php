<!doctype html>
<html lang="sv" ng-app="tasknizer">
<head>
	<title>Tasknizer</title>
	<meta charset="UTF-8">
	<meta name="keywords" content="key, words">
	<meta name="description" content="desc">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href={{ asset('img/favicon.ico') }} >
	{{ HTML::style('css/foundation.min.css') }}
	{{ HTML::style('foundation-icons/foundation-icons.css') }}
	{{ HTML::style('css/site.css') }}
</head>
<body>
	<div class="sidebar">
		<a class="item close toggle-sidebar hide-for-large-up">
			<i class="fi-x"></i>
		</a>
		<div class="image">
			<img src="{{ gravatar('daniel.strom.87@gmail.com') }}" />
		</div>
		<a class="item">Home</a>
		<a class="item">Test</a>
		<a class="item">Test igen</a>
	</div>

	<div class="main">
		<div class="fixed">
			<nav class="top-bar" data-topbar>
				<ul class="title-area">
					<li class="name">
						<h1><a href="#">Tasknizer</a></h1>
					</li>
				</ul>
				<ul class="title-area-small">
					<li>
						<i class="fi-list open-sidebar"></i>
					</li>
					<li>
						<a href="#">Tasknizer</a>
					</li>
				</ul>
				<section class="top-bar-section">
					<ul class="right">
						<li><a href="#">Right Button Active</a></li>
						<li class="has-dropdown">
							<a href="#">Right Button Dropdown</a>
							<ul class="dropdown">
								<li><a href="#">First link in dropdown</a></li>
							</ul>
						</li>
					</ul>

					<ul class="left">
						<li><a href="#">Left Nav Button</a></li>
					</ul>
				</section>
			</nav>
		</div>
		<div class="content">
			<div id="view" ng-view></div>
		</div>
	</div>
	
	{{ HTML::script('js/vendor/modernizr.js') }}
	{{ HTML::script('js/vendor/jquery.js') }}
	{{ HTML::script('js/foundation.min.js') }}
	{{ HTML::script('js/angular/angular.min.js') }}
	{{ HTML::script('js/angular/angular-route.min.js') }}
	{{ HTML::script('js/angular/app.js') }}
	{{ HTML::script('js/site.js') }}
</body>
</html>
