<?php

use Latte\Runtime as LR;

/** source: /Users/nick/projects/mvc/resources/views/partials/dashboard/navigation.view.php */
final class Template5e56b76c66 extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		echo '<?php

use App\\Helpers\\Request;
use App\\Helpers\\Session;

?>

<ul class="skip-nav">
    <li><a href="#main-wrapper">Skip to Main Content</a></li>
</ul>

<button id="nav-toggle"><i class="fas fa-bars"></i></button>
<nav id="main-nav" class="sidenav">
    <img class="logo" src="/images/logo.png" alt="Logo">
    <ul>

        <li class="<?= Request::active(\'dashboard\') ? \' active\' : \'\'; ?>">
            <a href="/dashboard">
                <i class="fas fa-chart-line" title="Dashboard"></i><span class="word">Dashboard</span>
            </a>
        </li>

        <?php /*
        if (Session::user()->isAdmin()) : ?>
            <li class="<?= Request::active(\'example\') ? \' active\' : \'\'; ?>">
                <a href="/example">
                    <i class="fas fa-users-cog" title="Admin Only"></i><span class="word">Admin Only</span>
                </a>
            </li>
        <?php endif 
        */ ?>

        
        <li class="<?= Request::active(\'my-account\') ? \' active\' : \'\'; ?>">
            <a href="/my-account">
                <i class="fas fa-user-circle" title="My Account"></i><span class="word">My Account</span>
            </a>
        </li>
        <li>
            <a href="/logout">
                <i class="fas fa-power-off" title="Logout"></i><span class="word">Logout</span>
            </a>
        </li>
    </ul>
</nav>';
		return get_defined_vars();
	}

}