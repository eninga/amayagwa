<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/**
 * Description of MainController
 *
 * @author eningabiye
 */
class MainController extends Controller{

    public function index() {
        $number = random_int(1000, 2000);
        return $this->render("app/view.html.twig",["number" => $number]);
    }

    public function postProduct() {
        
    }

    public function getProducts() {
        
    }

}
