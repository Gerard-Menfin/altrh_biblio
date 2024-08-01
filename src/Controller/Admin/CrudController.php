<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

abstract class CrudController extends AbstractController {
    public function renderForm(string $view, array $viewParameters) {
        $viewParameters["form"] = $viewParameters["form"]->createView();
        return $this->render($view, $viewParameters);
    }
}
