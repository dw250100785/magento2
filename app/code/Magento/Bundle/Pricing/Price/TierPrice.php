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
 * @copyright   Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Magento\Bundle\Pricing\Price;

/**
 * Bundle tire prices model
 */
class TierPrice extends \Magento\Catalog\Pricing\Price\TierPrice
{
    /**
     * Price type tier
     */
    const PRICE_CODE = 'tier_price';

    /**
     * @var bool
     */
    protected $filterByBasePrice = false;

    /**
     * Returns true if first price is better
     *
     * Method filters tiers price values, higher discount value is better
     *
     * @param float $firstPrice
     * @param float $secondPrice
     * @return bool
     */
    protected function isFirstPriceBetter($firstPrice, $secondPrice)
    {
        return $firstPrice > $secondPrice;
    }
}
