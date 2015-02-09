<?php

namespace Iad\IadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        $mytext="my text"; 
		$mytitle="AMTS:MAIN";
		return $this->render('IadIadBundle:Default:index.html.twig', array('name' => $name,'mytitle'=>$mytitle,'mytext'=>$mytext));
    }
}
