<?php

class MainController extends Controller {
    /**
     * отображение категория
     */
    public function indexAction() {
        $this->view->cat = BaseModel::findBy('categories', array(), true);
        $this->view->display('main/mainpage');
    }

    /**
     * отображение товаров для выбранной категории и сами категории,
     * а так же пагинатор
     * @param int $id - ид категории
     * @param int $page - страница
     */
    public function reviewCatAction($id = 1, $page = 1) {
        $this->view->cat = BaseModel::findBy('categories', array(), true);

        $this->view->allgoods = BaseModel::getItemsForPage('goods', $page, $id);

        $messagesCount = BaseModel::getTotalCount('goods');
        $this->view->currentPage = $page;
        $this->view->totalPages = $pages = ceil($messagesCount / PAGE_SIZE_FOR_CAT);
        $this->view->pagerLinkTpl = Controller::url('main', 'reviewcat', $id, '{{PAGE}}');

        $this->view->display('main/viewcat');
    }

    /**
     * отображает товар
     * @param int $id - ид товара
     */
    public function reviewGoodsAction($id = 1) {
        $this->view->cat = BaseModel::findBy('categories', array(), true);
        $this->view->goods = BaseModel::findBy('goods', array('id' => $id));
        $this->view->display('main/viewgoods');
    }
}