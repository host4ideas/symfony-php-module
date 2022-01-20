<?php
// src/Controller/MainController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
/**   
	  @IsGranted("ROLE_USER")
    */
class MainController extends AbstractController{
	
	/**
    * @Route("/categories", name = "categories")
    */
    public function helloF(){   
		$name = $this->getUser()->getUserIdentifier();
        return new Response("<html><body>Hello $name. You are in the category page
		<a href = 'logout'>Logout</a></body></html>");
    }
	/**
    * @Route("/categoriesAdmin", name = "categoriesAdmin")
	@IsGranted("ROLE_ADMIN")
    */
	  public function categoriesAdmin(){   
		$name = $this->getUser()->getUserIdentifier();
        return new Response("<html><body>Hello admin $name. You are in the category page
		<a href = 'logout'>Logout</a>
</body></html>");
    }
}