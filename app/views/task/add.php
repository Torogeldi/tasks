<?php require_once(ROOT.'/app/views/layouts/header.php'); ?>
<div class="panel panel-default">
			<div class="panel-heading">
				<h2>Добавить задачу <span class="pull-right"><a href="/" class="btn btn-primary">Назад</a></span></h2>
			</div>

			<div class="panel-body">
				<div style="max-width: 600px; margin: 0 auto;">
				<?php if ($result){?>
                    <div class="alert alert-success">Задача успешно добавлена!</div>
                <?php } ?>

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
						<label for="email">Email</label>
						<input id="email" type="email" name="email" class="form-control">
					</div>

					<div class="form-group">
						<label for="text">Текст</label>
						<textarea id="text" name="text" class="form-control"></textarea>
					</div>

					<div class="form-group">
						<label for="text">Статус</label>
						<select name="status" class="form-control">
							<option value="0">Не выполнено</option>
							<option value="1">Выполнено</option>
							<option value="2">В процессе</option>
						</select>
					</div>

					

					<button type="submit" name="add" class="btn btn-success"><i class="fa fa-plus"></i> Добавить</button>

				</form>
				</div>
			</div>
		</div>
<?php require_once(ROOT.'/app/views/layouts/footer.php'); ?>