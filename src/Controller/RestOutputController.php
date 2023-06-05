<?php

namespace Drupal\custom_api_client\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\custom_api_client\RestOutputService;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides the rest output.
 *
 * @package Drupal\custom_api_client\Controller;
\Controller
 */
class RestOutputController extends ControllerBase {

  /**
   * RestOutputService object.
   *
   * @var mixed
   */
  private $restOutput;

  /**
   * RestOutputController constructor.
   *
   * @param \Drupal\custom_api_client\RestOutputService $rest_output
   *   RestOutputService service.
   * @throws \Exception
   */
  public function __construct(RestOutputService $rest_output) {
    $this->restOutput = $rest_output->load();
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('custom_api_client.rest_output')
    );
  }

  /**
   * Displays the photos.
   *
   * @return array
   *   A renderable array representing the photos.
   */
  public function showPhotos(): array {
    return $this->restOutput;
  }

}
