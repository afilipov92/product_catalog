<?= $this->displayPartial('common/navigation'); ?>
<div class="container container-shadow menu">
    <?= $this->displayPartial('common/catgoods'); ?>
    <div class="container">
        <form id="form" name="form1" class="form-signin" method="post">
            <h3 class="form-signin-heading">Форма категории</h3>

            <div>
                <input id="id" type="hidden" name="id" value="<?= $this->data->id ?>">
            </div>
            <label for="title">Название категории  <b class="color">*</b>:</label>
            <input id="title" name="title" type="text" class="form-control" required="true"
                   value="<?= $this->data->title ?>" placeholder="Введите название категории">
            <button id="" name="submit" class="btn btn-lg btn-save btn-block">Сохранить</button>
            <?php
            if (isset($this->gbErrors) AND !empty($this->gbErrors)) {
                ?>
                <div class="form-group">
                    <div class="alert alert-warning">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <ul>
                            <?php foreach ($this->gbErrors as $fieldName => $error) { ?>
                                <li><strong><?= $fieldName ?></strong> <?= $error ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            <?php } ?>
        </form>
    </div>
</div>