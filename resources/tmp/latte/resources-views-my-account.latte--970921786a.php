<?php

use Latte\Runtime as LR;

/** source: /Users/nick/projects/mvc/resources/views/my-account.latte */
final class Template970921786a extends Latte\Runtime\Template
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
		echo 'My Account';
	}


	/** {block heading} on line 5 */
	public function blockHeading(array $ʟ_args): void
	{
		echo '	<h1>Settings</h1>
';
	}


	/** {block content} on line 11 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		if (isset($errors['db_update'])) /* line 12 */ {
			echo '		';
			echo LR\Filters::escapeHtmlText(bs4_alert("danger", $errors['db_update'])) /* line 13 */;
			echo "\n";
		}
		elseif (isset($successes['password_change'])) /* line 14 */ {
			echo '		';
			echo LR\Filters::escapeHtmlText(bs4_alert("success", $successes['password_change'])) /* line 15 */;
			echo "\n";
		}
		elseif (isset($successes['info_change'])) /* line 16 */ {
			echo '		';
			echo LR\Filters::escapeHtmlText(bs4_alert("success", $successes['info_change'])) /* line 17 */;
			echo "\n";
		}
		echo '
	<h2>Change Password</h2>
	<form class="settings-form" action="/my-account-password" method="POST">
		<div class="form-element ';
		echo LR\Filters::escapeHtmlAttr(invalid_form_element('old_password')) /* line 22 */;
		echo '">
			<label for="old_password">Old Password <span>* ';
		echo LR\Filters::escapeHtmlText(validate_form('old_password')) /* line 23 */;
		echo '</span></label>
			<input type="password" name="old_password" id="old_password" required>
		</div>
		<div class="form-element ';
		echo LR\Filters::escapeHtmlAttr(invalid_form_element('new_password')) /* line 26 */;
		echo '">
			<label for="new_password">New Password <span>* ';
		echo LR\Filters::escapeHtmlText(validate_form('new_password')) /* line 27 */;
		echo '</span></label>
			<input type="password" name="new_password" id="new_password" required>
		</div>
		<div class="form-element ';
		echo LR\Filters::escapeHtmlAttr(invalid_form_element('confirm_password')) /* line 30 */;
		echo '">
			<label for="confirm_password">Confirm Password <span>* ';
		echo LR\Filters::escapeHtmlText(validate_form('confirm_password')) /* line 31 */;
		echo '</span></label>
			<input type="password" name="confirm_password" id="confirm_password" required>
		</div>
		<button type="submit" class="btn btn-primary">Update Password</button>
	</form>

	<hr>

	<h2>User Info</h2>
	<form class="settings-form" action="/my-account-info" method="POST">
		<div class="form-element ';
		echo LR\Filters::escapeHtmlAttr(invalid_form_element('email')) /* line 41 */;
		echo '">
			<label for="email">Email <span>* ';
		echo LR\Filters::escapeHtmlText(validate_form('email')) /* line 42 */;
		echo '</span></label>
			<input type="email" name="email" id="email" value="';
		echo LR\Filters::escapeHtmlAttr(persisted_or_stored('email', $user->email)) /* line 43 */;
		echo '" required>
		</div>

		<div class="form-element ';
		echo LR\Filters::escapeHtmlAttr(invalid_form_element('first_name')) /* line 46 */;
		echo '">
			<label for="first_name">First Name <span>* ';
		echo LR\Filters::escapeHtmlText(validate_form('first_name')) /* line 47 */;
		echo '</span></label>
			<input type="text" name="first_name" id="first_name" value="';
		echo LR\Filters::escapeHtmlAttr(persisted_or_stored('first_name', $user->first_name)) /* line 48 */;
		echo '" required>
		</div>

		<div class="form-element ';
		echo LR\Filters::escapeHtmlAttr(invalid_form_element('last_name')) /* line 51 */;
		echo '">
			<label for="last_name">Last Name <span>* ';
		echo LR\Filters::escapeHtmlText(validate_form('last_name')) /* line 52 */;
		echo '</span></label>
			<input type="text" name="last_name" id="last_name" value="';
		echo LR\Filters::escapeHtmlAttr(persisted_or_stored('last_name', $user->last_name)) /* line 53 */;
		echo '" required>
		</div>

		<button type="submit" class="btn btn-primary">Save</button>


	</form>

';
	}

}
