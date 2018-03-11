<?php

namespace AppBundle\Admin;

use AppBundle\Entity\Cards as Cds;
use Sonata\AdminBundle\Form\Type\ModelType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Knp\Menu\ItemInterface as MenuItemInterface;

class Cards extends AbstractAdmin
{
	protected $parentAssociationMapping = 'playlist';

	// OR

	public function getParentAssociationMapping()
	{
		return 'playlist';
	}
	public function toString($object)
	{
		return $object instanceof \AppBundle\Entity\Cds
			? $object->getTitle()
			: 'Cards'; // shown in the breadcrumb on the create view
	}

	protected function configureSideMenu(MenuItemInterface $menu, $action, AdminInterface $childAdmin = null)
	{
		if (!$childAdmin && !in_array($action, ['edit', 'show'])) {
			return;
		}

		$admin = $this->isChild() ? $this->getParent() : $this;
		$id = $admin->getRequest()->get('id');

		$menu->setName('Cards');
		$menu->addChild('View Playlist', [
			'uri' => $admin->generateUrl('show', ['id' => $id])
		]);

		if ($this->isGranted('EDIT')) {
			$menu->addChild('Edit Playlist', [
				'uri' => $admin->generateUrl('edit', ['id' => $id])
			]);
		}

		if ($this->isGranted('LIST')) {
			$menu->addChild('Manage Videos', [
				'uri' => $admin->generateUrl('sonata.admin.video.list', ['id' => $id])
			]);
		}
	}

	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper
			->with('Content', array('class' => 'col-md-9'))
			->add('title', TextType::class)
			->add('info', 'textarea')
			->end()

			->with('Others', array('class' => 'col-md-3'))
				->add('info', TextType::class)
				->add('status', ChoiceType::class, array(
					// looks for choices from this entity
					'choices' => array(
						'Active' => true,
						'Inactive' => false,
					),

					// uses the User.username property as the visible option string
					'choice_label' => 'status',

					// used to render a select box, check boxes or radios
					// 'multiple' => true,
					// 'expanded' => true,
				))
			->end()
		;
	}

	// Fields to be shown on filter forms
	protected function configureDatagridFilters(DatagridMapper $datagridMapper)
	{
		$datagridMapper
			->add('title')
		;
	}

	// Fields to be shown on lists
	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper
			->addIdentifier('title')
		;
	}
}
