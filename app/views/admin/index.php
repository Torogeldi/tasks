<?php require_once(ROOT.'/app/views/layouts/header.php'); ?>
<div class="panel panel-default">
            <div class="panel-heading">
                <h3>Задачи <span class="pull-right">Админ панель</span></h3>
            </div>

             <!-- get all user with all data -->
            <div class="panel-body">
                <table class="table table-striped">
                    <th width="5%">ID</th>
                    <th width="10%">Логин</th>
                    <th width="10%">Email</th>
                    <th width="20%">Текст</th>
                    <th width="5%">Статус</th>
                    <th width="20%">
                        <div class="dropdown">
                          <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            Сортировка
                            <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a href="/admin/sort-login">По логин</a></li>
                            <li><a href="/admin/sort-email">По email</a></li>
                            <li><a href="/admin/sort-status">По статусу</a></li>
                          </ul>
                        </div>
                    </th>

                    <?php foreach ($tasksList as $task) { ?>
                    
                    <tr>
                        <td><?php echo $task['id'] ?></td>
                        <td><?php echo $task['login'] ?></td>
                        <td><?php echo $task['email'] ?></td>
                        <td><?php echo $task['text'] ?></td>
                        <td>
                            <?php
                                $status = $task['status'];
                                switch ($status) {
                                    case '1': echo "Выполнено";
                                        break;
                                    case '2': echo "В процессе";
                                        break;
                                    default:
                                        echo "Не выполнено";
                                        break;
                                }
                             ?>
                        </td>
                        <td>
                        <form method="POST" style="margin-bottom: 0;" onsubmit="return sendForm();">
                        <a class="btn btn-primary" href="/admin/task/<?php echo $task['id'] ?>"><i class="fa fa-eye"></i></a>
                        </form>
                        </td>
                    </tr>

                    <?php } ?>
            
                </table>

                <?php echo $pagination->get(); ?>
                
            </div>
        </div>


<?php require_once(ROOT.'/app/views/layouts/footer.php'); ?>