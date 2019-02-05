<?php

class AdminController{

	public function actionLogin(){
		
		$login = false;
        $password = false;
        $result = false;

        if (isset($_SESSION['user'])) {
            header("Location: /admin");
        }

		if (isset($_POST['submit'])) {
			
            $login = $_POST['login'];
            $password = $_POST['password'];
            $errors = false;

            if (!Task::checkLogin($login)) {
                $errors[] = 'Логин не должен быть короче 2-х символов';
            }
            if (!Task::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 3-х символов';
            }

            $userId = Admin::checkAdminData($login, $password);

            if ($userId == false) {
                $errors[] = 'Неправильные данные для входа на сайт';
            } else {
                Admin::auth($userId);

                header("Location: /admin");
            }
        }

		require_once(ROOT.'/app/views/admin/login.php');
		return true;
	}

    public function actionIndex($sort = 'id', $page = 1){
        
        if (!isset($_SESSION['user'])) {
            header("Location: /");
        }

        $tasksList = Task::getTasks($sort, $page);
        $total = Task::getTotalTasks();
        if ($productItem) {
                require_once(ROOT.'/app/views/admin/index.php');
            } else {
                Router::errorCode(404);
            }
        $pagination = new Pagination($total, $page, Task::SHOW_BY_DEFAULT, 'page-');
        return true;

    }

    public function actionLogout()
    {
        
        unset($_SESSION["user"]);
        
        header("Location: /");
    }

    public function actionEdit($id)
    {

        if (!isset($_SESSION['user'])) {
            header("Location: /");
        }

        $task = Task::getTaskById($id);

        $login = false;
        $email = false;
        $text = false;
        $status = false;
        $result = false;

        if (isset($_POST['update'])) {
            
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
                $result = Task::edit($id, $login, $email, $text, $status);
                header("Location: /admin");
            }
        }

        if (isset($_POST['remove'])) {
            
            Task::remove($id);
            header("Location: /admin");
            
        }

        require_once(ROOT.'/app/views/admin/edit.php');
        return true;

    }

}