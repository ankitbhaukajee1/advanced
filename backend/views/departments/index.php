<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DepartmentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Departments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="departments-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Departments', ['value'=>'index.php/departments/create', 'class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p>
    <?php 
    	Modal::begin([
    		'header'=>'<h2>Departments</h2>',
    		'id'=>'modal',
    		'size'=>'modal-lg',
    	]);
    	echo "<div id='modalContent'></div>";
    	Modal::end();
    ?>
	<?php Pjax::begin();?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'department_id',
			[
				'attribute'=>'companies_company_id',
				'label'=>'Company Name',
				'value'=>'companiesCompany.company_name'
			],
            
			[
				'attribute'=>'branches_branch_id',
				'label'=>'Branch Name',
				'value'=>'branchesBranch.branch_name'
			],
			
            'department_name',
            'department_created_date',
            // 'department_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
	<?php Pjax::end();?>
</div>
