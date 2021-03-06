<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Qingjiatiao */

$this->title = 'Update Qingjiatiao: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Qingjiatiaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="qingjiatiao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
