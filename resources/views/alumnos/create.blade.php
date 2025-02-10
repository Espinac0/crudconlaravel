<x-layouts.layout>
    <div class="max-w-md mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-6">Añadir Nuevo Alumno</h1>

        <!-- Formulario para añadir un nuevo alumno -->
        <form action="{{ route('alumnos.store') }}" method="POST">
            @csrf <!-- Token de seguridad -->

            <!-- Campo para el nombre -->
            <div class="mb-4">
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
            </div>

            <!-- Campo para el email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
            </div>

            <!-- Campo para la fecha de creación (opcional) -->
            <div class="mb-4">
                <label for="edad" class="block text-sm font-medium text-gray-700">Edad</label>
                <input type="number" name="edad" id="edad" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
            </div>

            <!-- Botón para enviar el formulario -->
            <div class="mt-6">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                    Guardar Alumno
                </button>
            </div>
        </form>
    </div>
</x-layouts.layout>
