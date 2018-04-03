<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Kayue\WordpressBundle\Entity\Post as BasePost;

class Post extends BasePost
{
	/**
	 * @var int $id
	 */
    protected $id;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
