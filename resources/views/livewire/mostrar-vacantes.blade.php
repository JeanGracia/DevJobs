<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

        {{-- @forelse se utiliza para recorrer la colección de $vacantes que se obtuvo a través de la consulta en el componente de Livewire. Si la colección no tiene elementos, se mostrará el bloque de código dentro de @empty --}}

        @forelse ($vacantes as $vacante)
            <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
                <div class="space-y-3">
                    <a href="#" class="text-xl font-bold">
                        {{ $vacante->titulo }}
                    </a>
                    <p class="text-sm text-gray-600 font-bold"> {{ $vacante->empresa }} </p>
                    <p>Últimmo día para postular: {{ $vacante->ultimo_dia->format('d/m/Y') }}</p> {{-- format('d/m/Y'): mostrar fecha con el formato de día/mes/año. --}}
                </div>

                <div class="flex flex-col md:flex-row items-strech gap-3 mt-5 md:mt-0">
                    <a
                        href="#"
                        class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center"
                    >
                        Candidatos
                    </a>

                    <a
                        href="#"
                        class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center"
                    >
                        Editar
                    </a>

                    <a
                        href="#"
                        class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center"
                    >
                        Eliminar
                    </a>
                </div>
            </div>
        @empty
            <p class="p-3 text-center text-sm text-gray-600"> No hay vancastes disponibles </p>
        @endforelse
    </div>

    <div class="mt-10">
        {{ $vacantes->links() }}
    </div>
</div>