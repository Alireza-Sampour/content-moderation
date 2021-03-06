<?php
namespace MonthlyBasis\ContentModeration\Model\Service;

use MonthlyBasis\ContentModeration\Model\Service as ContentModerationService;

/**
 * @deprecated Use ContentModerationService\Replace\ImmatureWords() instead.
 */
class ReplaceImmatureWords
{
    public function __construct(
        ContentModerationService\RegularExpressions\ImmatureWords $regularExpressionsOfImmatureWords
    ) {
        $this->regularExpressionsOfImmatureWords = $regularExpressionsOfImmatureWords;
    }

    public function replaceImmatureWords(
        string $string,
        string $replacement = ''
    ): string {
        $patterns = $this->regularExpressionsOfImmatureWords
            ->getRegularExpressionsOfImmatureWords();
        $string = preg_replace($patterns, $replacement, $string);
        return is_null($string) ? '' : $string;
    }
}
