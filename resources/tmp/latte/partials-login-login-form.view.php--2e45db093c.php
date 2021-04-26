<?php

use Latte\Runtime as LR;

/** source: /Users/nick/projects/mvc/resources/views/partials/login/login-form.view.php */
final class Template2e45db093c extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		echo '<?php

if (isset($errors[\'login_mismatch\'])) {
    bs4_alert("danger", $errors[\'login_mismatch\']);
}

?>

<form action="/login" method="POST">
    <input type="email" name="email" required placeholder="Email" title="Email">
    <input type="password" name="password" required placeholder="Password" title="Password">
    <button class="fw mb20 btn btn-primary" type="submit">Log in</button>
</form>
<a href="#" class="block tar">Forgot password?</a>';
		return get_defined_vars();
	}

}
