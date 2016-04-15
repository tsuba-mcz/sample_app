<?php
/**
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 */

$cakeDescription = __d('cake_dev', 'sample_webapp');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $this->fetch('title'); ?>:
		<?php echo $cakeDescription ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');
		echo $this->Html->css('style1');
		echo $this->Html->css('style2');

		echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<ul class="gnav clearfix">
				<li class="left"><a href="/sample_app/webapp/users">ユーザー管理</a></li>
				<li class="left"><a href="/sample_app/webapp/skils">スキルシート管理</a></li>
				<li class="right"><a href="/sample_app/webapp/users/logout">ログアウト</a></li>
			</ul>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
		</div>
	</div>
</body>
</html>
