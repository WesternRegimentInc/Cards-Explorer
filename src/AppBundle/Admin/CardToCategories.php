<?php

namespace AppBundle\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Knp\Menu\ItemInterface as MenuItemInterface;

class CardToCategories extends AbstractAdmin
{
	public function toString($object)
	{
		return $object instanceof CardCategory
			? $object->getName()
			: 'Card Category'; // shown in the breadcrumb on the create view
	}

	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper->add('category', 'sonata_type_model', array(
			'class' => 'AppBundle\Entity\CardCategory',
			'property' => 'name',
		));
	}

	protected function configureDatagridFilters(DatagridMapper $datagridMapper)
	{
		$datagridMapper->add('name');
	}

	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper->addIdentifier('name');
	}
}
