<?php

use yii\helpers\Html;
use backend\assets\BackendAsset;
use backend\widgets\Menu;

/* @var $this yii\web\View */
/* @var $model backend\models\AtdLate */

$this->title = Yii::t('backend', 'Apply Late', [
    'modelClass' => 'Atd Late',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Apply Late and Early Leave'),];
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile('@web/css/attendance/check-in-today/info.css', ['depends' => ['backend\assets\BackendAsset']]);
?>


<?php echo $this->render('_form', [
                'model' => $model,
                'info' =>$info,
])
 ?>
