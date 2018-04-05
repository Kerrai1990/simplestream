<?php

use Behat\Behat\Context\Context;
use Tests\TestCase;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends TestCase implements Context
{

    /**
     * @var string
     */
    protected $response;

    /**
     * @var string
     */
    protected $content;

    /**
     * @var string
     */
    protected $baseUrl = '/api/v1';

    /**
     * FeatureContext constructor.
     */
    public function __construct()
    {
        parent::setUp();
    }

    /**
     * @param string $arg1
     * @param string $arg2
     * @When I send a :arg1 request to :arg2
     */
    public function iSendARequestTo(string $arg1, string $arg2): void
    {
        $request = $this->{$arg1}($this->baseUrl.$arg2);

        $this->response = $request;

        $this->content = $request->getContent();
    }

    /**
     * @param string arg1
     * @Then the response code should be :arg1
     */
    public function theResponseCodeShouldBe(string $arg1): void
    {
        $this->assertEquals($arg1, $this->response->getStatusCode());
    }

    /**
     * @Then the response should be JSON
     */
    public function theResponseShouldBeJson(): void
    {
        $this->assertTrue($this->response->baseResponse instanceof \Illuminate\Http\JsonResponse);
    }

    /**
     * @param string $arg1
     * @param string $arg2
     * @Then the JSON node :arg1 should have :arg2 elements
     */
    public function theJsonNodeShouldHaveElements(string $arg1, string $arg2) : void
    {
        $element = json_decode($this->content, true)[$arg1];

        $this->assertEquals(count($element), $arg2);
    }

    /**
     * @param string $arg1
     * @Then the JSON node :arg1 should exist
     */
    public function theJsonNodeShouldExist($arg1) : void
    {
        $this->assertContains($arg1, $this->content);
    }

    /**
     * @param string $arg1
     * @param string $arg2
     * @Then the JSON node :arg1 should equal :arg2
     */
    public function theJsonNodeShouldEqual(string $arg1, string $arg2) : void
    {
        $keyval = explode('.', $arg1);

        if(count($keyval) > 1) {
            $this->assertEquals(json_decode($this->content, true)[$keyval[0]][$keyval[1]], $arg2);
        } else {
            $this->assertEquals(json_decode($this->content, true)[$arg1], $arg2);
        }
    }
}
