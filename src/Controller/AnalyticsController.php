<?php
/**
 * @file
 * Contains \Drupal\analytics\Controller\AnalyticsController
 *
 * Author: Beverly Lanning, bemarlan
 * Purpose: Fetches the the Auth0 user ID to pass in with our Analytics.
 * 07/26/2018
 */

namespace Drupal\analytics\Controller;

use Drupal\Core\Controller\ControllerBase;

class AnalyticsController extends ControllerBase {

	/**
   * {@inheritdoc}
   */
	public function __construct(){
  	$this->user = \Drupal::currentUser();
	}

	/**
   * Get the auth0 user ID to pass in with our Analytics.
   */
	private function findAuth0User($drupalId) {
		$auth0User = db_select('auth0_user', 'a')
      ->fields('a', array('auth0_id'))
      ->condition('drupal_id', $drupalId, '=')
      ->execute()
      ->fetchAssoc();

    return empty($auth0User) ? FALSE : $auth0User;
	}

	/**
   * Get the auth0 user ID to pass in with our Analytics.
   */
	public function getAuth0User() {
		$drupalUser = $this->user->id();
		$auth0User = $this->findAuth0User($drupalUser);
		$auth0UserId = $auth0User['auth0_id'];
		return $auth0UserId;
	}

}
