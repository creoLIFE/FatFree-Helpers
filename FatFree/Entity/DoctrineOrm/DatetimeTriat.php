<?php

namespace FatFree\Entity\DoctrineOrm;

use Doctrine\ORM\Mapping as ORM;

trait DatetimeTriat
{
    /**
     * @var string
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $info_created;

    /**
     * @var string
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $info_modified;

    /**
     * @var string
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $info_deleted;

    /**
     * @return string
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param string $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @return string
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * @param string $modified
     */
    public function setModified($modified)
    {
        $this->modified = $modified;
    }

    /**
     * @return string
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * @param string $deleted
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
    }
}
