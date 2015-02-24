<?php

class AdminController extends Controller {
    /**
     * отображение выбора действия для администратора
     * категории и товары
     */
    public function indexAction() {
        $this->view->display('admin/choice');
    }

    /**
     * вывод всех товаров для редактирования
     * @param int $page
     */
    public function categoriesAction($page = 1) {
        $this->view->allcat = BaseModel::getItemsForPage('categories');

        $messagesCount = BaseModel::getTotalCount('categories');
        $this->view->currentPage = $page;
        $this->view->totalPages = $pages = ceil($messagesCount / PAGE_SIZE_FOR_CAT);
        $this->view->pagerLinkTpl = Controller::url('admin', 'categories', '{{PAGE}}');

        $this->view->display('admin/categories');
    }
}