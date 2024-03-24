<x-layout> 
<div class="h-full flex justify-center items-center">
    <div class=" bg-gray-200 rounded px-6 py-4 shadow gap-4 flex flex-col"> 
        <div class="col-span-2 flex items-center gap-4">
            <a href="/login">
                <x-iconoir-arrow-left/>
            </a>
            <h1 class="text-xl">Recuperar contrasena</h1>
        </div>
        <div>
            <p>Ingrese su correo electronico. Si este corresponde </p>
            <p>con alguno registrado, se le enviara un correo para</p> 
            <p>que pueda restarurar su contraseña.</p>
        </div>
        <form method="POST" action="{{ route('forgotpassword.send') }}" class="flex flex-col gap-2">
            @csrf
            <div class="flex flex-col gap-1">
                <label for="email" class="col-md-4 col-form-label text-md-right">Correo electronico</label>
                <input id="email" type="email" class="bourder border-1 border-gray-300 rounded" name="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror                
            </div>
            <button type="submit" class="border border-1 rounded border-gray-500 px-2 py-1">
                Confirmar
            </button>
        </form>
    </div>
</div>

</x-layout>