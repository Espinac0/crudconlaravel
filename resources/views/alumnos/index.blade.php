<x-layouts.layout>
    <div class="max-h-full overflow-x-auto">
        <!-- Botón para añadir un nuevo alumno -->
        <div class="mb-4">
            <a href="{{ route('alumnos.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
                Añadir Alumno
            </a>
        </div>

        <table class="table table-xs table-pin-rows table-pin-cols">
            <thead>
            <tr>
                @foreach($campos as $campo)
                    <th>{{ ucfirst($campo) }}</th>
                @endforeach
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($filas as $fila)
                <tr>
                    @foreach($campos as $campo)
                        <td>{{ $fila->$campo }}</td>
                    @endforeach
                    <td>
                        <form id="formulario{{$fila->id}}" action="{{ route('alumnos.destroy', $fila->id) }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="button" onclick="confirmDelete({{$fila->id}})">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 hover:bg-red-400 hover:text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-layouts.layout>

<!-- Importar SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function confirmDelete(id) {
        Swal.fire({
            title: "¿Estás seguro?",
            text: "Esta acción es irreversible.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Sí, borrar",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById("formulario" + id).submit();
            }
        });
    }
</script>
