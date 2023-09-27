<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" novalidate>
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombre')" />

            <x-text-input   id="name"
                            class="block mt-1 w-full {{ $errors->get('name') ? 'border-red-600' : '' }}"
                            type="text"
                            name="name"
                            autocomplete="name"
                            :value="old('name')"
                            required
                            autofocus
            />

            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />

            <x-text-input   id="email"
                            class="block mt-1 w-full {{ $errors->get('email') ? 'border-red-600' : '' }}"
                            type="email"
                            name="email"
                            autocomplete="username"
                            :value="old('email')"
                            required
            />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input   id="password" 
                            class="block mt-1 w-full {{ $errors->get('password') ? 'border-red-600' : '' }}"
                            type="password"
                            name="password"
                            autocomplete="new-password"
                            required
            />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar Password')" />

            <x-text-input   id="password_confirmation"
                            class="block mt-1 w-full {{ $errors->get('password_confirmation') ? 'border-red-600' : '' }}"
                            type="password"
                            name="password_confirmation"
                            autocomplete="new-password"
                            required
            />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <x-primary-button class="w-full justify-center my-5">
            {{ __('Registrarse') }}
        </x-primary-button>

        <div class="flex justify-between">
            <x-link :href="route('login')">
                Iniciar Sesión
            </x-link>

            <x-link :href="route('password.request')">
                Olvidate tu password
            </x-link>
        </div>
    </form>
</x-guest-layout>
