<?php
// src/Acme/IadBundle/Entity/Data.php
namespace Iad\IadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="data")
 */
class Data
{      
	/**
     * @ORM\Column(type="string", length=4)
     */
	protected $otg;

    /**
     * @ORM\Column(type="string", length=4)
     */
    protected $itg;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $dt_charge_start;

    /**
     * @ORM\Column(type="string",length=1)
     */
    protected $dt_charge_start_m100;
	
	
    /**
     * @ORM\Column(type="integer",length=2)
     */
    protected $call_type_id;
	
	
    /**
     * @ORM\Column(type="string",length=4)
     */
    protected $destination;
	
	/**
     * @ORM\Column(type="string",length=34)
     */
	protected $called_number;
	
	/**
     * @ORM\Column(type="datetime")
     */
	protected $dt_call_end;
	
	/**
     * @ORM\Column(type="string",length=1)
     */
	protected $dt_call_end_m100;
	
	/**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
	protected $id;

    /**
     * Set otg
     *
     * @param string $otg
     * @return Data
     */
    public function setOtg($otg)
    {
        $this->otg = $otg;

        return $this;
    }

    /**
     * Get otg
     *
     * @return string 
     */
    public function getOtg()
    {
        return $this->otg;
    }

    /**
     * Set itg
     *
     * @param string $itg
     * @return Data
     */
    public function setItg($itg)
    {
        $this->itg = $itg;

        return $this;
    }

    /**
     * Get itg
     *
     * @return string 
     */
    public function getItg()
    {
        return $this->itg;
    }

    /**
     * Set dt_charge_start
     *
     * @param \DateTime $dtChargeStart
     * @return Data
     */
    public function setDtChargeStart($dtChargeStart)
    {
        $this->dt_charge_start = $dtChargeStart;

        return $this;
    }

    /**
     * Get dt_charge_start
     *
     * @return \DateTime 
     */
    public function getDtChargeStart()
    {
        return $this->dt_charge_start;
    }

    /**
     * Set dt_charge_start_m100
     *
     * @param string $dtChargeStartM100
     * @return Data
     */
    public function setDtChargeStartM100($dtChargeStartM100)
    {
        $this->dt_charge_start_m100 = $dtChargeStartM100;

        return $this;
    }

    /**
     * Get dt_charge_start_m100
     *
     * @return string 
     */
    public function getDtChargeStartM100()
    {
        return $this->dt_charge_start_m100;
    }

    /**
     * Set call_type_id
     *
     * @param integer $callTypeId
     * @return Data
     */
    public function setCallTypeId($callTypeId)
    {
        $this->call_type_id = $callTypeId;

        return $this;
    }

    /**
     * Get call_type_id
     *
     * @return integer 
     */
    public function getCallTypeId()
    {
        return $this->call_type_id;
    }

    /**
     * Set destination
     *
     * @param string $destination
     * @return Data
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;

        return $this;
    }

    /**
     * Get destination
     *
     * @return string 
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * Set called_number
     *
     * @param string $calledNumber
     * @return Data
     */
    public function setCalledNumber($calledNumber)
    {
        $this->called_number = $calledNumber;

        return $this;
    }

    /**
     * Get called_number
     *
     * @return string 
     */
    public function getCalledNumber()
    {
        return $this->called_number;
    }

    /**
     * Set dt_call_end
     *
     * @param \DateTime $dtCallEnd
     * @return Data
     */
    public function setDtCallEnd($dtCallEnd)
    {
        $this->dt_call_end = $dtCallEnd;

        return $this;
    }

    /**
     * Get dt_call_end
     *
     * @return \DateTime 
     */
    public function getDtCallEnd()
    {
        return $this->dt_call_end;
    }

    /**
     * Set dt_call_end_m100
     *
     * @param string $dtCallEndM100
     * @return Data
     */
    public function setDtCallEndM100($dtCallEndM100)
    {
        $this->dt_call_end_m100 = $dtCallEndM100;

        return $this;
    }

    /**
     * Get dt_call_end_m100
     *
     * @return string 
     */
    public function getDtCallEndM100()
    {
        return $this->dt_call_end_m100;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
