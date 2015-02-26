<div class="col-md-2 col-sm-2 col-xs-4">
    <p class="category">Категории</p>
    <ul>
        <?php foreach ($this->cat as $value) { ?>
            <li><a href="<?= Controller::url('main', 'reviewcat', $value['id']) ?>"> <?= $value['title'] ?></a></li>
        <?php } ?>
    </ul>
</div>
