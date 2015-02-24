<?= $this->displayPartial('common/navigation'); ?>
<div class="container container-shadow menu">
    <?= $this->displayPartial('common/catgoods'); ?>

    <button></button>

    <?php foreach ($this->allcat as $value) { ?>
        <div class="col-md-6">
            <a href="<?= Controller::url('admin', 'addcategory', $value['id']) ?>">
                <p class="pre-goods-title"><?= $value['title'] ?></p>
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