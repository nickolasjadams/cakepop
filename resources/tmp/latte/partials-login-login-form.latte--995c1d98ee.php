<?php

use Latte\Runtime as LR;

/** source: /Users/nick/projects/mvc/resources/views/partials/login/login-form.latte */
final class Template995c1d98ee extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		if (isset($errors['login_mismatch'])) /* line 1 */ {
			echo '    ';
			echo LR\Filters::escapeHtmlText(bs4_alert("danger", $errors['login_mismatch'])) /* line 2 */;
			echo "\n";
		}
		echo '
<form action="/login" method="POST">
    <input type="email" name="email" required placeholder="Email" title="Email">
    <input type="password" name="password" required placeholder="Password" title="Password">
    <button class="fw mb20 btn btn-primary" type="submit">Log in</button>
</form>
<a href="#" class="block tar">Forgot password?</a>';
		return get_defined_vars();
	}

}
