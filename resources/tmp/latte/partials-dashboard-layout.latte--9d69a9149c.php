<?php

use Latte\Runtime as LR;

/** source: /Users/nick/projects/mvc/resources/views/partials/dashboard/layout.latte */
final class Template9d69a9149c extends Latte\Runtime\Template
{
	protected const BLOCKS = [
		['title' => 'blockTitle', 'css' => 'blockCss', 'heading' => 'blockHeading', 'content' => 'blockContent', 'js' => 'blockJs'],
	];


	public function main(): array
	{
		extract($this->params);
		$Session = App\Helpers\Session::class /* line 1 */;
		echo '<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>';
		if ($this->getParentName()) {
			return get_defined_vars();
		}
		$this->renderBlock('title', get_defined_vars()) /* line 7 */;
		echo '</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css">
	<link rel="stylesheet" href="css/styles.css">
	';
		$this->renderBlock('css', get_defined_vars()) /* line 11 */;
		echo '

	<meta name="msapplication-TileImage" content="/images/favicons/win8-tile-144.png">
	<meta name="msapplication-TileColor" content="#1f379d">
	
	<link rel="shortcut icon" href="/images/favicons/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" href="/images/favicons/apple-touch-icon-192x192.png" sizes="192x192">

</head>

<body class="loggedin">

';
		$this->createTemplate('navigation.latte', $this->params, 'include')->renderToContentType('html') /* line 23 */;
		echo '
	<div id="main-wrapper">


		<main>

			<header class="header-bar">
				';
		$this->renderBlock('heading', get_defined_vars()) /* line 31 */;
		echo '
			</header>

			<section class="content">

				';
		$this->renderBlock('content', get_defined_vars()) /* line 36 */;
		echo '

			</section>
		
		</main>
		
		<footer>
			&copy; 2021 Nick Adams 
		</footer>
			
	</div>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="js/dashboard.js"></script>
<script src="js/scripts.js"></script>
';
		$this->renderBlock('js', get_defined_vars()) /* line 54 */;
		echo '
</body>
</html>

';
		if (($Session::getErrors() > 0)) /* line 58 */ {
			echo '	';
			echo LR\Filters::escapeHtmlText($Session::clearErrors()) /* line 59 */;
			echo "\n";
		}
		if (($Session::getSuccesses() > 0)) /* line 61 */ {
			echo '	';
			echo LR\Filters::escapeHtmlText($Session::clearSuccesses()) /* line 62 */;
			echo "\n";
		}
		return get_defined_vars();
	}


	/** {block title} on line 7 */
	public function blockTitle(array $ʟ_args): void
	{
		
	}


	/** {block css} on line 11 */
	public function blockCss(array $ʟ_args): void
	{
		
	}


	/** {block heading} on line 31 */
	public function blockHeading(array $ʟ_args): void
	{
		
	}


	/** {block content} on line 36 */
	public function blockContent(array $ʟ_args): void
	{
		
	}


	/** {block js} on line 54 */
	public function blockJs(array $ʟ_args): void
	{
		
	}

}
