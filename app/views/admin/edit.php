<?php require_once(ROOT.'/app/views/layouts/header.php'); ?>
<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Добавить задачу <span class="pull-right"><a href="/admin" class="btn btn-primary">Назад</a></span></h3>
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
						<input id="login" type="text" name="login" class="form-control" value="<?php echo $task['login'] ?>">
					</div>

					<div class="form-group">
						<label for="email">Email</label>
						<input id="email" type="email" name="email" class="form-control" value="<?php echo $task['email'] ?>">
					</div>

					<div class="form-group">
						<label for="text">Текст</label>
						<textarea id="text" name="text" class="form-control"><?php echo $task['text'] ?></textarea>
					</div>

					<div class="form-group">
						<label for="text">Статус</label>
						<select name="status" class="form-control">
							<option <?php if ($task['status'] == 0){ echo "selected"; } ?> value="0">Не выполнено</option>
							<option <?php if ($task['status'] == 1){ echo "selected"; } ?> value="1">Выполнено</option>
							<option <?php if ($task['status'] == 2){ echo "selected"; } ?> value="2">В процессе</option>
						</select>
					</div>

					

					<button type="submit" name="update" class="btn btn-success"><i class="fa fa-plus"></i> Сохранить</button>
					<button type="submit" name="remove" class="btn btn-danger"><i class="fa fa-close"></i> Удалить</button>

				</form>
				</div>
			</div>
		</div>
<?php require_once(ROOT.'/app/views/layouts/footer.php'); ?>