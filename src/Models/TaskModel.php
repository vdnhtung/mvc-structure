<?php
    namespace MVC\Models;

    use MVC\Core\Model;
    
    class TaskModel extends Model
    {
        protected $title;
        protected $id;
        protected $description;
        protected $created_at;
        protected $updated_at;
    
        public function getTitle()
        {
            return $this->title;
        }
    
        public function setTitle($title)
        {
            $this->title = $title;
        }
    
        public function getId()
        {
            return $this->id;
        }
    
        public function setId($id)
        {
            $this->id = $id;
        }
    
        public function setDescription($description)
        {
            $this->description = $description;
        }
    
        public function getDescription()
        {
            return $this->description;
        }
    
        public function setCreatedAt($created_at)
        {
            $this->created_at = $created_at;
        }
    
        public function getCreatedAt()
        {
            return $this->created_at;
        }
    
        public function setUpdatedAt($updated_at)
        {
            $this->updated_at = $updated_at;
        }
    
        public function getUpdatedAt()
        {
            return $this->updated_at;
        }
    }
?>