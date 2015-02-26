<?= $this->displayPartial('common/navigation'); ?>
<div class="container container-shadow menu">
    <?= $this->displayPartial('main/parts/cat'); ?>
    <div class="col-md-10">
        <div class="goods-review">
            <div class="col-md-3 goods-main">
                <?php if (!empty($this->goods['image'])) { ?>
                    <img src="<?= Controller::url('images', 'goods', $this->goods['image']) ?>" width="187"
                         height="264"/>
                <?php } else { ?>
                    <img src="<?= Controller::url('images', 'goods', 'no_image.jpg') ?>" width="187" height="264"/>
                <?php } ?>
            </div>
            <div class="col-md-5">
                <p class="goods-title"><?= $this->goods['title'] ?></p>

                <p class="goods-price"><?= $this->goods['price'] . " руб." ?></p>

                <div>
                    <form id="order" action="" method="">
                        <button type="submit" class="btn btn-sm btn-success" name="submit">
                            <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Заказать
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-md-10">
                <p class="category">КРАТКАЯ ИНФОРМАЦИЯ</p>

                <p><?= $this->goods['description'] ?></p>
            </div>
        </div>
    </div>
</div>