<?php

namespace Mirasvit\Blog\Block\Adminhtml\Post\Edit\Sidebar;

use Magento\Framework\Data\FormFactory;
use Magento\Framework\Registry;
use Magento\Backend\Block\Widget\Form;
use Magento\Backend\Block\Widget\Context;

class Tags extends Form
{
    /**
     * @var FormFactory
     */
    protected $formFactory;

    /**
     * @var Registry
     */
    protected $registry;

    /**
     * @param FormFactory $formFactory
     * @param Registry    $registry
     * @param Context     $context
     */
    public function __construct(
        FormFactory $formFactory,
        Registry $registry,
        Context $context
    ) {
        $this->formFactory = $formFactory;
        $this->registry = $registry;

        parent::__construct($context);
    }

    /**
     * @return $this
     *
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    protected function _prepareForm()
    {
        $form = $this->formFactory->create();
        $this->setForm($form);

        /** @var \Mirasvit\Blog\Model\Post $post */
        $post = $this->registry->registry('current_model');

        $fieldset = $form->addFieldset('tags_fieldset', [
            'class'  => 'blog__post-fieldset',
            'legend' => __('Tags'),
        ]);

        $fieldset->addField('tags', 'textarea', [
            'name'  => 'tags',
            'value' => $post->getTags(),
        ]);

        return parent::_prepareForm();
    }
}