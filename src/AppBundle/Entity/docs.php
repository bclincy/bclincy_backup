<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * docs
 *
 * @ORM\Table(name="docs")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\docsRepository")
 */
class docs
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
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="keywords", type="string", length=255)
     */
    private $keywords;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdDate", type="datetime", options={"default" : now()})
     */
    private $createdDate;

    /**
     * @var string
     *
     * @ORM\Column(name="docType", type="string", length=255)
     */
    private $docType;

    /**
     * @var int
     *
     * @ORM\Column(name="authorID", type="integer")
     */
    private $authorID;

    /**
     * @var int
     *
     * @ORM\Column(name="active", type="smallint")
     */
    private $active;

    /**
     * @var int
     *
     * @ORM\Column(name="catID", type="smallint")
     */
    private $catID;

    /**
     * @var string
     *
     * @ORM\Column(name="docName", type="string", length=255)
     */
    private $docName;


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
     * Set title
     *
     * @param string $title
     *
     * @return docs
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set keywords
     *
     * @param string $keywords
     *
     * @return docs
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;

        return $this;
    }

    /**
     * Get keywords
     *
     * @return string
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return docs
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return docs
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     *
     * @return docs
     */
    public function setCreatedDate($createdDate)
    {
        if (is_null($createdDate)){
            $this->createdDate = new \DateTime('now');
        }
        else {
            $this->createdDate = $createdDate;
        }

        return $this;
    }

    /**
     * Get createdDate
     *
     * @return \DateTime
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * Set docType
     *
     * @param string $docType
     *
     * @return docs
     */
    public function setDocType($docType)
    {
        $this->docType = $docType;

        return $this;
    }

    /**
     * Get docType
     *
     * @return string
     */
    public function getDocType()
    {
        return $this->docType;
    }

    /**
     * Set authorID
     *
     * @param integer $authorID
     *
     * @return docs
     */
    public function setAuthorID($authorID)
    {
        $this->authorID = $authorID;

        return $this;
    }

    /**
     * Get authorID
     *
     * @return int
     */
    public function getAuthorID()
    {
        return $this->authorID;
    }

    /**
     * Set active
     *
     * @param integer $active
     *
     * @return docs
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return int
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set catID
     *
     * @param integer $catID
     *
     * @return docs
     */
    public function setCatID($catID)
    {
        $this->catID = $catID;

        return $this;
    }

    /**
     * Get catID
     *
     * @return int
     */
    public function getCatID()
    {
        return $this->catID;
    }

    /**
     * Set docName
     *
     * @param string $docName
     *
     * @return docs
     */
    public function setDocName($docName)
    {
        $this->docName = $docName;

        return $this;
    }

    /**
     * Get docName
     *
     * @return string
     */
    public function getDocName()
    {
        return $this->docName;
    }
}

