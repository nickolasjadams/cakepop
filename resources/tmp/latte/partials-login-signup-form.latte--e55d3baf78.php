<?php

use Latte\Runtime as LR;

/** source: /Users/nick/projects/mvc/resources/views/partials/login/signup-form.latte */
final class Templatee55d3baf78 extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		echo '
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="signupModalLabel">Sign up</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">

            <div class="signup-form-wrapper">
                <form action="/signup" method="POST" class="row">
';
		if (isset($errors['signup_errors'])) /* line 15 */ {
			echo '                        ';
			echo LR\Filters::escapeHtmlText(bs4_alert("danger", $errors['signup_errors'])) /* line 16 */;
			echo "\n";
		}
		echo '
                    <div class="flexcol50 input-field ';
		echo LR\Filters::escapeHtmlAttr(invalid_form_element('first_name')) /* line 19 */;
		echo '">
                        <div class="error">';
		echo LR\Filters::escapeHtmlText(validate_form('first_name')) /* line 20 */;
		echo '</div>
                        <input type="text" name="first_name" required placeholder="First Name" title="First Name" value="';
		echo LR\Filters::escapeHtmlAttr(persisted('first_name')) /* line 21 */;
		echo '">
                    </div>
                    <div class="flexcol50 input-field ';
		echo LR\Filters::escapeHtmlAttr(invalid_form_element('last_name')) /* line 23 */;
		echo '">
                        <div class="error">';
		echo LR\Filters::escapeHtmlText(validate_form('last_name')) /* line 24 */;
		echo '</div>
                        <input type="text" name="last_name" required placeholder="Last Name" title="Last Name" value="';
		echo LR\Filters::escapeHtmlAttr(persisted('last_name')) /* line 25 */;
		echo '">
                    </div>
                    <div class="flexcol100 input-field ';
		echo LR\Filters::escapeHtmlAttr(invalid_form_element('email')) /* line 27 */;
		echo '">
                        <div class="error">';
		echo LR\Filters::escapeHtmlText(validate_form('email')) /* line 28 */;
		echo '</div>
                        <input type="email" name="email" required placeholder="Email" title="Email" value="';
		echo LR\Filters::escapeHtmlAttr(persisted('email')) /* line 29 */;
		echo '">
                    </div>
                    <div class="flexcol100 input-field ';
		echo LR\Filters::escapeHtmlAttr(invalid_form_element('password')) /* line 31 */;
		echo '">
                        <div class="error">';
		echo LR\Filters::escapeHtmlText(validate_form('password')) /* line 32 */;
		echo '</div>
                        <input type="password" name="password" required placeholder="Password" title="Password">
                    </div>
                    <div class="pw-criteria"></div>

                    <div class="pw-hint" data-toggle="tooltip" data-html="true" title="

                    <div>at least 8 characters in length.</div>
                    <div></i>at least 1 lowercase letter.</div>
                    <div></i>has at least 1 uppercase letter.</div>
                    <div></i>has at least 1 number.</div>
                    <div></i>has at least 1 special character.</div>


                    "><span class="far fa-question-circle"></span></div>
                    <button type="submit" disabled class="fw btn btn-primary">Sign Up</button>
                    
                </form>
            </div>

        </div>
    </div>
    </div>
</div>';
		return get_defined_vars();
	}

}
