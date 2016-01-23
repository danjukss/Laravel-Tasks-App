<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>
<body>

<nav>
	<div class="but"><img width="30" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8d/VisualEditor_-_Icon_-_Menu.svg/2000px-VisualEditor_-_Icon_-_Menu.svg.png" alt="ico"></div>
	<ul>
		<li><a href="#">Sākums</a></li>
		<li><a href="#">Forums</a></li>
		<li><a href="#">Par mums</a></li>
	</ul>
</nav>
	<main>
		<header>home</header>
	</main>
<script>
	$('.but').on('click', function() {
		$('nav ul').toggleClass('show-nav');
	});

	$(window).on("scroll", function() {
	    $("nav").toggleClass("shrink", $(this).scrollTop() > 50)
	});
</script>
</body>
</html>