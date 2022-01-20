<?php
// src/Controller/ExampleServices.php
namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Service\MessageGenerator;
class ExampleServices extends AbstractController{
	/**
     * @Route("/testLogger")
     */
    public function list(LoggerInterface $logger): Response
    {
        $logger->info('Look, I just used a service!');
		return new Response("");
        
    }
	/**
     * @Route("/request")
     */
    public function request(Request $request): Response
    {
        
		return new Response($request->server->get('REMOTE_ADDR'));
        
    
	}
	/**
     * @Route("/session1")
     */
    public function session1(Request $request): Response
    {
        $session = $request->getSession();
		$session->set("var", 100);
		return $this->redirectToRoute("session2");
        
    }
	/**
     * @Route("/session2", name = "session2")
     */
    public function session2(Request $request): Response
    {
		$session = $request->getSession();   
		$value = $session->get("var");
		return new Response("<html><body>$value</body></html>");        
    }
	/**
     * @Route("/message", name = "message")
     */
	
	public function message(MessageGenerator $messageGenerator): Response
	{
		// thanks to the type-hint, the container will instantiate a
		// new MessageGenerator and pass it to you!
		// ...

		$message = $messageGenerator->getHappyMessage();
		return new Response("<html><body>$message</body></html>");        

	}
	
	
}