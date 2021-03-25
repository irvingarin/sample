<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Classes') }}
        </h2>
    </x-slot>
    <div class="py-12 flex flex-col sm:justify-center items-center">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <form method="POST" action="{{ route('classes.store') }}">
                @csrf
                <div class="mt-4">
                    <x-label for="class_name" :value="__('Class Name')" />
        
                    <x-input id="class_name" class="block mt-1 w-full" type="text" name="class_name" :value="old('class_name')" required />
                </div>
                <div class="flex items-center justify-end mt-4">

                    <x-button class="ml-4">
                        {{ __('Create') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>