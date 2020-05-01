<?php
declare(strict_types=1);

namespace App\Controllers;

class TestController extends ControllerBase
{

    public function indexAction()
    {
        $db = $this->getDI()->get('db');

        $sql = "SELECT * from murid";

        $result = $db->fetchOne($sql, \Phalcon\Db\Enum::FETCH_ASSOC);

        echo var_dump($result);
    }

}