<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    
    /**
     * @Route("/", name="home")
     */
    public function homeAction()
    {
        $em = $this->getDoctrine()->getManager();

        $news = $em->getRepository('AppBundle:News')->findBy(array('active' => true), array('createdDate' => 'DESC'), 3);        
        
        return $this->render('default/home.html.twig', array(
            'menuSelected' => 'home',
            'news' => $news
        ));
    }
    
    /**
     * @Route("/results", name="results")
     */
    public function resultsAction()
    {
        return $this->render('default/results.html.twig');
    }
    
    /**
     * @Route("/teams", name="teams")
     */
    public function teamsAction()
    {
        return $this->render('default/teams.html.twig');
    }
    
    /**
     * @Route("/rankings", name="rankings")
     */
    public function rankingsAction()
    {
        return $this->render('default/rankings.html.twig');
    }
    
    /**
     * @Route("/contact", name="contact")
     */
    public function contactAction()
    {
        return $this->render('default/contact.html.twig');
    }
    
    /**
     * @Route("/about-us", name="about-us")
     */
    public function aboutUsAction()
    {
        return $this->render('default/about-us.html.twig');
    }
    
    /**
     * @Route("/playing-halls", name="playing-halls")
     */
    public function playingHallsAction()
    {
        return $this->render('default/playing-halls.html.twig');
    }
    
    /**
     * @Route("/news", name="news")
     */
    public function newsAction()
    {
        return $this->render('default/news.html.twig');
    }
    
    /**
     * @Route("/rules", name="rules")
     */
    public function rulesAction()
    {
        return $this->render('default/rules.html.twig');
    }
    
    /**
     * @Route("/admin", name="admin")
     */
    public function adminAction()
    {
        return $this->render('default/admin.html.twig');
    }
}