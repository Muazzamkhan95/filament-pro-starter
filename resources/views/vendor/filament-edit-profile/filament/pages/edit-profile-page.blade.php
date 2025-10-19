<x-filament-panels::page>
    @foreach ($this->getRegisteredCustomProfileComponents() as $component)
        @unless(is_null($component))
            @livewire($component)
        @endunless
    @endforeach

    @livewire(\Stephenjude\FilamentTwoFactorAuthentication\Livewire\TwoFactorAuthentication::class)

    @livewire(\Stephenjude\FilamentTwoFactorAuthentication\Livewire\PasskeyAuthentication::class)
</x-filament-panels::page>

