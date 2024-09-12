<?php declare(strict_types=1);

use Osumi\OsumiFramework\App\Module\Api\GetCharacters\GetCharactersAction;
use Osumi\OsumiFramework\App\Module\Api\GetTale\GetTaleAction;
use Osumi\OsumiFramework\App\Module\Api\GetTales\GetTalesAction;
use Osumi\OsumiFramework\App\Module\Api\SaveCharacter\SaveCharacterAction;
use Osumi\OsumiFramework\App\Module\Api\SaveTale\SaveTaleAction;

use Osumi\OsumiFramework\App\Service\CharactersService;
use Osumi\OsumiFramework\App\Service\TalesService;

$urls = [
  [
    'url' => '/api/get-characters',
    'action' => GetCharactersAction::class,
    'services' => [CharactersService::class],
    'type' => 'json'
  ],
  [
    'url' => '/api/get-tale',
    'action' => GetTaleAction::class,
    'type' => 'json'
  ],
  [
    'url' => '/api/get-tales',
    'action' => GetTalesAction::class,
  	'services' => [TalesService::class],
    'type' => 'json'
  ],
  [
    'url' => '/api/save-character',
    'action' => SaveCharacterAction::class,
    'services' => [CharactersService::class],
    'type' => 'json'
  ],
  [
    'url' => '/api/save-tale',
    'action' => SaveTaleAction::class,
    'type' => 'json'
  ],
];

return $urls;
