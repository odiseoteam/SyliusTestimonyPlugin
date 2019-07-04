@managing_testimonies
Feature: Browsing testimonies
  In order to show different testimonies
  As an Administrator
  I want to be able to browse testimonies

  Background:
    Given I am logged in as an administrator
    And the store operates on a single channel in "United States"
    And the store has 5 testimonies

  @ui
  Scenario: Browsing defined testimonies
    When I want to browse testimonies
    Then I should see 5 testimonies in the list
