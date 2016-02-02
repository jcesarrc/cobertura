<?php

use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

$this->registerJs('$("#all").click(function(){
            if($("#all").is(":checked")){
                $("input[name=seleccionados]").each(function(){
                    $(this).attr("checked", true);
                });
            }else{
                $("input[name=seleccionados]").each(function(){
                    $(this).attr("checked", false);
                });
            }
        });', View::POS_END);


if(!empty($proyectos)):

$form = ActiveForm::begin();


?>

<table class="table table-stripped">

<tr>
    <th><?= Html::checkbox('all',false,['value'=>0, 'id'=>'all'])?></th>
    <th>Número de proyecto</th>
    <th>Proyecto</th>
    <th>Fecha radicación</th>
</tr>

<?php foreach($proyectos as $proyecto):?>

<tr>
    <td>
        <?= Html::checkbox('seleccionados',false,['value'=>$proyecto->numero])?>
    </td>
    <td>
        <?= $proyecto->numero ?>
    </td>
    <td>
        <?= $proyecto->proyecto ?>
    </td>
       <td>
        <?= $proyecto->fecha_radicacion ?>
    </td>

</tr>

<?php

endforeach;

?>

    <?= Html::submitButton(Yii::t('app', 'Guardar'), ['class' => 'btn btn-primary pull-right btn-sm', 'style'=>'border-radius: 3px']); ?>

<?php

ActiveForm::end();

endif;

?>
