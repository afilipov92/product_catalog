<?= $this->displayPartial('common/navigation'); ?>
<div class="container container-shadow menu">
    <?= $this->displayPartial('common/catgoods'); ?>
    <div class="col-md-10">
        <div class="col-md-8 admin-goods-cat">
            <form action="<?= Controller::url('admin', 'addgoods') ?>" method="get">
                <button type="submit" class="btn btn-sm btn-success" name="submit">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Добавить товар
                </button>
            </form>
        </div>
        <div class="col-md-12">
        <?php foreach ($this->allgoods as $value) { ?>
            <div class="col-md-4 col-sm-4 col-xs-4 goods-preview">
                <a href="<?= Controller::url('admin', 'editgoods', $value['id']) ?>">
                    <div>
                        <?php if (!empty($value['image'])) { ?>
                            <img src="<?= Controller::url('images', 'goods', $value['image']) ?>" width="187"
                                 height="264"/>
                        <?php } else { ?>
                            <img src="<?= Controller::url('images', 'goods', 'no_image.jpg') ?>" width="187"
                                 height="264"/>
                        <?php } ?>

                        <p class="pre-goods-title"><?= $value['title'] ?></p>

                        <p class="pre-goods-price"><span class="glyphicon glyphicon-pencil"
                                                         aria-hidden="true"></span> Редактировать</p>
                    </div>
                </a>
            </div>
        <?php } ?>
        <div class="col-md-10 col-sm-10 col-xs-10">
            <?php
            $this->displayPartial('common/pager', array(
                'currentPage' => $this->currentPage,
                'totalPages' => $this->totalPages,
                'pagerLinkTpl' => $this->pagerLinkTpl
            ));
            ?>
        </div>
            </div>
    </div>
</div>