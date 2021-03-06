<?php
namespace MonthlyBasis\ContentModeration\View\Helper;

use Laminas\View\Helper\AbstractHelper;
use LeoGalleguillos\String\Model\Service as StringService;
use MonthlyBasis\ContentModeration\Model\Service as ContentModerationService;

class ReplaceAndEscape extends AbstractHelper
{
    public function __construct(
        ContentModerationService\Replace\BadWords $replaceBadWordsService,
        ContentModerationService\Replace\ImmatureWords $replaceImmatureWordsService,
        ContentModerationService\Replace\Spaces $replaceSpacesService,
        StringService\Escape $escapeService
    ) {
        $this->replaceBadWordsService      = $replaceBadWordsService;
        $this->replaceImmatureWordsService = $replaceImmatureWordsService;
        $this->replaceSpacesService        = $replaceSpacesService;
        $this->escapeService               = $escapeService;
    }

    public function __invoke(
        string $string,
        string $replacement = ''
    ): string {
        $string = $this->replaceBadWordsService->replaceBadWords($string, $replacement);
        $string = $this->replaceImmatureWordsService->replaceImmatureWords($string, $replacement);
        $string = $this->replaceSpacesService->replaceSpaces($string);

        return $this->escapeService->escape($string);
    }
}
