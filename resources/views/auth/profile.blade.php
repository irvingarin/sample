<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('profile.store') }}">
            @csrf
            <!-- Email Address -->
                <x-input id="email" class="block mt-1 w-full" type="hidden" name="email" value="{{ Auth::user()->email }}" required />
            <!-- fname -->
            <div class="mt-4">
                <x-label for="fname" :value="__('First Name')" />

                <x-input id="fname" class="block mt-1 w-full" type="text" name="fname" :value="old('fname')" required />
            </div>
            <!-- mname -->
            <div class="mt-4">
                <x-label for="mname" :value="__('Middle Name')" />

                <x-input id="mname" class="block mt-1 w-full" type="text" name="mname" :value="old('mname')" />
            </div>
            <!-- lname -->
            <div class="mt-4">
                <x-label for="lname" :value="__('Last Name')" />

                <x-input id="lname" class="block mt-1 w-full" type="text" name="lname" :value="old('lname')" required />
            </div>
            <!-- dob-->
            <div class="mt-4">
                <x-label for="dob" :value="__('Date of Birth')" />

                <x-input id="dob" class="block mt-1 w-full"
                                type="date"
                                name="dob"
                                max="2005-12-31"
                                required autocomplete />
            </div>


            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-4">
                    {{ __('Submit') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
