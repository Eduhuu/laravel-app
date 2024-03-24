<x-layout>
    <div class="h-full flex justify-center items-center">
        <div class=" bg-gray-200 rounded px-6 py-4 shadow">
            <form class="flex flex-col gap-3" method="POST" action="{{ route('login.store') }}">
                @csrf
                @if ($errors->any())
                <ul class="errors">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
                <h1 class="text-center text-xl">Inicio de sesión</h1>
                <div class="flex flex-col gap-0">
                    <label class="text-sm" for="email">Correo electrónico:</label>
                    <input class="bourder border-1 border-gray-300 rounded" type="email" name="email" id="email" required>
                </div>
                <div class="flex flex-col gap-0">
                    <label class="text-sm" for="password">Contraseña:</label>
                    <input class="bourder border-1 border-gray-300 rounded" type="password" name="password" id="password" required>
                </div>
                <a class="text-sm" href="/user/create">No posee cuenta? Registrate</a>
                <a class="text-sm" href="{{route("forgotpassword.show")}}">Olvido contrasena</a>
                <button class="border border-1 rounded border-gray-500 self-end px-2 py-1" type="submit">Iniciar sesión</button>
            </form>
        </div>
    </div>
</x-layout>