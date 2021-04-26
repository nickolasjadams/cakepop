<?php

use Latte\Runtime as LR;

/** source: /Users/nick/projects/mvc/resources/views/dashboard.latte */
final class Template019a4a1391 extends Latte\Runtime\Template
{
	protected const BLOCKS = [
		['title' => 'blockTitle', 'heading' => 'blockHeading', 'content' => 'blockContent'],
	];


	public function main(): array
	{
		extract($this->params);
		echo "\n";
		if ($this->getParentName()) {
			return get_defined_vars();
		}
		$this->renderBlock('title', get_defined_vars()) /* line 3 */;
		echo '

';
		$this->renderBlock('heading', get_defined_vars()) /* line 5 */;
		echo '

';
		$this->renderBlock('content', get_defined_vars()) /* line 11 */;
		echo '


';
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		$this->parentName = 'partials/dashboard/layout.latte';
		
	}


	/** {block title} on line 3 */
	public function blockTitle(array $ʟ_args): void
	{
		echo 'Dashboard';
	}


	/** {block heading} on line 5 */
	public function blockHeading(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '	<h1>Welcome ';
		echo LR\Filters::escapeHtmlText($user->first_name) /* line 6 */;
		echo '</h1>
';
	}


	/** {block content} on line 11 */
	public function blockContent(array $ʟ_args): void
	{
		echo '	<h2>Dashboard</h2>
';
	}

}
