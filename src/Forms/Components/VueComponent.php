<?php

namespace OnClick\FilamentOnClick\Forms\Components;

use Closure;
use Filament\Forms\Components\Field;

class VueComponent extends Field
{
    protected string $view = 'filament-onclick::forms.components.vue-component';

    protected string $componentName = '';
    protected array | Closure $options = [];

    public function componentName(string $componentName): static
    {
        $this->componentName = $componentName;

        return $this;
    }

    public function getComponentName(): string
    {
        return $this->componentName;
    }
    
    public function options(array | Closure $options): static
    {
        $this->options = $options;

        return $this;
    }

    public function getOptions(): array
    {
        return $this->evaluate($this->options);
    }
}
