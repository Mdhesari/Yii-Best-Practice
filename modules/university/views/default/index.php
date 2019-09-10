<?php

use yii\widgets\ActiveForm;
use yii\helpers\Url;
use app\models\ModelLoginTel;

$model = new ModelLoginTel;

?>

<header>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center head">
                <h1>سامانه 118000</h1>
            </div>
        </div>
    </div>
</header>
<main>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center main">
                <p>شماره همراه خود را وارد کنید</p>
                <?php $form = ActiveForm::begin(['action' => Url::to(['/student/login'])]); ?>
                <div class="form-group">
                    <?= $form->field($model, 'tel', ['template' => '{input}{error}'])->textInput(['class' => 'form-control PhoneNumber', 'autocomplete' => 'off', 'autocomplete' => 'false', 'id' => 'tel-input', 'value' => '09', 'maxLength' => '11', 'pattern' => '^\d{4}\d{3}\d{4}$'])->label(false); ?>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary Button">دریافت کد ورود</button>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</main>