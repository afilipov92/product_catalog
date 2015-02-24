<?= $this->displayPartial('common/navigation'); ?>
<div class="container container-shadow menu">
    <?= $this->displayPartial('common/cat'); ?>
    <div class="goods-review">
        <div class="col-md-3 goods-main">
            <img src="<?= Controller::url('images', 'goods', $this->goods['image']) ?>"/>
        </div>
        <div class="col-md-5">
            <p class="goods-title"><?= $this->goods['title'] ?></p>

            <p class="goods-price"><?= $this->goods['price'] . " руб." ?></p>

            <div>
                <button type="submit" class="btn btn-sm btn-success" name="submit">
                    <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Заказать
                </button>
            </div>
        </div>
        <div class="col-md-10">
            <p class="category">КРАТКАЯ ИНФОРМАЦИЯ</p>

            <p><?= $this->goods['description'] ?></p>
        </div>
    </div>
</div>