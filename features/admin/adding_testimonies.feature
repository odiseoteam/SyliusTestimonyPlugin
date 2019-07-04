@managing_testimonies
Feature: Adding a new testimony
  In order to show different testimonios on the webpage
  As an Administrator
  I want to add a new testimony to the admin

  Background:
    Given I am logged in as an administrator
    And the store operates on a single channel in "United States"

  @ui
  Scenario: Adding a new testimony
    Given I want to add a new testimony
    When I fill the title with "Testimony 1"
    And I fill the description with "This is a testimony 1"
    And I add it
    Then I should be notified that it has been successfully created
    And the testimony "Testimony 1" should appear in the admin
