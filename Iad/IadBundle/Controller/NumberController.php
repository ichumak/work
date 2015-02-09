<?php

namespace Iad\IadBundle\Controller;

use Iad\IadBundle\Entity\Data;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NumberController extends Controller
{
    public function indexAction($name)
    {
       $mytitle="AMTS:OTG";
	   //return $this->redirect($this->generateUrl('otg'));
	   $data = new Data();
		$data->setOtg("0000");
		$data->setItg("0100");
		//$from = new \DateTime("2014-02-01 10:20:11");
		$data->setDtChargeStart(new \DateTime("2014-02-01 10:20:11"));
		$data->setDtChargeStartM100("0");
		$data->setCallTypeId("1");
		$data->setDestination("4444");
		$data->setCalledNumber("430546");
		$data->setDtCallEnd(new \DateTime("2014-02-01 10:20:11"));//->format('Y-m-d H:i:s');
		$data->setDtCallEndM100("1");
		
		
		
		//$product->setPrice('19.99');
		//$product->setDescription('Lorem ipsum dolor');

		//$em = $this->getDoctrine()->getEntityManager();
		$em = $this->getDoctrine()->getManager();
		$em->persist($data);
		$em->flush();
	   ///////////////////////////////////
	   $a=12;
	   $b=45;
	   $c=$a+$b;
	   $test=$c;
	    return $this->render('IadIadBundle:Number:index.html.twig', array('test'=> 'comp','mytitle'=>$mytitle));
    }
	
	public function addAction($name)
	{
	return $this->render('IadIadBundle:Number:index.html.twig', array('test'=> 'add'));
	}
	
	public function printAction($name)
    {
        $mytitle="AMTS:ToNumber";
	   //return $this->redirect($this->generateUrl('otg'));
		$data = $this->getDoctrine()->getRepository('IadIadBundle:Data')->find($name);
		
		if (!$data) {
        throw $this->createNotFoundException('No product found for id '.$name);
		}
		
		//$from = new \DateTime("2014-02-01 10:20:11");
	/*	$data->getDtChargeStart(new \DateTime("2014-02-01 10:20:11"));
		$data->getDtChargeStartM100("0");
		$data->getCallTypeId("1");
		$data->getDestination("4444");
		$data->getCalledNumber("430546");
		$data->getDtCallEnd(new \DateTime("2014-02-01 10:20:11"));//->format('Y-m-d H:i:s');
		$data->getDtCallEndM100("1");
	*/	
		
		
		//$product->setPrice('19.99');
		//$product->setDescription('Lorem ipsum dolor');

		//$em = $this->getDoctrine()->getEntityManager();
		
	   ///////////////////////////////////
	   $a=12;
	   $b=45;
	   $c=$a+$b;
	   $test=$c;
	    return $this->render('IadIadBundle:Number:index.html.twig', array('test'=> 'comp','mytitle'=>$mytitle.$data->getOtg()));
    }
}
?>