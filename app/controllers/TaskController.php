<?php

class TaskController{

	public function actionAdd(){
		
		$login = false;
        $email = false;
        $text = false;
        $status = false;
        $result = false;

		if (isset($_POST['add'])) {
			
            $login = $_POST['login'];
            $email = $_POST['email'];
            $text = $_POST['text'];
            $status = $_POST['status'];

            $errors = false;

            if (!Task::checkLogin($login)) {
                $errors[] = 'Логин не должен быть короче 2-х символов';
            }
            if (!Task::checkLogin($text)) {
                $errors[] = 'Текст не должен быть короче 2-х символов';
            }
            if (!Task::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if ($errors == false) {
                $result = Task::addTask($login, $email, $text, $status);
            }
        }

		require_once(ROOT.'/app/views/task/add.php');
		return true;
	}

}