<?php

use Latte\Runtime as LR;

/** source: /Users/nick/projects/mvc/resources/views/partials/dashboard/beginlayout.view.php */
final class Template5cd25eb5b3 extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		echo '<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $title ?? \'Dashboard\'; ?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css">
	<link rel="stylesheet" href="css/styles.css">
	<?php
	if (isset($css)) {
		foreach($css as $stylesheet) {
			echo "<link rel=\\"stylesheet\\" href=\\"';
		echo LR\Filters::escapeHtml($stylesheet) /* line 16 */;
		echo '\\">";
		}
	}
	?>

	<meta name="msapplication-TileImage" content="/images/favicons/win8-tile-144.png">
	<meta name="msapplication-TileColor" content="#1f379d">
	
	<link rel="shortcut icon" href="/images/favicons/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" href="/images/favicons/apple-touch-icon-192x192.png" sizes="192x192">

</head>

<body class="loggedin">

    <?php
	include \'navigation.view.php\';
	?>

	<div id="main-wrapper">


		<main>

			<header class="header-bar">
				<?php
					if (isset($heading)) {
						echo "<h1>';
		echo LR\Filters::escapeHtmlText($heading) /* line 43 */;
		echo '</h1>";
					} else if (isset($back)) {
						echo "<a class=\\"back\\" href=\\"';
		echo LR\Filters::escapeHtmlAttrUnquoted(LR\Filters::safeUrl($back)) /* line 45 */;
		echo '\\"><i class=\\"fas fa-arrow-circle-left fa-2x\\"></i></a>";
					}
				?>
			</header>

			<section class="content">';
		return get_defined_vars();
	}

}
