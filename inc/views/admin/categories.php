<?= $this->displayPartial('common/navigation'); ?>
<div class="container container-shadow menu">
    <?= $this->displayPartial('common/catgoods'); ?>
    <div class="col-md-10">
        <div class="col-md-8 admin-goods-cat">
            <form action="<?= Controller::url('admin', 'addcat') ?>" method="get">
                <button type="submit" class="btn btn-sm btn-success" name="submit">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Добавить категорию
                </button>
            </form>
        </div>
        <div class="col-md-6 admin-cat">
            <h4> <b class="color">*</b> Нажмите на категорию для редактирования</h4>
            <?php foreach ($this->allcat as $value) { ?>
                <a href="<?= Controller::url('admin', 'editcat', $value['id']) ?>">
                    <p><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> <?= $value['title'] ?></p>
                </a>
            <?php } ?>
        </div>

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
</div>