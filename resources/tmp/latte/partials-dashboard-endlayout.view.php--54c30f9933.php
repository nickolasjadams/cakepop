<?php

use Latte\Runtime as LR;

/** source: /Users/nick/projects/mvc/resources/views/partials/dashboard/endlayout.view.php */
final class Template54c30f9933 extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		echo '<?php

use App\\Helpers\\Session;        

?>

    </div>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="js/dashboard.js"></script>
<script src="js/scripts.js"></script>
<?php
	if (isset($js)) {
		foreach($js as $script) {
            echo "<script src=\\"';
		echo LR\Filters::escapeHtml($script) /* line 18 */;
		echo '\\"></script>";
		}
	}
	if (isset($include_inline_js)) {
		include $include_inline_js;
	}
?>
</body>
</html>

<?php

if (Session::getErrors() > 0) {
	Session::clearErrors();
}
if (Session::getSuccesses() > 0) {
	Session::clearSuccesses();
}

?>';
		return get_defined_vars();
	}

}
