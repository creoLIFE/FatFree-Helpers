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
    public function getInfoCreated()
    {
        return $this->info_created;
    }

    /**
     * @param string $info_created
     */
    public function setInfoCreated($info_created)
    {
        $this->info_created = $info_created;
    }

    /**
     * @return string
     */
    public function getInfoModified()
    {
        return $this->info_modified;
    }

    /**
     * @param string $info_modified
     */
    public function setInfoModified($info_modified)
    {
        $this->info_modified = $info_modified;
    }

    /**
     * @return string
     */
    public function getInfoDeleted()
    {
        return $this->info_deleted;
    }

    /**
     * @param string $info_deleted
     */
    public function setInfoDeleted($info_deleted)
    {
        $this->info_deleted = $info_deleted;
    }
}
