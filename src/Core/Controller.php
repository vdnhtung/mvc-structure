<?php

    namespace MVC\Core;

    class Controller
    {
        private $vars = [];
        private $layout = "default";

        public function set($data)
        {
            $this->vars = array_merge($this->vars, $data);
        }

        public function render($filename)
        {
            extract($this->vars);
            ob_start();

            $thisClass = explode('\\', get_class($this));
            $file = "Views/" . ucfirst(str_replace('Controller', '', end($thisClass))) . '/' . $filename . '.php';

            require ROOT . $file;
            $content_for_layout = ob_get_clean();

            if ($this->layout == false)
            {
                $content_for_layout;
            }
            else
            {
                require ROOT . "Views/Layouts/" . $this->layout . '.php';
            }
        }

        public function secure_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        protected function secure_form($form)
        {
            foreach ($form as $key => $value)
            {
                $form[$key] = $this->secure_input($value);
            }
        }

    }
?>