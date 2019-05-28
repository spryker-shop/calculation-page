<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\CalculationPage;

use Spryker\Yves\Kernel\AbstractFactory;
use SprykerShop\Yves\CalculationPage\Dependency\Client\CalculationPageToCalculationClientInterface;
use SprykerShop\Yves\CalculationPage\QuoteReader\QuoteReader;
use SprykerShop\Yves\CalculationPage\QuoteReader\QuoteReaderInterface;

/**
 * @method \Spryker\Client\Calculation\CalculationClientInterface getClient()
 */
class CalculationPageFactory extends AbstractFactory
{
    /**
     * @return \SprykerShop\Yves\CalculationPage\QuoteReader\QuoteReaderInterface
     */
    public function createQuoteReader(): QuoteReaderInterface
    {
        return new QuoteReader(
            $this->getQuoteClient(),
            $this->getCalculationClient(),
            $this->getConfig()
        );
    }

    /**
     * @return \SprykerShop\Yves\CalculationPage\Dependency\Client\CalculationPageToQuoteClientInterface
     */
    public function getQuoteClient()
    {
        return $this->getProvidedDependency(CalculationPageDependencyProvider::CLIENT_QUOTE);
    }

    /**
     * @return \SprykerShop\Yves\CalculationPage\Dependency\Client\CalculationPageToCalculationClientInterface
     */
    public function getCalculationClient(): CalculationPageToCalculationClientInterface
    {
        return $this->getProvidedDependency(CalculationPageDependencyProvider::CLIENT_CALCULATION);
    }
}
