<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\Routes;

use Osumi\OsumiFramework\Routing\ORoute;
use Osumi\OsumiFramework\App\Module\Api\GetCharacters\GetCharactersComponent;
use Osumi\OsumiFramework\App\Module\Api\GetTale\GetTaleComponent;
use Osumi\OsumiFramework\App\Module\Api\GetTales\GetTalesComponent;
use Osumi\OsumiFramework\App\Module\Api\SaveCharacter\SaveCharacterComponent;
use Osumi\OsumiFramework\App\Module\Api\SaveTale\SaveTaleComponent;

ORoute::prefix('/api', function() {
  ORoute::post('/get-characters', GetCharactersComponent::class);
  ORoute::post('/get-tale',       GetTaleComponent::class);
  ORoute::post('/get-tales',      GetTalesComponent::class);
  ORoute::post('/save-character', SaveCharacterComponent::class);
  ORoute::post('/save-tale',      SaveTaleComponent::class);
});
