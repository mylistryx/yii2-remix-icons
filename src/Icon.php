<?php

namespace yii\ri;

use yii\helpers\Html;
use function array_unique;
use function implode;

abstract class Icon
{
    public const BASE_CLASS = 'ri';

    protected const STYLE_LINE = 'line';
    protected const STYLE_FILL = 'fill';

    protected const SIZE_FW = 'fw';
    protected const SIZE_XXS = 'xxs';
    protected const SIZE_XS = 'xs';
    protected const SIZE_SM = 'sm';
    protected const SIZE_LG = 'lg';
    protected const SIZE_XL = 'xl';
    protected const SIZE_1X = '1x';
    protected const SIZE_2X = '2x';
    protected const SIZE_3X = '3x';
    protected const SIZE_4X = '4x';
    protected const SIZE_5X = '5x';
    protected const SIZE_6X = '6x';
    protected const SIZE_7X = '7x';
    protected const SIZE_8X = '8x';
    protected const SIZE_9X = '9x';
    protected const SIZE_10X = '10x';
    protected string $name;
    protected string $style;
    protected ?string $content = null;
    protected ?string $size = null;

    protected array $addClasses = [];

    public static function i(string $icon, ?string $content = null, ?string $size = null): static
    {
        return (new static())
            ->name($icon)
            ->content($content)
            ->size($size);
    }

    protected function name(string $icon): static
    {
        $this->name = $icon;

        return $this;
    }

    protected function content(?string $content = null): static
    {
        $this->content = $content;

        return $this;
    }

    protected function size(?string $size = null): static
    {
        $this->size = match ($size) {
            self::SIZE_FW => self::SIZE_FW,
            self::SIZE_XXS => self::SIZE_XXS,
            self::SIZE_XS => self::SIZE_XS,
            self::SIZE_SM => self::SIZE_SM,
            self::SIZE_LG => self::SIZE_LG,
            self::SIZE_XL => self::SIZE_XL,
            self::SIZE_1X => self::SIZE_1X,
            self::SIZE_2X => self::SIZE_2X,
            self::SIZE_3X => self::SIZE_3X,
            self::SIZE_4X => self::SIZE_4X,
            self::SIZE_5X => self::SIZE_5X,
            self::SIZE_6X => self::SIZE_6X,
            self::SIZE_7X => self::SIZE_7X,
            self::SIZE_8X => self::SIZE_8X,
            self::SIZE_9X => self::SIZE_9X,
            self::SIZE_10X => self::SIZE_10X,
            default => null,
        };

        return $this;
    }

    public function addClass(string $class): static
    {
        $this->addClasses[] = $class;

        return $this;
    }

    public function __toString(): string
    {
        $size = null;
        if ($this->size) {
            $size = implode('-', [
                self::BASE_CLASS,
                $this->size,
            ]);
        }

        $class = implode('-', [
            self::BASE_CLASS,
            $this->name,
            $this->style,
        ]);

        $addClasses = array_filter(array_unique($this->addClasses));

        return Html::tag('i', $this->content ?? '', [
            'class' => [
                $class,
                $size,
                $addClasses,
            ],
        ]);
    }
}