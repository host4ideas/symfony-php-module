<?php
// src/Controller/ExampleDB.php
namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Team;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Player;
use App\Entity\PlayerBi;
use App\Entity\TeamBi;


class ExampleDB extends AbstractController{
	/**
     * @Route("/showTeam")
     */
	public function showTeam(ManagerRegistry $doctrine){
		$entityManager = $doctrine->getManager();
		$team = $entityManager->find(Team::class, 1);
		$name = $team->getName();
        return new Response("<html><body>$name</body></html>");		
	}
	/**
     * @Route("/showTeam/{cod}")
     */
	public function showTeamCode($cod, ManagerRegistry $doctrine){
		$entityManager = $doctrine->getManager();
		$team = $entityManager->find(Team::class, $cod);
		return $this->render("team.html.twig", ["team" => $team]);	
	}
	/**
     * @Route("/showPlayers")
     */
	public function showPlayers(ManagerRegistry $doctrine){
		$entityManager = $doctrine->getManager();
		$players = $entityManager->getRepository(Player::class)->findAll();
        return $this->render("players.html.twig", ["players" => $players]);		
	}
	/**
     * @Route("/showPlayers/{cod}")
     */
	public function showPlayersCod($cod, ManagerRegistry $doctrine){
		$entityManager = $doctrine->getManager();
		$team = $entityManager->find(TeamBi::class, $cod);
		//TODO: check if team is null
		$players = $team->getPlayers();
        return $this->render("players.html.twig", ["players" => $players]);			
	}
    
	
}