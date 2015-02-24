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

    public function addCatAction() {
        $cat = new CategoryModel();
        if($this->isPost()) {
            $cat->setAttributes($_POST);
            if($cat->isFormVaild()) {
                if($cat->addCat()) {
                    $this->redirect(Controller::url('admin', 'categories'));
                } else {
                    $this->view->gbErrors['result'] = "Ошиба добавления категории";
                }
            } else {
                $this->view->gbErrors = $cat->getErrors();
            }
        }
        $this->view->data = $cat;
        $this->view->display('admin/cat-form');
    }

    public function editCatAction($id = 1) {
        $cat = new CategoryModel();
        if($this->isPost()) {
            $cat->setAttributes($_POST);
            if($cat->isFormVaild()) {
                if($cat->addCat()) {
                    $this->redirect(Controller::url('admin', 'categories'));
                } else {
                    $this->view->gbErrors['result'] = "Ошиба обновления категории";
                }
            } else {
                $this->view->gbErrors = $cat->getErrors();
            }
        }
        $elem = BaseModel::findBy('categories', array('id' => $id));
        if($elem) {
            $cat->setAttributes($elem);
        } else {
            $this->redirect(Controller::url('admin', 'categories'));
        }
        $this->view->data = $cat;
        $this->view->display('admin/cat-form');
    }
}