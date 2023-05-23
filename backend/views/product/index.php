<?php
    /**
     * @var \yii\data\ActiveDataProvider $dataProvider
     */

use yii\grid\GridView;
use yii\widgets\ListView;

?>

<div class="control-panel">
    <a class="btn-success btn" href="<?= \yii\helpers\Url::to(['product/create'])?>">Создать</a>
</div>

<?=   GridView::widget([
    'dataProvider' => $dataProvider,
]);
?>



