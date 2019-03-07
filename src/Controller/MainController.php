<?php

namespace App\Controller;

<<<<<<< HEAD
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController {

    /**
     * @Route("/main", name="main")
     */
    public function index() {
        return $this->render('main/index.html.twig', [
                    'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/fileup", name="file_up", methods={"POST"})
     */
    public function postFile(Request $request) {
        $file = $request->files->get("fichier");

        $row = 1;
        if (($handle = fopen("test.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);
                echo "<p> $num fields in line $row: <br /></p>\n";
                $row++;
                for ($c = 0; $c < $num; $c++) {
                    echo $data[$c] . "<br />\n";
                }
            }
            fclose($handle);
        }


        $csv = array_map('str_getcsv', file($file));
        array_walk($csv, function(&$a) use ($csv) {
            $a = array_combine($csv[0], $a);
        });
        array_shift($csv); # remove column header


        exit(var_dump($file->guessExtension()));
        return $this->render('main/index.html.twig', ['controller_name' => 'MainController']);

}
