<x-layout>
    <div class="h-full flex justify-center items-center">
        <div class="w-[33vw] bg-gray-200 rounded px-6 py-6 shadow flex flex-col gap-4">
            <form class="grid grid-cols-2 gap-2" method="POST" action="{{ route('user.update', $user) }}"  enctype="multipart/form-data" >
                @csrf
                @method("PUT")
            
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
        
                <div class="pb-6 col-span-2 flex flex-col items-center gap-2">
                    <label for="image">Foto de perfil:</label>
                    <img id="img-tag" class="h-28 w-28 rounded-full cursor-pointer" src="/{{$user->img}}" alt="">
                    <input hidden type="file" name="image" id="image" class="form-control">
                </div>
                
                <div class="flex flex-col gap-2">
                    <label for="name">Name:</label>
                    <input value="{{$user->name}}" type="text" name="name" id="name" class="border border-1 border-gray-200 rounded" required>
                </div>
            
                <div class="flex flex-col gap-2">
                    <label for="lastname">Last Name:</label>
                    <input value="{{$user->lastname}}" type="text" name="lastname" id="lastname" class="border border-1 border-gray-200 rounded" required>
                </div>
            
                <div class="col-span-2">
                    <label for="email">Email:</label>
                    <input class="w-full border border-1 border-gray-200 rounded" value="{{$user->email}}" type="email" name="email" id="email" required>
                </div>
                <div class="col-span-2 flex justify-end">
                    <button class="border border-1 rounded border-gray-500 px-2 py-1" type="submit" class="btn btn-primary">Editar</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
