<div x-data="{ modelOpen: @entangle('show').live }">
    <div x-show="modelOpen" class="fixed md:top-5 inset-0 z-50 overflow-y-auto overflow-x-hidden"
        aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex flex-col items-center justify-center min-h-screen px-4 text-center sm:p-0">
            <div x-cloak x-show="modelOpen" wire:click='close()'
                x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                class="fixed flex justify-center w-screen min-h-screen overflow-y-auto top-0 right-0 left-0 transition-opacity bg-gray-500 bg-opacity-40"
                aria-hidden="true"></div>

            <div x-cloak x-show="modelOpen" x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                class="w-full md:w-auto p-8 text-left transition-all bg-white md:rounded-lg shadow-xl z-40">
                <div class="flex justify-center items-center rounded-t border-b">
                    @if ($show)
                        @livewire($component, $params)
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
