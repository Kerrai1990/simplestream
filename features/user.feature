Feature: Calling Users from an Api
    In order to ensure I have users in my DB
    As an Api
    I need to request Users

    Background:
        #Given that the API is authenticated

    Scenario: GET "/users"
        When I send a "GET" request to "/users"
        Then the response code should be 200
        And the response should be JSON
        And the JSON node "users" should have 20 elements
        And the JSON node "page" should exist
        And the JSON node "total" should exist
        And the JSON node "company" should exist
        And the JSON node "address" should exist

    Scenario: GET "/users/2"
        When I send a "GET" request to "/users/2"
        Then the response code should be 200
        And the response should be JSON
        And the JSON node "total" should equal 1
        And the JSON node "user.name" should equal 'Ervin Howell'
        And the JSON node "user.username" should equal 'ehowell'
        And the JSON node "user.email" should equal 'shanna@melissa.tv'
        And the JSON node "user.phone" should equal '020-7365-9514'
        And the JSON node "user.website" should equal 'shanna.net'
        And the JSON node "company" should exist
        And the JSON node "address" should exist

    Scenario: GET "/users/FAKE"
        When I send a "GET" request to "/users/FAKE"
        Then the response code should be 404

    Scenario: GET "/users/11111"
        When I send a "GET" request to "/users/11111"
        Then the response code should be 404
