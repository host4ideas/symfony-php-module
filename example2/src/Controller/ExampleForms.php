<?php 
// src/Controller/ExampleForms.php
namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Team;
use App\Entity\Player;
use Doctrine\Persistence\ManagerRegistry;
use App\Form\Type\HelloType;
use App\Form\Type\PlayerType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormError;
use Doctrine\DBAL\Exception;
class ExampleForms extends AbstractController{
	/**
     * @Route("/newTeam")
	 *
     * 
     */
	public function newTeam(Request $request, ManagerRegistry $doctrine): Response
    {
        // creates a team object and initializes some data for this example
        $team = new Team();
		$team->setName("Pr  form");
        $team->setCity("City");
		$team->setFounded(2245);
		$team->setMembers(33333);
     

        $form = $this->createFormBuilder($team)
            ->add('name', TextType::class)
            ->add('city', TextType::class)
			->add('founded', TextType::class)
			->add('members', TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Create Team'])
            ->getForm();
			
			
		$form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            //$team = $form->getData();			
			$entityManager = $doctrine->getManager();
			$entityManager->persist($team);
			$entityManager->flush();
			$id = $team->getId();
            return new Response("<html><body>Inserted team with id: $id</body></html>");		
        }

		return $this->renderForm('newTeam.html.twig', [
            'form' => $form,
        ]);
	}
	
	/**
	* @Route("/formHello", name = "formHello")
	
	*/
	public function formHello(Request $request)
	{
		$form = $this->createFormBuilder()
			->add('name', TextType::class)
			->add('surname', TextType::class)
			->add('send', SubmitType::class)
			->getForm();

		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {			
			$data = $form->getData();		
			$name = $data['name'];
			$surname = $data['surname'];
			return new Response('<html><body>Hello '. $name.' '. $surname .'</body></html>');
		}
		return $this->render('formHello.html.twig', array(
        'form' => $form->createView(),
		));
	} 
	
	/**
	* @Route("/formHello2", name = "formHello2")
	
	*/
	public function formHello2(Request $request)
	{
		$form = $this->createForm(HelloType::class);

		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {			
			$data = $form->getData();		
			$name = $data['name'];
			$surname = $data['surname'];
			return new Response('<html><body>Hello '. $name.' '. $surname .'</body></html>');
		}
		return $this->render('formHello.html.twig', array(
        'form' => $form->createView(),
		));
	} 
	/**
	* @Route("/newPlayer", name = "newPlayer")
	
	*/
	public function newPlayer(Request $request,  ManagerRegistry $doctrine)
	{
		
		$form = $this->createForm(PlayerType::class);

		$form->handleRequest($request);
		try{
			if ($form->isSubmitted() && $form->isValid()) {	
				
				$data = $form->getData();		
				$name = $data['name'];
				$surname = $data['surname'];
				$age  = $data['age'];
				$teamId  = $data['teamId'];
				$entityManager = $doctrine->getManager();
				$team = $entityManager->find(Team::class, $teamId );	
				if(is_null($team)){
					$form->addError(new FormError("Team id not found"));
					//$form->get("teamId")->addError(new FormError("Team id not found"));
				}else{
					$player = new Player();
					$player->setName($name);
					$player->setSurname($surname);
					$player->setAge($age);
					$player->setTeam($team);
					$entityManager->persist($player);
					$entityManager->flush();
					return new Response("inserted with code " . $player->getId());
				}
			}
		}catch(Exception $e){
			$form->addError(new FormError("Team could not be inserted"));
		}
		return $this->render('newTeam.html.twig', array('form' => $form->createView()));
	} 
	
	
}