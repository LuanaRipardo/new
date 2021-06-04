<aside id="sidebar-wrapper">
  <div class="sidebar-brand">
    <a href="{{ route('admin.dashboard') }}">
        <img src="{{ asset('principal/img/logo/logo.png') }}" width="140">
    </a>
  </div>
  <div class="sidebar-brand sidebar-brand-sm">
    <a href="#">MF</a>
  </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="{{ Request::route()->getName() == 'admin.dashboard' ? ' active' : '' }}"><a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fa fa-columns"></i> <span>Dashboard</span></a></li>

        @if(Auth::user()->can('manage-users'))
            <li class="menu-header">Controle</li>
            <li class="{{ Request::route()->getName() == 'admin.users' ? ' active' : '' }}"><a class="nav-link" href="{{ route('admin.users') }}"><i class="fa fa-users"></i> <span>Usuários</span></a></li>
            <li class="dropdown {{ \App\Support\Helpers\UrlCheck::check('admin/control/pubs*') }}">
                <a href="#" class="nav-link has-dropdown"><i class="ti ti-pencil-alt"></i> <span>Blog</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ \App\Support\Helpers\UrlCheck::check('admin/control/pubs/categories*') }}"><a class="nav-link" href="{{ route('admin.categories.index') }}"><span>Categorias</span></a></li>
                    <li class="{{ \App\Support\Helpers\UrlCheck::check('admin/control/pubs/posts*') }}"><a class="nav-link" href="{{ route('admin.posts.index') }}"><span>Publicações</span></a></li>
                </ul>
            </li>
            <li class="dropdown {{ \App\Support\Helpers\UrlCheck::check('admin/control/bikes*') }}">
                <a href="#" class="nav-link has-dropdown"><i class="ti ti-gallery"></i> <span>Motos</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ \App\Support\Helpers\UrlCheck::check('admin/control/bike-category*') }}"><a class="nav-link" href="{{ route('admin.bike-category.index') }}"><span>Nova categoria</span></a></li>
                    <li class="{{ \App\Support\Helpers\UrlCheck::check('admin/control/bikes*') }}"><a class="nav-link" href="{{ route('admin.bikes.index') }}"><span>Nova moto</span></a></li>
                </ul>
            </li>
            <li class="{{ \App\Support\Helpers\UrlCheck::check('admin/control/contacts*') }}"><a class="nav-link" href="{{ route('admin.contacts.index') }}"><i class="ti ti-align-center"></i> <span>Mensagens</span></a></li>
            <li class="dropdown {{ \App\Support\Helpers\UrlCheck::check('admin/control/settings/banners*') }}">
                <a href="#" class="nav-link has-dropdown"><i class="ti ti-settings"></i> <span>Configurações</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ \App\Support\Helpers\UrlCheck::check('admin/control/settings/banners/*') }}"><a class="nav-link" href="{{ route('admin.banners.index') }}"><span>Banner principal</span></a></li>
                    <li class="{{ \App\Support\Helpers\UrlCheck::check('admin/control/settings/banners-motorcycle*') }}"><a class="nav-link" href="{{ route('admin.banners-motorcycle.index') }}"><span>Banner de motos</span></a></li>
                </ul>
            </li>
        @endif
    </ul>
</aside>
