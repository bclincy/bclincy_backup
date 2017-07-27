<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Contact
 *
 * @ORM\Table(name="contact")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ContactRepository")
 */
class Contact
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
     * @ORM\Column(name="fname", type="string", length=100)
     */
    private $fname;

    /**
     * @var string
     *
     * @ORM\Column(name="lname", type="string", length=120)
     */
    private $lname;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=150)
     */
    private $email;

    /**
     * @var array
     *
     * @ORM\Column(name="subject", type="simple_array")
     */
    private $subject;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="text")
     */
    private $message;

    /**
     * @var bool
     *
     * @ORM\Column(name="isReturned", type="boolean")
     */
    private $isReturned;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="recievedOn", type="datetime")
     */
    private $recievedOn;


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
     * Set fname
     *
     * @param string $fname
     *
     * @return Contact
     */
    public function setFname($fname)
    {
        $this->fname = $fname;

        return $this;
    }

    /**
     * Get fname
     *
     * @return string
     */
    public function getFname()
    {
        return $this->fname;
    }

    /**
     * Set lname
     *
     * @param string $lname
     *
     * @return Contact
     */
    public function setLname($lname)
    {
        $this->lname = $lname;

        return $this;
    }

    /**
     * Get lname
     *
     * @return string
     */
    public function getLname()
    {
        return $this->lname;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Contact
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set subject
     *
     * @param array $subject
     *
     * @return Contact
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return array
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set message
     *
     * @param string $message
     *
     * @return Contact
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set isReturned
     *
     * @param boolean $isReturned
     *
     * @return Contact
     */
    public function setIsReturned($isReturned)
    {
        $this->isReturned = $isReturned;

        return $this;
    }

    /**
     * Get isReturned
     *
     * @return bool
     */
    public function getIsReturned()
    {
        return $this->isReturned;
    }

    /**
     * Set recievedOn
     *
     * @param \DateTime $recievedOn
     *
     * @return Contact
     */
    public function setRecievedOn($recievedOn)
    {
        $this->recievedOn = new DateTime('now');

        return $this;
    }

    /**
     * Get recievedOn
     *
     * @return \DateTime
     */
    public function getRecievedOn()
    {
        return $this->recievedOn;
    }
}

