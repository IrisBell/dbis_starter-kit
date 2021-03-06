<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Paper */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '论文', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paper-view">

    <p>
        <?php echo Html::a('更改', ['update', 'id' => $model->paper_id], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a('删除', ['delete', 'id' => $model->paper_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'paper_id',
            'project_id',
            'title',
            'author',
            'journal_name',
            'publish_time',
            'attachment',
        ],
    ]) ?>

</div>
