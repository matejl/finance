<?php
/**
 * Created by PhpStorm.
 * User: Matej
 * Date: 26.1.2015
 * Time: 19:55
 */

namespace app\controllers;


use app\models\IssuedInvoice;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class IssuedInvoiceController extends Controller {

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex() {
        return $this->actionList();
    }

    // todo not finished
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