<?php
use yii\helpers\Html;
use backend\assets\LoginAsset;
use yii\bootstrap\ActiveForm;

/* @var $this \yii\web\View */
/* @var $content string */
$this->title =  Yii::$app->params['appName'];
LoginAsset::register($this);

?>
<link rel="stylesheet" href="/css/login.css">
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>登陆</title>
    <meta name="keywords" content="登陆" />
    <meta nam="description" content="登陆" />
</head>
<body>
<?php $this->beginBody() ?>
<!-- WRAPPER -->
<div class="page-container">
    <div class="login-container">
        <div class="form-title">
            <h2>JUST DO IT</h2>
        </div>
        <div class="form-container">
<!--            <form class="form-horizontal" action="login.php" method="POST">-->
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'options' => ['class' => 'form-horizontal'],
            ]); ?>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
<!--                        <input type="text" name="userName" class="form-control" id="userName" placeholder="请输入用户名">-->
                        <?= $form->field($model, 'account_name')->textInput(['autofocus' => true, 'placeholder' => "请输入用户名",'class' => 'form-control'])->label(false) ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
<!--                        <input type="password" name="password" class="form-control" id="password" placeholder="请输入密码">-->
                        <?= $form->field($model, 'password')->passwordInput(['placeholder' => "请输入密码",'class' => 'form-control'])->label(false) ?>
                    </div>
                </div>
                <div class="form-group" style="margin-bottom: 35px">
                    <div class="col-sm-offset-2 col-sm-5">
                        <input type="text" class="form-control" id="verificationCode" placeholder="暂时不设置验证码，请忽略！">
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="code" placeholder="验证码">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
<!--                        <button type="submit" class="btn btn-primary btn-lg btn-block" id="userLoginAction">登&nbsp;&nbsp;&nbsp;&nbsp;陆</button>-->
                        <?= Html::submitButton('登&nbsp;&nbsp;&nbsp;&nbsp;陆', ['class' => 'btn btn-primary btn-lg btn-block', 'name' => 'login-button']) ?>
                    </div>
                </div>
<!--            </form>-->
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
<!-- END WRAPPER -->
