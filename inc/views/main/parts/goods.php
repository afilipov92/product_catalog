<?php foreach ($this->allgoods as $value) { ?>
    <div class="col-md-4 col-sm-4 col-xs-4 goods-preview">
        <a href="<?= Controller::url('main', 'reviewgoods', $value['id']) ?>">
            <div>
                <?php if (!empty($value['image'])) { ?>
                    <img src="<?= Controller::url('images', 'goods', $value['image']) ?>" width="187" height="264"/>
                <?php } else { ?>
                    <img src="<?= Controller::url('images', 'goods', 'no_image.jpg') ?>" width="187" height="264"/>
                <?php } ?>
                <p class="pre-goods-title"><?= $value['title'] ?></p>

                <p class="pre-goods-price"><span class="glyphicon glyphicon-shopping-cart"
                                                 aria-hidden="true"></span> <?= $value['price'] . " руб." ?></p>
            </div>
        </a>
    </div>
<?php } ?>