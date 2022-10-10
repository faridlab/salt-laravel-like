<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\ResourceFeatureTestCase;

class LikeFeatureTest extends TestCase
{
  protected $endpoint = '/api/v1/reactions';
  protected $postData = [
      "type" => 'like',
  ];

  protected $putDataInvalid = [
    "type" => 123,
  ];

  protected $putDataValid = [
    "type" => 'love',
  ];

  use ResourceFeatureTestCase;
}
