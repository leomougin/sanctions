<?php
 namespace App\Controller;

 abstract class AbstractController
 {
     protected function render(string $templates, array $data = [])
     {
         extract($data);
         ob_start();
         require __DIR__.'/../../vue/'.$templates.'.php';
         $content = ob_get_clean();
         require __DIR__.'/../../vue/base.php';
     }

     protected function redirect(string $url):void
     {
         header('Location: '.$url);
         exit;
     }

     public function renderError(int $code = 404, string $message = null): void
     {
         http_response_code($code);
         if ($code == 404){
             $this->render('errors/404');
             exit();
         }
     }
 }