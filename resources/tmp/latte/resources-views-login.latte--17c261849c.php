<?php

use Latte\Runtime as LR;

/** source: /Users/nick/projects/mvc/resources/views/login.latte */
final class Template17c261849c extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		$Session = App\Helpers\Session::class /* line 1 */;
		echo "\n";
		if (isset($_SESSION['user'])) /* line 3 */ {
			echo '	';
			echo LR\Filters::escapeHtmlText(header("Location: /dashboard")) /* line 4 */;
			echo "\n";
		}
		echo '
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CakePop PHP</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css">
	<link rel="stylesheet" href="css/styles.css">

	<meta name="msapplication-TileImage" content="/images/favicons/win8-tile-144.png">
	<meta name="msapplication-TileColor" content="#1f379d">
	
	<link rel="shortcut icon" href="/images/favicons/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" href="/images/favicons/apple-touch-icon-192x192.png" sizes="192x192">
</head>
<body class="login">

	<h1>';
		echo LR\Filters::escapeHtmlText($config) /* line 25 */;
		echo '</h1>

	<main>
		<section class="intro">

			<img class="logo" src="/images/logo.png" alt="CakePop PHP Logo">
			<div class="block tac">
				<h1>CakePop PHP</h1>
				<h2>The Micro Web Framework</h2>
			</div>

		</section>

		<section class="form-wrapper">

';
		$this->createTemplate('partials/login/login-form.latte', $this->params, 'include')->renderToContentType('html') /* line 40 */;
		echo '			<hr>
			<button type="button" class="fw tac btn btn-primary"  data-toggle="modal" data-target="#signupModal">Create an Account</a>
			
		</section>
	</main>


	<footer>
		&copy; 2021 Nick Adams 
	</footer>
	
';
		$this->createTemplate('partials/login/signup-form.latte', $this->params, 'include')->renderToContentType('html') /* line 52 */;
		echo '

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>
<script src="js/login.js"></script>
</body>
</html>

';
		echo LR\Filters::escapeHtmlText($Session::clearErrors()) /* line 63 */;
		return get_defined_vars();
	}

}
