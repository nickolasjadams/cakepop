<?php

use Latte\Runtime as LR;

/** source: /Users/nick/projects/mvc/resources/views/partials/dashboard/navigation.latte */
final class Templatef7cdb59760 extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		$Request = App\Helpers\Request::class /* line 1 */;
		$Session = App\Helpers\Session::class /* line 2 */;
		echo '
<ul class="skip-nav">
    <li><a href="#main-wrapper">Skip to Main Content</a></li>
</ul>

<button id="nav-toggle"><i class="fas fa-bars"></i></button>
<nav id="main-nav" class="sidenav">
    <img class="logo" src="/images/logo.png" alt="Logo">
    <ul>

        <li class="';
		echo LR\Filters::escapeHtmlAttr($Request::active('dashboard') ? ' active' : '') /* line 13 */;
		echo '">
            <a href="/dashboard">
                <i class="fas fa-chart-line" title="Dashboard"></i><span class="word">Dashboard</span>
            </a>
        </li>

';
		if (($Session::user()->isAdmin())) /* line 19 */ {
			echo '            <li class="';
			echo LR\Filters::escapeHtmlAttr($Request::active('example') ? ' active' : '') /* line 20 */;
			echo '">
                <a href="/example">
                    <i class="fas fa-users-cog" title="Admin Only"></i><span class="word">Admin Only</span>
                </a>
            </li>
';
		}
		echo '
        
        <li class="';
		echo LR\Filters::escapeHtmlAttr($Request::active('my-account') ? ' active' : '') /* line 28 */;
		echo '">
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
