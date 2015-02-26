<?= $this->displayPartial('common/navigation'); ?>
<div class="container container-shadow menu">
    <?= $this->displayPartial('main/parts/cat'); ?>
    <div class="col-md-10">
        <?= $this->displayPartial('main/parts/goods'); ?>
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
