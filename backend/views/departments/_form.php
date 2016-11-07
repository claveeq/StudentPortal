<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;

use backend\models\branches;
use backend\models\companies;

/* @var $this yii\web\View */
/* @var $model backend\models\Departments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="departments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'companies_company_id')->dropDownList(
        ArrayHelper::map(companies::find()->all(),'company_id','company_name'), 
        [
            'prompt' => 'Select a Company',
            'onchange' => 
                '$.post("index.php?r=branches/lists&id='.'"+$(this).val(), function (data){
                    $("select#departments-branches_branch_id").html(data);
                });'
        ]); ?>

    <?= $form->field($model, 'branches_branch_id')->dropDownList(
    	ArrayHelper::map(Branches::find()->all(),'branch_id','branch_name'), ['prompt' => 'Select a Branch']); ?>

    <?= $form->field($model, 'department_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'department_status')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
