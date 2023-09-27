<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('¿Olvidaste tu contraseña?. Coloca tu email de registro y te enviaremos un enlace para que puedas crea uno nuevo.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" novalidate>
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />

            <x-text-input   id="email"
                            class="block mt-1 w-full {{ $errors->get('email') ? 'border-red-600' : '' }}"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required
                            autofocus
            />
            
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <x-primary-button class="w-full justify-center my-5">
            {{ __('Enviar Email') }}
        </x-primary-button>

        <div class="flex justify-between">
            <x-link :href="route('login')">
                Iniciar Sesión
            </x-link>

            <x-link :href="route('register')">
                Registrarse
            </x-link>
        </div>
    </form>
</x-guest-layout>
