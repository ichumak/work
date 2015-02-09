<?php

namespace Iad\IadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ItgController extends Controller
{
    public function indexAction($name)
    {
	$mytext="my text"; 
	$mytitle="AMTS:ITG";
/*	
	$data = $this->getDoctrine()->getRepository('IadIadBundle:Data');
	$result=$query = $data->createQueryBuilder('p')
				->select('p.itg','p.otg')
				//->from('IadIadBundle:Data','p')
				->getQuery()
                ->getResult();
*/


	$data = $this->getDoctrine()->getManager();//getEntityManager
	$query = $data->createQuery(

	"SELECT p.itg,COUNT(p.otg) AS COUNT_ALL, CASE WHEN p.dt_charge_start!=p.dt_call_end THEN 1 ELSE 0 END AS NOT_NULL_1
	FROM IadIadBundle:Data p
	WHERE p.dt_charge_start LIKE '2014-02-01%' 
	GROUP BY p.itg
	ORDER BY  p.itg"
	);//WHERE p.dt_charge_start LIKE "2014-02-01 10:__:__" and p.itg IN("0000"); '
	//->setParameter(array('kdata'=>'2014-02-01 10:__:__','itgall'=>'0000'));
	
	$result = $query->getResult();

		
	if (!$data) {
    throw $this->createNotFoundException('No product found for id '.$name);
	}
		

	return $this->render('IadIadBundle:Itg:index.html.twig', array('name' => $name.$name, 'mytext' => $mytext, 'mytitle' => $mytitle,'dataAll'=>$result));
    }
}
?>