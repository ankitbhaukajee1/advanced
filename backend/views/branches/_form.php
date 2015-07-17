<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Companies;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\Branches */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="branches-form">

    <?php $form = ActiveForm::begin(); ?>

  
    <?php echo $form->field($model, 'companies_company_id')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Companies::find()->all(),'company_id','company_name'),
    'language' => 'en',
    'options' => ['placeholder' => 'Select a company ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
	]); ?>		

    <?= $form->field($model, 'branch_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'branch_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'branch_status')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', '' => '', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
