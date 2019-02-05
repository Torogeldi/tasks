<?php

class MainController{

	public function actionIndex($sort = 'id', $page = 1){
		$tasksList = Task::getTasks($sort, $page);
		$total = Task::getTotalTasks();

		$pagination = new Pagination($total, $page, Task::SHOW_BY_DEFAULT, 'page-');
		require_once(ROOT.'/app/views/main/index.php');
		return true;
	}

	public function actionError(){
		require_once(ROOT.'/app/views/404/error.php');
		return true;
	}

}