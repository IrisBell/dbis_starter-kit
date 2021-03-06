<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\query\PaperQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '论文';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paper-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('插入论文', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'paper_id',
            'project_id',
            'title',
            'author',
            'journal_name',
            // 'publish_time',
            // 'attachment',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
