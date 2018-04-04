
<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Tests\TestCase;
use Behat\Behat\Tester\Exception\PendingException;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Behat\Hook\Scope\AfterScenarioScope;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Http\JsonResponse;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends TestCase implements Context
{

    protected $response, $content;
    protected $baseUrl = '/api/v1';

    public function __construct()
    {
        parent::setUp();
    }

    /**
     * @When I send a :arg1 request to :arg2
     */
    public function iSendARequestTo($arg1, $arg2)
    {
        $request = $this->get($this->baseUrl.$arg2);

        $this->response = $request;

        $this->content = $request->getContent();
    }

    /**
     * @Then the response code should be :arg1
     */
    public function theResponseCodeShouldBe($arg1)
    {
        $this->assertEquals($arg1, $this->response->getStatusCode());
    }

    /**
     * @Then the response should be JSON
     */
    public function theResponseShouldBeJson()
    {
        $this->assertTrue($this->response->baseResponse instanceof \Illuminate\Http\JsonResponse);
    }

    /**
     * @Then the JSON node :arg1 should have :arg2 elements
     */
    public function theJsonNodeShouldHaveElements($arg1, $arg2)
    {
        $element = json_decode($this->content, true)[$arg1];

        $this->assertEquals(count($element), $arg2);
    }

    /**
     * @Then the JSON node :arg1 should exist
     */
    public function theJsonNodeShouldExist($arg1)
    {
        $this->assertContains($arg1, $this->content);
    }

    /**
     * @Then the JSON node :arg1 should equal :arg2
     */
    public function theJsonNodeShouldEqual($arg1, $arg2)
    {
        $keyval = explode('.', $arg1);
        if(count($keyval) > 1) {
            $this->assertEquals(json_decode($this->content, true)[$keyval[0]][$keyval[1]], $arg2);
        } else {
            $this->assertEquals(json_decode($this->content, true)[$arg1], $arg2);
        }
    }
}
