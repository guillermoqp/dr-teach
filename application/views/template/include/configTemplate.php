<ul class="nav navbar-nav-custom">
<li>
    <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');"><i class="fa fa-bars fa-fw"></i></a>
</li>
<li class="dropdown">
    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
        <i class="gi gi-settings"></i>
    </a>
    <ul class="dropdown-menu dropdown-custom dropdown-options">
        <li class="dropdown-header text-center">Estilo de Cabecera</li>
        <li>
            <div class="btn-group btn-group-justified btn-group-sm">
                <a href="javascript:void(0)" class="btn btn-primary" id="options-header-default">Light</a>
                <a href="javascript:void(0)" class="btn btn-primary" id="options-header-inverse">Dark</a>
            </div>
        </li>
        <li class="dropdown-header text-center">Estilo de Vista</li>
        <li>
            <div class="btn-group btn-group-justified btn-group-sm">
                <a href="javascript:void(0)" class="btn btn-primary" id="options-main-style">Defecto</a>
                <a href="javascript:void(0)" class="btn btn-primary" id="options-main-style-alt">Alternativo</a>
            </div>
        </li>
        <li class="dropdown-header text-center">Layout Principal</li>
        <li>
            <button class="btn btn-sm btn-block btn-primary" id="options-header-top">Fixed Side/Header (Top)</button>
            <button class="btn btn-sm btn-block btn-primary" id="options-header-bottom">Fixed Side/Header (Bottom)</button>
        </li>
        <li class="dropdown-header text-center">Pie de pagina</li>
        <li>
            <div class="btn-group btn-group-justified btn-group-sm">
                <a href="javascript:void(0)" class="btn btn-primary" id="options-footer-static">Defecto</a>
                <a href="javascript:void(0)" class="btn btn-primary" id="options-footer-fixed">Fixed</a>
            </div>
        </li>
    </ul>
</li>
</ul>
<form action="<?php print(base_url()) ?>" method="post" class="navbar-form-custom" role="search">
<div class="form-group">
    <input type="text" id="top-search" name="top-search" class="form-control" placeholder="Buscar..">
</div>
</form>