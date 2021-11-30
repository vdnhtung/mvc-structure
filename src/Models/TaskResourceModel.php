<?php
    namespace MVC\Models;

    use MVC\Core\ResourceModel;
    
    class TaskResourceModel extends ResourceModel
    {
        public function __construct($table, $id, TaskModel $task)
        {
            parent::_init($table, $id, $task);
        }
    }
?>