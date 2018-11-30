<?php
    use App\Category;
   class Website {
        public static function getCategories(){
            return Category::get();
        }
   }
   
?>