<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" novalidate>
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />

            <x-text-input   id="email"
                            class="block mt-1 w-full {{ $errors->get('email') ? 'border-red-600' : '' }}"
                            type="email"
                            name="email"
                            autocomplete="username"
                            :value="old('email')"
                            required
                            autofocus
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
                            autocomplete="current-password"
                            required
            />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Recordarme') }}</span>
            </label>
        </div>

        <x-primary-button class="w-full justify-center my-5">
            {{ __('Login') }}
        </x-primary-button>

        <div class="flex justify-between">
            <x-link :href="route('register')">
                Registrarse
            </x-link>

            <x-link :href="route('password.request')">
                Olvidate tu password
            </x-link>
        </div>
    </form>
</x-guest-layout>
