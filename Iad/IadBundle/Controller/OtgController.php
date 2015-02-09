<?php

namespace Iad\IadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class OtgController extends Controller
{
    public function indexAction($name)
    {
    $mytext="my text"; 
	$mytitle="AMTS:OTG";
	
	$data = $this->getDoctrine()->getRepository('IadIadBundle:Data')->findAll();//$name
		
	if (!$data) {
    throw $this->createNotFoundException('No product found for id '.$name);
	}
	
	
	//$mydata=
	return $this->render('IadIadBundle:Otg:index.html.twig', array('name' => $name.$name, 'mytext' => $mytext, 'mytitle' => $mytitle,'dataAll'=>$data));
    }
}
?>