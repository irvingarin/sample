<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Classes') }}
        </h2>
    </x-slot>

    <div class="py-12 flex flex-col sm:justify-center items-center">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            @if ($errors->any())
                <div class="font-medium text-red-600">
                    {{ __('Whoops! Something went wrong.') }}
                </div>

                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form method="POST" action="{{ route('classes.enroll') }}">
                @csrf
                <div class="mt-4">
                    <x-label for="class_code" :value="__('Class Code')" />
        
                    <x-input id="class_code" class="block mt-1 w-full" type="text" name="class_code" :value="old('class_code')" required />
                </div>
                <div class="flex items-center justify-end mt-4">

                    <x-button class="ml-4">
                        {{ __('Enroll') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>