{{--
space-y-5: establece un espacio vertical entre los elementos secundarios del div. En este caso, crea un espacio vertical de 1.25 rem (aproximadamente 20 píxeles) 

La directiva wire:submit.prevent se utiliza en Livewire para interceptar el envío de un formulario y prevenir el comportamiento predeterminado de recargar la página al enviar el formulario. En lugar de recargar la página, esta directiva activa el método crearVacante en el componente de Livewire asociado al formulario.
--}}

<form class="md:w-1/2 space-y-5" wire:submit.prevent='crearVacante'>
    <div>
        <x-input-label for="titulo" :value="__('Título de la vacante')" />

        {{-- la directiva "wire:model" establece la comunicación bidireccional entre los campos del formulario y los componentes de Livewire. Esto permite que cualquier cambio en los campos del formulario se refleje automáticamente en el componente de Livewire, y viceversa, sin necesidad de escribir código JavaScript adicional para manejar la comunicación entre el front-end y el back-end. --}}
        <x-text-input
            id="titulo"
            class="block mt-1 w-full"
            type="text"
            wire:model="titulo" 
            :value="old('titulo')"
            placeholder="Título de la vacante"
        />

        @error('titulo')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="salario" :value="__('Salario mensual')" />

        <select
            wire:model="salario"
            id="salario"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
        >
            <option value="" disabled selected> -- Seleccione -- </option>
                @foreach ($salarios as $salario)
                    <option value="{{ $salario->id }}">{{ $salario->salario }}</option>
                @endforeach
        </select>

        @error('salario')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="categoria" :value="__('Categoría')" />

        <select
            wire:model="categoria"
            id="categoria"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
        >
            <option value="" disabled selected> -- Seleccione -- </option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                @endforeach
        </select>

        @error('categoria')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />

        <x-text-input
            id="empresa"
            class="block mt-1 w-full"
            type="text"
            wire:model="empresa"
            :value="old('empresa')"
            placeholder="Nombre de la empresa"
        />

        @error('empresa')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="ultimo_dia" :value="__('Última día para postularse')" />

        {{-- "min" especifica la fecha mínima que se puede seleccionar.
        "max" especifica la fecha máxima que se puede seleccionar. --}}
        <x-text-input
            id="ultimo_dia"
            class="block mt-1 w-full"
            type="date"
            min="2024-04-01"
            max="2024-12-31"
            wire:model="ultimo_dia"
            :value="old('ultimo_dia')"
        />

        @error('ultimo_dia')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="descripcion" :value="__('Descripción del cargo')" />

        <textarea
            id="descripcion"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full h-52"
            wire:model="descripcion"
            placeholder="Definir las funciones y responsabilidades del puesto de trabajo según la estructura organizacional"
        ></textarea> {{-- es necesario dejar las etiquetas sin espacio --}}

        @error('descripcion')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="imagen" :value="__('Imagen')" />

        <x-text-input
            id="imagen"
            class="block mt-1 w-full"
            type="file"
            accept="image/*" {{-- es una característica estándar de HTML5 y se utiliza para especificar que solo se pueden seleccionar archivos de tipo JPEG, PNG, al abrir el selector de archivos. --}}
            wire:model="imagen"
        />

        @error('imagen')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <x-primary-button class="w-full justify-center">
        {{ __('Crear vacante') }}
    </x-primary-button>
</form>
