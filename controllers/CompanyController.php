<?php
/**
 * Created by PhpStorm.
 * User: Matej
 * Date: 27.1.2015
 * Time: 12:55
 */

namespace app\controllers;


use app\models\IssuedInvoice;
use yii\data\Pagination;
use yii\web\Controller;

class CompanyController extends Controller {

    public function actionList() {

        $query = IssuedInvoice::find();
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);
        $issuedInvoices = $query->orderBy('name');

        return $this->render('list');
    }
}