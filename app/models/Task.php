<?php

class Task{

	const SHOW_BY_DEFAULT = 3;

	public static function getTasks($sort = "id", $page = 1){

		$db = Db::getConnect();

		if ($sort == "")
			$sort == "id";

		$offset = ($page - 1) * self::SHOW_BY_DEFAULT;
		$tasksList = array();
		$result = $db->query("SELECT id, login, email, text, status"
					." FROM task"
					." ORDER BY ".$sort
					." LIMIT ".self::SHOW_BY_DEFAULT
					." OFFSET ".$offset
				);

		$i = 0;
		while ( $row = $result->fetch() ) {
			$tasksList[$i]['id'] = $row['id'];
			$tasksList[$i]['login'] = $row['login'];
			$tasksList[$i]['email'] = $row['email'];
			$tasksList[$i]['text'] = $row['text'];
			$tasksList[$i]['status'] = $row['status'];
			$i++;
		}
			return $tasksList;

	}

	public static function getTotalTasks(){

		$db = Db::getConnect();

		$result = $db->query("SELECT COUNT(id) as count"
					." FROM task"
				);

		$result->setFetchMode(PDO::FETCH_ASSOC);
		$row = $result->fetch();
			return $row['count'];
	}

    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    public static function checkPassword($password)
    {
        if (strlen($password) >= 3) {
            return true;
        }
        return false;
    }

    public static function checkLogin($login)
    {
        if (strlen($login) >= 2) {
            return true;
        }
        return false;
    }

    public static function addTask($login, $email, $text, $status)
    {
        $db = Db::getConnect();

        $sql = 'INSERT INTO task (login, email, text, status) '
                . 'VALUES (:login, :email, :text, :status)';

        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':text', $text, PDO::PARAM_STR);
        $result->bindParam(':status', $status, PDO::PARAM_STR);
        return $result->execute();
    }

    public static function getTaskById($id)
    {
        $db = Db::getConnect();

        $sql = 'SELECT * FROM task WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }

    public static function edit($id, $login, $email, $text, $status)
    {
        $db = Db::getConnect();

        $sql = "UPDATE task 
            SET login = :login, email = :email, text = :text, status = :status
            WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':text', $text, PDO::PARAM_STR);
        $result->bindParam(':status', $status, PDO::PARAM_STR);
        return $result->execute();
    }

    public static function remove($id)
    {
        $db = Db::getConnect();
        $sql = 'DELETE FROM task WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
    }

}