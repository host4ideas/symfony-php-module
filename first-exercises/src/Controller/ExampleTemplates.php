<?php
// src/Controller/ExampleTemplates.php
namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class ExampleTemplates extends AbstractController{
	/**
    * @Route("/greetings/{name}", name = "greetings")
    */
	public function greetings($name){
		return $this->render('greeting.html.twig', ['name' => $name]);
	}
	/**
    * @Route("/positive/{num}", name = "positive")
    */
	public function positive($num){
		return $this->render('positive.html.twig', ['number' => $num]);
	}
	/**
    * @Route("/factorialT/{num}", name = "factorialT")
    */
	public function factorialT($num){
		$resul = 1;
		if($num < 0){
			$error = TRUE;
		}else{
			$error = FALSE;			
			for( $i = 2; $i <= $num; $i++){
				$resul = $resul * $i;
			}
		}
		return $this->render('factorial.html.twig', ['number' => $resul, 'error' => $error]);
	}
	
	
	
	
	
	/**
    * @Route("/table", name = "table")
    */
	public function table(){
		$rows = array( array('cod'=> 1, 'name' => 'Fruits'), 
					array('cod'=> 2, 'name' => 'Drinks') );
		return $this->render('table.html.twig', ['rows' => $rows]);
	}
	/**
    * @Route("/link", name = "link")
    */
	public function link(){
		
		return $this->render('link.html.twig');
	}
	/**
    * @Route("/list", name = "list")
    */
	public function list(){
		
		$rows = array( array('cod'=> 1, 'name' => 'Fruits'), 
					array('cod'=> 2, 'name' => 'Drinks') );
		return $this->render('list.html.twig', ['rows' => $rows]);	}
	/**
    * @Route("/fake/{num}", name = "fake")
    */
	public function fake($num){
		
        return new Response($num);

	}
	/**
    * @Route("/ourbase", name = "ourbase")
    */
	public function ourbase(){		
		return $this->render('ourbase.html.twig');
	}
	/**
    * @Route("/extension", name = "extension")
    */
	public function extension(){		
		return $this->render('extension.html.twig');
	}

}