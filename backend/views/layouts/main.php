<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div id="wrapper">

	<?php
	if (!Yii::$app->user->isGuest) {
	/*        NavBar::begin([
                'brandLabel' => Yii::$app->name,
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            $menuItems = [
                ['label' => 'Home', 'url' => ['/site/index']],
            ];
            $menuItems[] = '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->account_name . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>';
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();*/
	?>
	<!-- NAVBAR -->
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="brand">
			<a href="backend.vlson.top"><img src="/images/main/logo-vlson.png" alt="Klorofil Logo" class="img-responsive logo"></a>
		</div>
		<div class="container-fluid">
			<div class="navbar-btn">
				<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
			</div>
			<!--Search Form-->
			<!--<form class="navbar-form navbar-left">
				<div class="input-group">
					<input type="text" value="" class="form-control" placeholder="Search dashboard...">
					<span class="input-group-btn"><button type="button" class="btn btn-primary">Go</button></span>
				</div>
			</form>-->
			<div id="navbar-menu">
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
							<i class="lnr lnr-alarm"></i>
							<span class="badge bg-danger">5</span>
						</a>
						<ul class="dropdown-menu notifications">
							<li><a href="#" class="notification-item"><span class="dot bg-warning"></span>System space is almost full</a></li>
							<li><a href="#" class="notification-item"><span class="dot bg-danger"></span>You have 9 unfinished tasks</a></li>
							<li><a href="#" class="notification-item"><span class="dot bg-success"></span>Monthly report is available</a></li>
							<li><a href="#" class="notification-item"><span class="dot bg-warning"></span>Weekly meeting in 1 hour</a></li>
							<li><a href="#" class="notification-item"><span class="dot bg-success"></span>Your request has been approved</a></li>
							<li><a href="#" class="more">See all notifications</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-question-circle"></i> <span>Help</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
						<ul class="dropdown-menu">
							<li><a href="#">Basic Use</a></li>
							<li><a href="#">Working With Data</a></li>
							<li><a href="#">Security</a></li>
							<li><a href="#">Troubleshooting</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="/images/main/user.png" class="img-circle" alt="Avatar"> <span>Samuel</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
						<ul class="dropdown-menu">
							<li><a href="#"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
							<li><a href="#"><i class="lnr lnr-envelope"></i> <span>Message</span></a></li>
							<li><a href="#"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>
							<li><a href="<?= Url::to(['/site/logout']) ?>" data-method="post"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
						</ul>
					</li>
					<!-- <li>
						<a class="update-pro" href="#downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
					</li> -->
				</ul>
			</div>
		</div>
	</nav>
	<!-- END NAVBAR -->
	<!-- LEFT SIDEBAR -->
	<div id="sidebar-nav" class="sidebar">
		<div class="sidebar-scroll">
			<nav>
				<ul class="nav">
					<li>
						<a href="#user" data-toggle="collapse" class="collapsed active"><i class="lnr lnr-users"></i> <span>用户管理</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
						<div id="user" class="collapse">
							<ul class="nav">
								<li><a href="<?= Url::to(['account/index']) ?>" class="">通行证管理</a></li>
								<li><a href="<?= Url::to(['role/index']) ?>" class="">角色管理</a></li>
								<li><a href="<?= Url::to(['node/index']) ?>" class="">权限节点管理</a></li>
							</ul>
						</div>
					</li>
					<li><a href="" class=""><i class="lnr lnr-alarm"></i> <span>角色管理</span></a></li>
				</ul>
			</nav>
		</div>
	</div>
	<!-- END LEFT SIDEBAR -->

<?php
}
?>

	<div class="main">
		<div class="main-content">
			<div class="container-fluid">
				<?= Breadcrumbs::widget([
					'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
				]) ?>
				<?= Alert::widget() ?>
				<?= $content ?>
			</div>
		</div>
	</div>

	<footer class="footer">
		<div class="container">
			<p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

			<p class="pull-right"><?= Yii::powered() ?></p>
		</div>
	</footer>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
