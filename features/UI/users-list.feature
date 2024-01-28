Feature: Users list

  Scenario: Users list
    Given I add "authorization" header equal to "admin_valid_token"
    And I add "content-type" header equal to "application/json"
    When I send a GET request to "/api/users"
    Then print response
#  Scenario: Users list available only for requests with valid access token
#    Given I add "authorization" header equal to "admin_valid_token"
#    And I add "content-type" header equal to "application/json"
#    When I send a POST request to "/api/users" with body:
#      """
#      {
#        "id":"841015d9-07a2-4a04-97db-7db9afb5c5f1",
#        "roleId": "c2264675-d7ab-4092-9e9c-766966c1eb38",
#        "name": "Joe Doe",
#        "description": "Test description",
#        "email": "j.doe@ok.pl"
#      }
#      """
#    Then the response status code should be 201

#    When I send a "POST" request to "/api/users" with body:

#    Given I send "POST" request to "/api/users" with "admin_valid_token" access token and following payload:
#      """
#      {
#        "id":"841015d9-07a2-4a04-97db-7db9afb5c5f1",
#        "roleId": "c2264675-d7ab-4092-9e9c-766966c1eb38",
#        "name": "Joe Doe",
#        "description": "Test description",
#        "email": "j.doe@ok.pl"
#      }
#      """
#    And the response status code should be 201
#
#    When I send "GET" request to "/api/users" with "admin_valid_token" access token and following payload:
#      """
#      """
#    Then the response status code should be 200
#
