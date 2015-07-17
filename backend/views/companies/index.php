<?php

use yii\helpers\Html;
use yii\grid\GridView;
use dosamigos\datepicker\DatePicker;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CompaniesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Companies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="companies-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Companies', ['value'=>Url::to('index.php/companies/create'), 'class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p>
    <?php 
    	Modal::begin([
    		'header'=>'<h2>Companies</h2>',
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

           
            'company_name',
            'company_email:email',
            'company_address',
            'company_created_date',
            'company_inception',
            [
            	'attribute'=>'company_inception',
            	'value'=>'company_inception',
            	'format'=>'raw',
            	'filter'=>DatePicker::widget([
					    'model' => $searchModel,
					    'attribute' => 'company_inception',
					    'template' => '{addon}{input}',
					        'clientOptions' => [
					            'autoclose' => true,
					            'format' => 'yyyy-m-d',
					        ]
					])
            ],
            // 'company_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
	<?php Pjax::end();?>
</div>
