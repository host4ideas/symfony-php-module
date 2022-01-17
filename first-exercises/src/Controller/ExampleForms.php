<?php
// src/Controller/ExampleForms.php
namespace App\Controller;

use App\Entity\Team;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ExampleForms extends AbstractController
{
	#[Route('/newTeam', name: 'newTeam')]
	public function new(Request $request)
	{
		// creates a team object and initializes some data for this example
		$team = new Team();
		$team->setCity('name');

		$form = $this->createFormBuilder($team)
			->add('name', TextType::class)
			->add('city', TextType::class)
			->add('founded', TextType::class)
			->add('members', TextType::class)
			->add('save', SubmitType::class, ['label' => 'Create team'])
			->getForm();
		return $this->renderForm('newTeam.html.twig', [
			'form' => $form
		]);
	}
}
