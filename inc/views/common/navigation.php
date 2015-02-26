<div class="container-shadow">
    <div class="navigation navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="<?= Controller::url('main') ?>">
                    <img alt="Brand" src="<?= Controller::url('images', 'logo', 'logo.png') ?>" width="40" height="40">
                </a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav nav-color-text">
                    <li><a href="<?= Controller::url('main') ?>"><span class="glyphicon glyphicon-home"
                                                                       aria-hidden="true"></span> Главная</a></li>
                    <li><a href="<?= Controller::url('admin') ?>"><span class="glyphicon glyphicon-king"
                                                                        aria-hidden="true"></span> Админка</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
