<?php

namespace Drupal\analytics\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Controller for Drupal user and Auth0 user.
 */
class AnalyticsController extends ControllerBase {

  /**
   * Current user.
   */
  protected $user;

  /**
   * Constructs the AnalyticsController.
   */
  public function __construct() {
    $this->user = \Drupal::currentUser();
  }

  /**
   * Get the auth0 user ID to pass in with our Analytics.
   *
   * @param int $drupalId
   *   The Drupal user account ID.
   *
   * @return arr
   *   Auth0 user object.
   */
  private function findAuth0User($drupalId) {
    $auth0User = db_select('auth0_user', 'a')
      ->fields('a', ['auth0_id'])
      ->condition('drupal_id', $drupalId, '=')
      ->execute()
      ->fetchAssoc();

    return empty($auth0User) ? FALSE : $auth0User;
  }

  /**
   * Get the auth0 user ID to pass in with our Analytics.
   *
   * @return int
   *   Auth0 user ID.
   */
  public function getAuth0User() {
    $drupalUser = $this->user->id();
    $auth0User = $this->findAuth0User($drupalUser);
    $auth0UserId = $auth0User['auth0_id'];

    return $auth0UserId;
  }

}
