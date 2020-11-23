<?php
namespace ExtbaseBook\Simpleblog\Validation\Validator;


use TYPO3\CMS\Extbase\Validation\Validator\AbstractValidator;


class WordCountValidator extends AbstractValidator
{
    /**
     * @var array
     */
    protected $supportedOptions = [
        'maximum' => [PHP_INT_MAX, 'Maximum number of words', 'integer']
    ];
    /**
     * Checks if the given string does not contain more than a maximum number of words
     *
     * @param mixed $value The value that should be validated
     */
    public function isValid($value): void
    {
        $maximum = $this->options['maximum'];
        if (!is_string($value) || $this->wordCount($value) > $maximum) {
            $this->addError(
                'Number of words exceeds the maximum of ' . $maximum,
                1548653067
            );
        }
    }

    /**
     * UTF-8 save str_word_count() function
     *
     * @param string $string Input string to evaluate
     * @return int Number of words
     */
    protected function wordCount($string): int
    {
        return intval(count(preg_split('~[^\p{L}\p{N}\']+~u', (string)$string)));
    }
}