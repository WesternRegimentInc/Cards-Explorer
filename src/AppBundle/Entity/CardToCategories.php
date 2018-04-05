<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CardToCategories
 *
 * @ORM\Table(name="card_to_categories")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CardToCategoriesRepository")
 */
class CardToCategories
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
     * @var int
     *
     * @ORM\Column(name="category_id", type="integer")
     */
    private $categoryId;

    /**
     * @var int
     *
     * @ORM\Column(name="card_id", type="integer")
     */
    private $cardId;


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
     * Set categoryId.
     *
     * @param int $categoryId
     *
     * @return CardToCategories
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    /**
     * Get categoryId.
     *
     * @return int
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * Set cardId.
     *
     * @param int $cardId
     *
     * @return CardToCategories
     */
    public function setCardId($cardId)
    {
        $this->cardId = $cardId;

        return $this;
    }

    /**
     * Get cardId.
     *
     * @return int
     */
    public function getCardId()
    {
        return $this->cardId;
    }

	/**
	 * @ORM\ManyToOne(targetEntity="CardCategory", inversedBy="card_to_categories")
	 * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
	 */
	private $card_categories;

	public function setCardCategory(CardCategory $card_categories)
	{
		$this->card_categories = $card_categories;
	}

	public function getCardCategory()
	{
		return $this->card_categories;
	}
}
