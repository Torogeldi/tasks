<?php require_once(ROOT.'/app/views/layouts/header.php'); ?>
<div class="panel panel-default">
			<div class="panel-heading">
				<h2>Авторизация <span class="pull-right"><a href="/" class="btn btn-primary">Назад</a></span></h2>
			</div>

			<div class="panel-body">
				<div style="max-width: 600px; margin: 0 auto;">

                	<?php if (isset($errors) && is_array($errors)){ ?>
                        <div class="alert alert-danger">
                        	<ul>
                            <?php foreach ($errors as $error): ?>
                                <li><?php echo $error; ?></li>
                            <?php endforeach; ?>
	                        </ul>
                        </div>
                    <?php } ?>

				<form action="" method="POST">
					<div class="form-group">
						<label for="login">Логин</label>
						<input id="login" type="text" name="login" class="form-control">
					</div>

					<div class="form-group">
						<label for="password">Пароль</label>
						<input id="password" type="password" name="password" class="form-control">
					</div>

					<button type="submit" name="submit" class="btn btn-success"><i class="fa fa-sign-in"></i> Войти</button>

				</form>
				</div>
			</div>
		</div>
<?php require_once(ROOT.'/app/views/layouts/footer.php'); ?>