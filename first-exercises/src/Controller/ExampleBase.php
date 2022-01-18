<?php
// src/Controller/ExampleBase.php
namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/* // if activated, it would add a prefix to all routes in the class
 * @Route("/base")
*/
class ExampleBase extends AbstractController{
	/**
    * @Route("/hello", name = "helloName")
    */
    public function helloF(){       
        return new Response('<html><body>Hello</body></html>');
    }
	
	/**
    * @Route("/product/{num1}/{num2}", name = "productName")
    */
	public function productF($num1, $num2){
		$resul = $num1 * $num2;
		return new Response("<html><body>$resul</body></html>");
	}
	/**
    * @Route("/factorial/{num}", name = "factorialName")
    */
	public function factorialF($num){
		$n = $num;
		if($n<=0){
			$resul = "Error";
		}
		else{
			$resul = 1;
			for( $i = 2; $i <= $n; $i++){
				$resul = $resul * $i;
			}
		}
		return new Response("<html><body>$resul</body></html>");
	}
	/**
	* @Route("/default1/{num}", name = "default1")
	*/
	public function default1F($num = 3){
		return new Response("<html><body>$num</body></html>");
	}
	/**
	* @Route("/default2/{num?4}", name = "default2")
	*/
	public function default2F($num){
		return new Response("<html><body>$num</body></html>");
	}
	
	
	/**
	* @Route("/square/{num}", name = "square")
	*/
	public function square($num){
		// no arguments example
		// return $this->redirectToRoute("helloName");
		return $this->redirectToRoute("productName", array('num1'=>$num, 'num2'=>$num));
		
	}
	/**
	* @Route("/remainder/{num1}/{num2}", name = "remainder")
	*/
	public function remainder($num1, $num2 = 2){
		$num = $num1 % $num2;
		return new Response("<html><body>$num</body></html>");
		
	}
}