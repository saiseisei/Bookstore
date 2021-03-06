<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Bookstore\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class TestController extends AbstractActionController {

    protected $userInfoTable;

    public function indexAction() {
        //テスト
        $view = new ViewModel;
        $resultSet = $this->getUserInfoTable()->fetchAll();
        $view->data = $resultSet;
        return $view;
    }

    public function getUserInfoTable() {
        if (!$this->userInfoTable) {
            $sm = $this->getServiceLocator();
            $this->userInfoTable = $sm->get('Bookstore\Model\UserInfoTable');
            echo '<pre>';
            var_dump($this->userInfoTable);
            echo '</pre>';
        }
        return $this->userInfoTable;
    }

}
