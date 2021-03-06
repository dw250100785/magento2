<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Magento
 * @package     Magento_Data
 * @subpackage  integration_tests
 * @copyright   Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Tests for \Magento\Framework\Data\Form\Element\Textarea
 */
namespace Magento\Framework\Data\Form\Element;

class TextareaTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    protected $_objectManagerMock;

    /**
     * @var \Magento\Framework\Data\Form\Element\Textarea
     */
    protected $_model;

    protected function setUp()
    {
        $factoryMock = $this->getMock('\Magento\Framework\Data\Form\Element\Factory', array(), array(), '', false);
        $collectionFactoryMock = $this->getMock(
            '\Magento\Framework\Data\Form\Element\CollectionFactory',
            array(),
            array(),
            '',
            false
        );
        $escaperMock = $this->getMock('\Magento\Framework\Escaper', array(), array(), '', false);
        $this->_model = new \Magento\Framework\Data\Form\Element\Textarea(
            $factoryMock,
            $collectionFactoryMock,
            $escaperMock
        );
        $formMock = new \Magento\Framework\Object();
        $formMock->getHtmlIdPrefix('id_prefix');
        $formMock->getHtmlIdPrefix('id_suffix');
        $this->_model->setForm($formMock);
    }

    /**
     * @covers \Magento\Framework\Data\Form\Element\Textarea::__construct
     */
    public function testConstruct()
    {
        $this->assertEquals('textarea', $this->_model->getType());
        $this->assertEquals('textarea', $this->_model->getExtType());
        $this->assertEquals(2, $this->_model->getRows());
        $this->assertEquals(15, $this->_model->getCols());
    }

    /**
     * @covers \Magento\Framework\Data\Form\Element\Textarea::getElementHtml
     */
    public function testGetElementHtml()
    {
        $html = $this->_model->getElementHtml();
        $this->assertContains('</textarea>', $html);
        $this->assertContains('rows="2"', $html);
        $this->assertContains('cols="15"', $html);
        $this->assertTrue(preg_match('/class=\".*textarea.*\"/i', $html) > 0);
    }

    /**
     * @covers \Magento\Framework\Data\Form\Element\Textarea::getHtmlAttributes
     */
    public function testGetHtmlAttributes()
    {
        $this->assertEmpty(
            array_diff(
                array(
                    'title',
                    'class',
                    'style',
                    'onclick',
                    'onchange',
                    'rows',
                    'cols',
                    'readonly',
                    'disabled',
                    'onkeyup',
                    'tabindex'
                ),
                $this->_model->getHtmlAttributes()
            )
        );
    }
}
