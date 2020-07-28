# Content Moderation

Determine whether text contains bad words.

## Installation

    composer require monthly-basis/content-moderation

## Examples

### Standalone PHP

    <?php
    require_once('vendor/autoload.php');

    $containsBadWords = MonthlyBasis\ContentModeration\Model\Factory\ContainsBadWords::build();

    $string = 'hello world';

    if ($containsBadWords->containsBadWords($string)) {
        echo 'Your string contains bad words!';
    } else {
        echo 'Phew, your string does not contain bad words.';
    }
