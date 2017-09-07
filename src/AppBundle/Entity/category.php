<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Constraints as Assert;



/**
 * Category
 *
 * @ORM\Table(name="post_type")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="name", type="string", length=150, unique=true)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="lft", type="integer")
     */
    private $lft;

    /**
     * @var int
     *
     * @ORM\Column(name="rgt", type="integer")
     */
    private $rgt;

    /**
     * @var datetime
     * @Assert\Type("\DateTime")
     * @ORM\Column(name="dateCreated", type="datetime")
     */
    private $dateCreated;
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }


    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set lft
     *
     * @param integer $lft
     *
     * @return Category
     */
    public function setLft($lft)
    {
        $this->lft = $lft;

        return $this;
    }

    /**
     * Get lft
     *
     * @return int
     */
    public function getLft()
    {
        return $this->lft;
    }

    /**
     * Set rgt
     *
     * @param integer $rgt
     *
     * @return Category
     */
    public function setRgt($rgt)
    {
        $this->rgt = $rgt;

        return $this;
    }

    /**
     * Get rgt
     *
     * @return int
     */
    public function getRgt()
    {
        return $this->rgt;
    }

    /**
     * @return DateTime
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }


    /**
     * @param \DateTime $dateCreated
     */
    public function setDateCreated(\DateTime $dateCreated = null)
    {
        if ($dateCreated === null) {
            $dateCreated = new \DateTime('now');
        }
        $this->dateCreated = $dateCreated;
    }
}

