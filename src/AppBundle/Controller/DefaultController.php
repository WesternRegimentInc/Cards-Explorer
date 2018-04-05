<?php

namespace AppBundle\Controller;

use Kayue\WordpressBundle\Entity\Taxonomy;
use Kayue\WordpressBundle\Repository\PostRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
	    $repo = $this->get('kayue_wordpress')->getManager()->getRepository('KayueWordpressBundle:Post');
	    $post = $repo->findBy(array(), array('id' => 'DESC'),10);
	    /*
				foreach ($post as $post){
					echo $post->getTitle() , "\n";
					echo $post->getUser()->getDisplayName() , "\n";
					echo $post->getContent() , "\n";
					echo "<br /><br />";

					foreach($post->getTaxonomies()->filter(function(Taxonomy $tax) {
						// Only return categories, not tags or anything else.
						return 'category' === $tax->getName();
					}) as $tax) {
						echo $tax->getTerm()->getName() . "\n";
					}
				}
		*/
	    return $this->render('default/index.html.twig', [
		    'post' => $post,
	    ]);
    }

	/**
	 * @Route("/find")
	 */
	public function firstPostAction()
	{
		$repo = $this->get('kayue_wordpress')->getManager()->getRepository('KayueWordpressBundle:Post');
		$post = $repo->findBy(array(), array('id' => 'DESC'),10);
		return $this->render('default/blog.html.twig', [
			'post' => $post,
		]);
	}

	/**
	 * @Route("/find2")
	 */
	public function test() {
		$repo = $this->getDoctrine()->getRepository('KayueWordpressBundle:Post');
		$post = $repo->findOneBy(array(
			'slug'   => 'hello-world',
			'type'   => 'post',
			'status' => 'publish',
		));

		echo $post->getTitle() , "\n";
		echo $post->getUser()->getDisplayName() , "\n";
		echo $post->getContent() , "\n";

		foreach($post->getComments() as $comment) {
			echo $comment->getContent() . "\n";
		}

		foreach($post->getTaxonomies()->filter(function(Taxonomy $tax) {
			// Only return categories, not tags or anything else.
			return 'category' === $tax->getName();
		}) as $tax) {
			echo $tax->getTerm()->getName() . "\n";
		}
	}
}
