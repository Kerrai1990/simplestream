Feature: Calling Users from an Api
    In order to ensure I have users in my DB
    As an Api
    I need to request Users

    Background:
        #Given that the API is authenticated

    Scenario: GET "/companies"
        When I send a "GET" request to "/companies"
        Then the response code should be 200
        And the response should be JSON
        And the JSON node "companies" should have 4 elements
        And the JSON node "page" should exist
        And the JSON node "total" should exist
        And the JSON node "address" should exist

    Scenario: GET "/companies/2"
        When I send a "GET" request to "/companies/2"
        Then the response code should be 200
        And the response should be JSON
        And the JSON node "total" should equal 1
        And the JSON node "company.name" should equal 'Deckow-Crist'
        And the JSON node "company.catch_phrase" should equal 'Proactive didactic contingency'
        And the JSON node "address" should exist

    Scenario: GET "/companies/FAKE"
        When I send a "GET" request to "/companies/FAKE"
        Then the response code should be 404

    Scenario: GET "/companies/11111"
        When I send a "GET" request to "/companies/11111"
        Then the response code should be 404
