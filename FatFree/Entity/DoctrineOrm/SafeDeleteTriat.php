<?php

namespace FatFree\Entity\DoctrineOrm;

use Doctrine\ORM\Mapping as ORM;

trait SafeDeleteTriat
{
    /**
     * @var boolean
     * @ORM\Column(type="boolean", nullable=false)
     */
    private $safeDelete = 0;

    /**
     * @return string
     */
    public function getSafedelete()
    {
        return $this->safedelete;
    }

    /**
     * @param string $safedelete
     */
    public function setSafedelete($safedelete)
    {
        $this->safedelete = $safedelete;
    }

}
