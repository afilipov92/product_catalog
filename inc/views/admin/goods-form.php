<?= $this->displayPartial('common/navigation'); ?>
<div class="container container-shadow menu">
    <?= $this->displayPartial('common/catgoods'); ?>
    <div class="container">
        <form id="form" name="form1" class="form-signin" method="post" enctype="multipart/form-data">
            <h3 class="form-signin-heading">Форма товара</h3>

            <div>
                <input id="id" type="hidden" name="id" value="<?= $this->data->id ?>">
            </div>
            <label for="title">Название товара <b class="color">*</b>:</label>
            <input id="title" name="title" type="text" class="form-control" required="true"
                   value="<?= $this->data->title ?>" placeholder="Введите название товара">
            <label for="description">Описание товара  <b class="color">*</b>:</label>
            <textarea id="description" name="description" class="form-control" rows="10" required
                      placeholder="Введите описание товара"><?= $this->data->description ?></textarea>
            <input type="hidden" name="image" value="<?= $this->data->image ?>">
            <label for="fileimage">Изображение товара :</label>
            <input id="fileimage" name="fileimage" type="file" class="form-control" accept="image/*,image/jpeg">
            <label for="price">Стоимость товара  <b class="color">*</b>:</label>
            <input id="price" name="price" type="text" class="form-control" required="true"
                   value="<?= $this->data->price ?>" placeholder="Введите стоимость товара">
            <label for="id_cat">Категория товара  <b class="color">*</b>:</label>
            <select id="id_cat" name="id_cat" class="form-control">
                <?php foreach ($this->allcat as $value) {
                    if ($this->data->id_cat == $value['id']) {
                        ?>
                        <option value="<?= $value['id'] ?>" selected><?= $value['title'] ?></option>
                    <?php } else { ?>
                        <option value="<?= $value['id'] ?>"><?= $value['title'] ?></option>
                    <?php } ?>
                <?php } ?>
            </select>
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