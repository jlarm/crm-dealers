<x-layouts.app :title="__('CRM')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div
            class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 p-5 dark:border-neutral-700"
        >
            <livewire:dealership.index />
        </div>
    </div>
</x-layouts.app>
