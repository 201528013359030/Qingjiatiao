<?php

namespace app\controllers;

use Yii;
use app\models\Leavebill;
use app\models\LeavebillSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Employee;

/**
 * LeavebillController implements the CRUD actions for Leavebill model.
 */
class LeavebillController extends Controller {
	/**
	 * @inheritdoc
	 */
	public function behaviors() {
		return [
				'verbs' => [
						'class' => VerbFilter::className (),
						'actions' => [
								'delete' => [
										'POST'
								]
						]
				]
		];
	}

	/**
	 * Lists all Leavebill models.
	 *
	 * @return mixed
	 */
	public function actionIndex() {
		$request = Yii::$app->request;

		$customers = Employee::find ()->where ( [
				'username' => 'admin'
				//'username' => $request->queryParams['r']
		] )->asArray()->all ();
// 		foreach($customers as $x=>$x_value) {
// 			echo "Key=" . $x . ", Value=" . $x_value;
// 			echo "<br>";
// 		}
print_r($customers);
//echo $customers[0]['id'];
		if ($customers) {

			$searchModel = new LeavebillSearch ();
			$dataProvider = $searchModel->search ( $request->queryParams );

			return $this->render ( 'index', [
					'searchModel' => $searchModel,
					'dataProvider' => $dataProvider
			] );
		} else {
			echo "用户不存在";
		}
	}
	/**
	 * Displays a single Leavebill model.
	 *
	 * @param string $id
	 * @return mixed
	 */
	public function actionView($id) {
		return $this->render ( 'view', [
				'model' => $this->findModel ( $id )
		] );
	}

	/**
	 * Creates a new Leavebill model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 *
	 * @return mixed
	 */
	public function actionCreate() {
		$model = new Leavebill ();



		if ($model->load ( Yii::$app->request->post () ) && $model->save ()) {

// 			echo $model->id;
	//	print_r(Yii::$app->request->post( 1)) ;
		return $this->redirect ( [
 					'view',
					'id' => $model->id
 			] );
		} else {


			$request=Yii::$app->request;


			return $this->renderPartial( 'index', [
					'model' => $model,
					'request'=>$request->get('ffff','e')
			] );
		}
	}

	/**
	 * Updates an existing Leavebill model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 *
	 * @param string $id
	 * @return mixed
	 */
	public function actionUpdate($id) {
		$model = $this->findModel ( $id );

		if ($model->load ( Yii::$app->request->post () ) && $model->save ()) {
			return $this->redirect ( [
					'view',
					'id' => $model->id
			] );
		} else {
			return $this->render ( 'update', [
					'model' => $model
			] );
		}
	}

	/**
	 * Deletes an existing Leavebill model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 *
	 * @param string $id
	 * @return mixed
	 */
	public function actionDelete($id) {
		$this->findModel ( $id )->delete ();

		return $this->redirect ( [
				'index'
		] );
	}

	/**
	 * Finds the Leavebill model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 *
	 * @param string $id
	 * @return Leavebill the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id) {
		if (($model = Leavebill::findOne ( $id )) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException ( 'The requested page does not exist.' );
		}
	}
}
