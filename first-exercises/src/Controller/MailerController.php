<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;

class MailerController extends AbstractController
{
	#[Route('/email', name: 'email')]
	public function sendEmail(MailerInterface $mailer): Response
	{
		$email = (new TemplatedEmail())
			->from('fabien@example.com')
			->to('elsemasturba@gmail.com')
			->subject('Thanks for signing up!')

			// path of the Twig template to render
			->htmlTemplate('greeting.html.twig')

			// pass variables (name => value) to the template
			->context([
				"name" => "felix"
			]);

		$mailer->send($email);
	}
}
