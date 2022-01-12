<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ExampleTemplate extends AbstractController
{
	#[Route('/greetings/{name}', name: 'greetings')]
	function greetings($name)
	{
		return $this->render("greeting.html.twig", [
			"name" => $name
		]);
	}

	#[Route('/positive/{num}', name: 'positive')]
	function positive($num)
	{
		return $this->render("positive.html.twig", [
			"number" => $num
		]);
	}

	#[Route('/factorial/{num}', name: 'factorial')]
	function factorial($num)
	{
		$result = $num;
		return $this->render("factorial.html.twig", [
			"result" => $result
		]);
	}

	#[Route('/table', name: 'table')]
	function table()
	{
		$rows = array(
			array("cod" => 1, "fruit" => "apple"),
			array("cod" => 2, "fruit" => "banana")

		);
		return $this->render("table.html.twig", [
			"rows" => $rows
		]);
	}

	#[Route('/link', name: 'link')]
	function link()
	{
		// $rows = array(
		// 	array("cod" => 1, "fruit" => "apple"),
		// 	array("cod" => 2, "fruit" => "banana")

		// );
		// return $this->render("table.html.twig", [
		// 	"rows" => $rows
		// ]);
		return $this->render("link.html.twig");
	}

	#[Route('/fake/{id}', name: 'fake')]
	function fake($id)
	{
		if ($id == 1) {
			return $this->render("fruits.html.twig");
		} else if ($id == 2) {
			return $this->render("drinks.html.twig");
		}
	}
}
