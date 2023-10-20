<?php
require_once 'SafeArrayService.php';

$product = [
	"id" => 1,
	"feature_image" => [
		'large' => 'http://example.com/images/large.jpg',
		'big' => 'http://example.com/images/big.jpg',
		'medium' => 'http://example.com/images/medium.jpg',
		'small' => 'http://example.com/images/small.jpg',
	]
];
$safeData = new SafeArrayService($product);
print("Output of program:\n");
print($safeData->get('feature_image.large') . "\n");
print($safeData->get('feature_image.small') . "\n");
print($safeData->get('feature_image.medium') . "\n");
print($safeData->get('feature_image.big') . "\n");