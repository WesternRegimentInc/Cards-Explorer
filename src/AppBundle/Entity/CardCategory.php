<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * CardCategory
 *
 * @ORM\Table(name="card_category")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CardCategoryRepository")
 */
class CardCategory
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return CardCategory
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

	/**
	 * @ORM\OneToMany(targetEntity="CardToCategories", mappedBy="card_categories")
	 */
	private $card_to_category;

	public function __construct()
	{
		$this->card_to_category = new ArrayCollection();
	}

	public function getCardToCategories()
	{
		return $this->card_to_category;
	}
}
