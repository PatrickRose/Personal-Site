Feature: Tags

  As an admin
  I can tag posts
  So that we can find similar posts

  Background: I should have an empty site
    Given I run "php artisan migrate:refresh"
    And I run "php artisan db:seed"
    And I am logged in

  Scenario: I can tag a post
    When I create a blog post and tag it "testing"
    Then I should be on "/blog/tagging"
    And I should see the tag "testing"

  Scenario: I can tag a post with multiple tags
    When I create a blog post and tag it "testing, test1, test2"
    Then I should be on "/blog/tagging"
    And I should see the tag "testing"
    And I should see the tag "test1"
    And I should see the tag "test"
    And I shouldn't see ","

  Scenario: I can search by a tag
    Given I create 9 blog posts with the tag "foo"
    And I create 3 blog posts with the tag "bar"
    When I am on "/tag/foo"
    Then I should see 6 copies of ".blog-title"

  Scenario: I can see all tags
    Given I create 4 blog posts with the tag "foo"
    And I create 4 blog posts with the tag "bar"
    And I create 4 blog posts with the tag "baz"
    And I create 4 blog posts with the tag "bau"
    And I create 4 blog posts with the tag "baa"
    And I create 4 blog posts with the tag "bab"
    And I create 4 blog posts with the tag "bac"
    When I am on "/tag"
    Then I should see "foo"
    And I should see "bar"
    And I should see "baz"
    And I should see 18 copies of ".tagged-post"
