<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 31.05.14
 * Time: 23:26
 */

class SidebarFilterWidget extends CWidget {

    public $params = array();

    public function run()
    {
        $this->params['car_list'] = Car::getCarList();
        $this->params['category_list'] = Category::getCategoryList();

        $this->render('_view', $this->params);
    }
}

