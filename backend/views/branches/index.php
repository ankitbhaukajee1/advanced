<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BranchesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Branches';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="branches-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Branches', ['value'=>Url::to('index.php/branches/create'), 'class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p>
    <?php 
    	Modal::begin([
    		'header'=>'<h2>Branches</h2>',
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

            
            [
            	'attribute'=>'companies_company_id',
            	'label'=>'Company Name',
            	'value'=>'companiesCompany.company_name',
            ],
            'branch_name',
            'branch_address',
            'branch_created_date',
            // 'branch_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
	<?php Pjax::end();?>
</div>
