<?= $this->displayPartial('common/navigation'); ?>
<div class="container container-shadow menu">
    <?= $this->displayPartial('common/cat'); ?>
    <?php foreach ($this->allgoods as $value) { ?>
        <div class="col-md-4 goods-preview">
            <a href="<?= Controller::url('main', 'reviewgoods', $value['id']) ?>">
                <div>
                    <img src="<?= Controller::url('images', 'goods', $value['image']) ?>"/>

                    <p class="pre-goods-title"><?= $value['title'] ?></p>

                    <p class="pre-goods-price"><span class="glyphicon glyphicon-shopping-cart"
                                                     aria-hidden="true"></span> <?= $value['price'] . " руб." ?></p>
                </div>
            </a>
        </div>
    <?php } ?>
    <div class="col-md-10">
        <?php
        $this->displayPartial('common/pager', array(
            'currentPage' => $this->currentPage,
            'totalPages' => $this->totalPages,
            'pagerLinkTpl' => $this->pagerLinkTpl
        ));
        ?>
    </div>
</div>
