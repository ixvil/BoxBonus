<nav class="navbar main">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".main-collapse">
            <span class="sr-only"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <div class="collapse navbar-collapse main-collapse">
        <ul class="nav nav-tabs">
            <li>{!! link_to("/", "Home", 'target="_blank"') !!}</li>
            <li @if (Request::is('users/grid')) class="active"@endif>{!! link_to("users/grid", "Пользователи") !!}</li>
            <li @if (Request::is('customers/grid')) class="active"@endif>{!! link_to("customers/grid", "Покупатели") !!}</li>

            <li @if (Request::is('partners/grid')) class="active"@endif>{!! link_to("partners/grid", "Партнеры") !!}</li>
            <li @if (Request::is('gifts/grid')) class="active"@endif>{!! link_to("gifts/grid", "Подарки") !!}</li>


        </ul>
    </div>
</nav>
