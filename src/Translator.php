<?php

declare(strict_types=1);

namespace Engelsystem\Plugins\TranslationMapper;

use Engelsystem\Helpers\Translation\Translator as EngelsystemTranslator;

class Translator extends EngelsystemTranslator
{
    protected array $replacements = [
        // EN
        'Angel types' => 'Daemon types',
        'angel types' => 'daemon types',
        'Angel type' => 'Daemon type',
        'Angels' => 'Daemons',
        'angels' => 'daemons',
        'Angel' => 'Daemon',
        'Heaven' => 'Hell',
        'helpers' => 'daemons',
        'helper' => 'daemon',

        // DE
        'Engeltypen' => 'Dämonarten',
        'Engeltyp' => 'Dämonart',
        'Engel' => 'Dämonen',
        'den Himmel' => 'die Hölle',
        'Himmel' => 'Hölle',
        'Helfer' => 'Dämonen',
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
