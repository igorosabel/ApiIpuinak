<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\Routes;

use Osumi\OsumiFramework\Routing\ORoute;
use Osumi\OsumiFramework\App\Module\Api\GetCharacters\GetCharactersAction;
use Osumi\OsumiFramework\App\Module\Api\GetTale\GetTaleAction;
use Osumi\OsumiFramework\App\Module\Api\GetTales\GetTalesAction;
use Osumi\OsumiFramework\App\Module\Api\SaveCharacter\SaveCharacterAction;
use Osumi\OsumiFramework\App\Module\Api\SaveTale\SaveTaleAction;

ORoute::group('/api', 'json', function() {
  ORoute::post('/get-characters', GetCharactersAction::class);
  ORoute::post('/get-tale',       GetTaleAction::class);
  ORoute::post('/get-tales',      GetTalesAction::class);
  ORoute::post('/save-character', SaveCharacterAction::class);
  ORoute::post('/save-tale',      SaveTaleAction::class);
});
