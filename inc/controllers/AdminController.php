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
        $this->view->allcat = BaseModel::getItemsForPage('categories', $page);

        $messagesCount = BaseModel::getTotalCount('categories');
        $this->view->currentPage = $page;
        $this->view->totalPages = $pages = ceil($messagesCount / PAGE_SIZE_FOR_CAT);
        $this->view->pagerLinkTpl = Controller::url('admin', 'categories', '{{PAGE}}');

        $this->view->display('admin/categories');
    }

    /**
     * добавление новой категории
     */
    public function addCatAction() {
        $cat = new CategoryModel();
        if ($this->isPost()) {
            $cat->setAttributes($_POST);
            if ($cat->isFormVaild(true)) {
                if ($cat->addCat()) {
                    $this->redirectWithMes(Controller::url('admin', 'categories'),
                        "Категория успешно добавлена");
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

    /**
     * редактирование категории
     * @param int $id - ид категории
     */
    public function editCatAction($id = 1) {
        $cat = new CategoryModel();
        if ($this->isPost()) {
            $cat->setAttributes($_POST);
            if ($cat->isFormVaild()) {
                if ($cat->updateCat()) {
                    $this->redirectWithMes(Controller::url('admin', 'categories'),
                        "Категория успешно обновлена");
                } else {
                    $this->view->gbErrors['result'] = "Ошиба обновления категории";
                }
            } else {
                $this->view->gbErrors = $cat->getErrors();
            }
        }
        $elem = BaseModel::findBy('categories', array('id' => $id));
        if ($elem) {
            $cat->setAttributes($elem);
        } else {
            $this->redirectWithMes(Controller::url('admin', 'categories'),
                "Такой категории не существует!");
        }
        $this->view->data = $cat;
        $this->view->display('admin/cat-form');
    }

    /**
     * вывод всех товаров для редактирования
     * @param int $page - страница
     */
    public function goodsAction($page = 1) {
        $this->view->allgoods = BaseModel::getItemsForPage('goods', $page);

        $messagesCount = BaseModel::getTotalCount('goods');
        $this->view->currentPage = $page;
        $this->view->totalPages = $pages = ceil($messagesCount / PAGE_SIZE_FOR_CAT);
        $this->view->pagerLinkTpl = Controller::url('admin', 'goods', '{{PAGE}}');

        $this->view->display('admin/goods');
    }

    /**
     * добавление нового товара
     */
    public function addGoodsAction() {
        $goods = new GoodsModel();
        if ($this->isPost()) {
            $goods->setAttributes($_POST);
            if ($goods->uploadImage()) {
                if ($goods->isFormVaild()) {
                    if ($goods->addGoods(true)) {
                        $this->redirectWithMes(Controller::url('admin', 'goods'),
                            "Товар успешно добавлен");
                    } else {
                        $this->view->gbErrors['result'] = "Ошиба добавления товара";
                        if (!empty($goods->uploadimage)) {
                            unlink($goods->uploadimage);
                        }
                    }
                } else {
                    $this->view->gbErrors = $goods->getErrors();
                    if (!empty($goods->uploadimage)) {
                        unlink($goods->uploadimage);
                    }
                }
            } else {
                $this->view->gbErrors['image'] = "Ошибка загрузки изображения";
            }
        }
        $this->view->allcat = BaseModel::findBy('categories', array(), true);
        $this->view->data = $goods;
        $this->view->display('admin/goods-form');
    }

    /**
     * редктирование товара
     * @param int $id - ид товара
     */
    public function editGoodsAction($id = 1) {
        $goods = new GoodsModel();
        if ($this->isPost()) {
            $goods->setAttributes($_POST);
            if ($goods->uploadImage()) {
                if ($goods->isFormVaild()) {
                    if ($goods->updateGoods()) {
                        $this->redirectWithMes(Controller::url('admin', 'goods'),
                            "Товар успешно обновлен");
                    } else {
                        $this->view->gbErrors['result'] = "Ошиба добавления товара";
                        if (!empty($goods->uploadimage)) {
                            unlink($goods->uploadimage);
                        }
                    }
                } else {
                    $this->view->gbErrors = $goods->getErrors();
                    if (!empty($goods->uploadimage)) {
                        unlink($goods->uploadimage);
                    }
                }
            } else {
                $this->view->gbErrors['image'] = "Ошибка загрузки изображения";
            }
        }
        $elem = BaseModel::findBy('goods', array('id' => $id));
        if ($elem) {
            $goods->setAttributes($elem);
        } else {
            $this->redirectWithMes(Controller::url('admin', 'goods'),
                "Такой товар не существует!");
        }
        $this->view->allcat = BaseModel::findBy('categories', array(), true);
        $this->view->data = $goods;
        $this->view->display('admin/goods-form');
    }
}