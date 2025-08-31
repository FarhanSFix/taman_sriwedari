<x-filament-panels::page>
    <form wire:submit="save">
        {{ $this->form }}

        <div class="mt-4">
            {{ $this->getFormActions() }}
        </div>
    </form>

    <x-filament-actions::modals />
</x-filament-panels::page>
