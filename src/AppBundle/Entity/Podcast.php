<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Podcast
 *
 * @ORM\Table(name="podcast")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PodcastRepository")
 */
class Podcast
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
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=255, unique=true)
     */
    private $link;

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=255)
     */
    private $language;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lastBuildDate", type="datetime")
     */
    private $lastBuildDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pubDate", type="datetime")
     */
    private $pubDate;

    /**
     * @var string
     *
     * @ORM\Column(name="webmaster", type="string", length=150)
     */
    private $webmaster;

    /**
     * @var string
     *
     * @ORM\Column(name="guid", type="string", length=255)
     */
    private $guid;

    /**
     * @var string
     *
     * @ORM\Column(name="media", type="string", length=255)
     */
    private $media;

    /**
     * @var string
     *
     * @ORM\Column(name="video", type="string", length=255)
     */
    private $video;


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
     * @return Podcast
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
     * Set description
     *
     * @param string $description
     *
     * @return Podcast
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
     * Set link
     *
     * @param string $link
     *
     * @return Podcast
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set language
     *
     * @param string $language
     *
     * @return Podcast
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set lastBuildDate
     *
     * @param \DateTime $lastBuildDate
     *
     * @return Podcast
     */
    public function setLastBuildDate($lastBuildDate)
    {
        $this->lastBuildDate = $lastBuildDate;

        return $this;
    }

    /**
     * Get lastBuildDate
     *
     * @return \DateTime
     */
    public function getLastBuildDate()
    {
        return $this->lastBuildDate;
    }

    /**
     * Set pubDate
     *
     * @param \DateTime $pubDate
     *
     * @return Podcast
     */
    public function setPubDate($pubDate)
    {
        $this->pubDate = $pubDate;

        return $this;
    }

    /**
     * Get pubDate
     *
     * @return \DateTime
     */
    public function getPubDate()
    {
        return $this->pubDate;
    }

    /**
     * Set webmaster
     *
     * @param string $webmaster
     *
     * @return Podcast
     */
    public function setWebmaster($webmaster)
    {
        $this->webmaster = $webmaster;

        return $this;
    }

    /**
     * Get webmaster
     *
     * @return string
     */
    public function getWebmaster()
    {
        return $this->webmaster;
    }

    /**
     * Set guid
     *
     * @param string $guid
     *
     * @return Podcast
     */
    public function setGuid($guid)
    {
        $this->guid = $guid;

        return $this;
    }

    /**
     * Get guid
     *
     * @return string
     */
    public function getGuid()
    {
        return $this->guid;
    }

    /**
     * Set media
     *
     * @param string $media
     *
     * @return Podcast
     */
    public function setMedia($media)
    {
        $this->media = $media;

        return $this;
    }

    /**
     * Get media
     *
     * @return string
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * Set video
     *
     * @param string $video
     *
     * @return Podcast
     */
    public function setVideo($video)
    {
        $this->video = $video;

        return $this;
    }

    /**
     * Get video
     *
     * @return string
     */
    public function getVideo()
    {
        return $this->video;
    }
}

