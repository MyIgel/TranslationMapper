<?php

declare(strict_types=1);

namespace Engelsystem\Plugins\TranslationMapper;

use Engelsystem\Helpers\Translation\Translator as EngelsystemTranslator;

class Translator extends EngelsystemTranslator
{
    protected array $replacements = [
        // EN
        'Angel types' => 'Teams',
        'angel types' => 'teams',
        'Angel type' => 'Team',
        'angel type' => 'team',
        'Angels' => 'Helpers',
        'angels' => 'helpers',
        'Angel' => 'Helper',
        'Heaven' => 'Helpdesk',

        // DE
        'Engeltypen' => 'Teams',
        'Engeltyp' => 'Team',
        'Engel' => 'Helfende',
        'den Himmel' => 'den Helpdesk',
        'Himmel' => 'Helpdesk',
    ];

    /** @noinspection PhpMissingParentConstructorInspection */
    public function __construct(protected EngelsystemTranslator $translator)
    {
    }

    public function translate(string $key, array $replace = []): string
    {
        return $this->replaceContent($this->translator->translate($key, $replace));
    }

    public function translatePlural(string $key, string $pluralKey, int $number, array $replace = []): string
    {
        return $this->replaceContent($this->translator->translatePlural($key, $pluralKey, $number, $replace));
    }

    /**
     * Replace the given words with their counterparts
     */
    protected function replaceContent(string $value): string
    {
        return str_replace(array_keys($this->replacements), array_values($this->replacements), $value);
    }

    public function getLocale(): string
    {
        return $this->translator->getLocale();
    }

    public function setLocale(string $locale): void
    {
        $this->translator->setLocale($locale);
    }

    public function getLocales(): array
    {
        return $this->translator->getLocales();
    }

    public function hasLocale(string $locale): bool
    {
        return $this->translator->hasLocale($locale);
    }

    public function setLocales(array $locales): void
    {
        $this->translator->setLocales($locales);
    }
}
