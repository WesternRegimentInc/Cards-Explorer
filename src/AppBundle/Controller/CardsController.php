<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CardsController extends Controller
{
	/**
	 * @Route("/blog", name="blog_home")
	 */
	public function indexAction(  ) {
		
	}

	/**
	 * @Route("/blog/article/{articleId}", name="blog_article")
	 */
	public function ArticleAction($articleId)
	{
		// ...
	}
}
