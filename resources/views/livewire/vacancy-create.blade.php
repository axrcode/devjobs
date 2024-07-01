<form action="" class="md:w-1/2 space-y-5" wire:submit.prevent='saveVacancy'>

    <!-- Titulo -->
    <div>
        <x-input-label for="title" :value="__('Titulo Vacante')" />

        <x-text-input
            type="text"
            id="title"
            wire:model="title"
            class="block mt-1 w-full {{ $errors->get('title') ? 'border-red-600' : '' }}"
            :value="old('title')"
            placeholder="Titulo Vacante: Ej. Frontend Developer, PHP Developer"
        />

        <x-input-error :messages="$errors->get('title')" class="mt-2" />
    </div>

    <!-- Salario Mensual -->
    <div>
        <x-input-label for="salary" :value="__('Salario Mensual')" />

        <select
            id="salary"
            wire:model="salary"
            class="block mt-1 w-full border-gray-300 focus:border-indigo-500 rounded-md shadow-sm {{ $errors->get('salary') ? 'border-red-600' : '' }}"
        >
            <option value="">Seleccionar salario</option>
            @foreach ($salaries as $salary)
            <option value="{{ $salary->id }}">{{ $salary->amount }}</option>
            @endforeach
        </select>

        <x-input-error :messages="$errors->get('salary')" class="mt-2" />
    </div>

    <!-- Categoria -->
    <div>
        <x-input-label for="category" :value="__('Categoria')" />

        <select
            id="category"
            wire:model="category"
            class="block mt-1 w-full border-gray-300 focus:border-indigo-500 rounded-md shadow-sm {{ $errors->get('category') ? 'border-red-600' : '' }}"
        >
            <option value="">Seleccionar categoria</option>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        <x-input-error :messages="$errors->get('category')" class="mt-2" />
    </div>

    <!-- Empresa -->
    <div>
        <x-input-label for="company" :value="__('Empresa')" />

        <x-text-input
            type="text"
            id="company"
            wire:model="company"
            class="block mt-1 w-full {{ $errors->get('company') ? 'border-red-600' : '' }}"
            :value="old('company')"
            placeholder="Empresa: Ej. Netflix, Google, Apple, Microsoft"
        />

        <x-input-error :messages="$errors->get('company')" class="mt-2" />
    </div>

    <!-- Ultimo día postulación -->
    <div>
        <x-input-label for="last_date" :value="__('Último día para postularse')" />

        <x-text-input
            type="date"
            id="last_date"
            wire:model="last_date"
            class="block mt-1 w-full {{ $errors->get('last_date') ? 'border-red-600' : '' }}"
            :value="old('last_date')"
        />

        <x-input-error :messages="$errors->get('last_date')" class="mt-2" />
    </div>

    <!-- Descripción -->
    <div>
        <x-input-label for="description" :value="__('Descripción')" />

        <textarea
            id="description"
            wire:model="description"
            class="block mt-1 w-full border-gray-300 focus:border-indigo-500 rounded-md shadow-sm resize-none {{ $errors->get('category') ? 'border-red-600' : '' }}"
            placeholder="Descripción general del puesto, experciencia, requisitos"
            rows="8"
        >{{ old('description') }}</textarea>

        <x-input-error :messages="$errors->get('description')" class="mt-2" />
    </div>

    <!-- Empresa -->
    <div>
        <x-input-label for="image" :value="__('Imagen')" />

        <x-text-input
            type="file"
            id="image"
            wire:model="image"
            class="block mt-1 w-full {{ $errors->get('image') ? 'border-red-600' : '' }}"
            accept="image/*"
        />

        <x-input-error :messages="$errors->get('image')" class="mt-2" />

        @if ($image)
        <div class="my-5 w-80">
            <x-input-label for="image" :value="__('Vista Previa:')" />

            <img src="{{ $image->temporaryUrl() }}">
        </div>
        @endif
    </div>

    <x-primary-button>
        Crear vacante
    </x-primary-button>

</form>
