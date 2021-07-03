<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Prodi;
use app\models\Jurusan;
use kartik\date\DatePicker;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Mahasiswa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mahasiswa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_mahasiswa')->textInput(['maxlength' => true]) ?>

    <?php $model->isNewRecord==1? $model->jenis_kelamin='L':$model->jenis_kelamin; ?>
		<?= $form->field($model, 'jenis_kelamin')->radioList(array('Laki-Laki'=>'Laki-laki', 'Perempuan'=>'Perempuan'))->label('Jenis Kelamin') ?>

    <?= $form->field($model, 'tanggal_lahir')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Tanggal Lahir'],
        'type' => DatePicker::TYPE_COMPONENT_APPEND,
        'value' => '11-Jan-2000',
        'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'dd-M-yyyy'
    ]
    ]); ?>


    <?= $form->field($model, 'id_jurusan')->dropDownList(Jurusan::getJurusan(),
        ['id' => 'cat-id', 'prompt' => 'Pilih Jurusan']) 
    ?>

    <?= $form->field($model, 'id_prodi')->widget(DepDrop::classname(), [
        'data' => Prodi::getProdiList($model->id_jurusan),
        'options' => ['id' => 'prodi', 'prompt' => 'Pilih Prodi'],
        'pluginOptions' => [
            'depends' => ['cat-id'],
            'placeholder' => 'Pilih Prodi',
            'url' => Url::to(['mahasiswa/subcat'])
        ]
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
