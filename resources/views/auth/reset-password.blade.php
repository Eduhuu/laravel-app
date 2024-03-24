<x-layout> 
    <div class="h-full flex justify-center items-center">
        <div class=" bg-gray-200 rounded px-8 py-6 shadow gap-4 flex flex-col"> 
            <div class="col-span-2 flex items-center gap-4">
                <a href="/login">
                    <x-iconoir-arrow-left/>
                </a>
                <h1 class="text-xl">Restaurar contrasena</h1>
            </div>
            <form class="flex flex-col gap-4" method="POST" action="{{ route('forgotpassword.update') }}">
                @csrf
                @method("PUT")
                <div class="flex flex-col gap-1">
                    <div class="flex flex-col gap-0">
                        <input type="hidden" name="token" value="{{ $token }}">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Correo electronico</label>
                        <input id="email" type="email" class="bourder border-1 border-gray-300 rounded"  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-0">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Contrasena</label>
                        <input id="password" type="password" class="bourder border-1 border-gray-300 rounded"  name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-0">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmar contrasena</label>
                        <input id="password-confirm" type="password" class="bourder border-1 border-gray-300 rounded"  name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>
                <button type="submit" class="border border-1 rounded border-gray-500 px-2 py-1">
                    Restaurar contrasena
                </button>
            </form>
        </div>
    </div>
</x-layout> 