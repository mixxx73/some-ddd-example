<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Ubirak\RestApiBehatExtension\Rest\RestApiBrowser;
use Ubirak\RestApiBehatExtension\RestApiContext;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{

    /** @BeforeScenario */
    public function before(BeforeScenarioScope $scope)
    {
        $this->dm->getConnection()->dropDatabase($this->dbName);
    }

}
