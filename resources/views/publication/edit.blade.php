<x-layout>
    <div class="flex justify-center gap-32 py-8">
        <div class="flex flex-col gap-2 bg-gray-200 px-8 py-4 rounded">
            <div class="flex gap-2">
                <a href="{{route("publication.show",$publication)}}" class="cursor-pointer">
                    <x-iconoir-arrow-left/> 
                </a> 
                <h1>Editar Publicacion</h1>
            </div>
            <form class="flex flex-col gap-2" method="POST" action="{{ route('publication.update', $publication) }}"  enctype="multipart/form-data">
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

                <div class="flex flex-col gap-1">
                    <img id="img-tag" src="/{{$publication->image}}" alt="">
                    <input  class="border rounded border-1 border-gray-300" hidden type="file" name="image" id="image" class="form-control">
                </div>
                
                <div class="flex flex-col gap-1">
                    <label for="title">Titulo:</label>
                    <input class="border rounded border-1 border-gray-300" value="{{$publication->title}}" placeholder="Titulo" type="text" name="title" id="title" class="form-control" required>
                </div>

                <div class="flex flex-col gap-1">
                    <label for="content">Contenido:</label>
                    <textarea  class="border rounded border-1 border-gray-300" placeholder="Contenido" name="content" id="content" class="form-control" required>{{$publication->content}}</textarea>
                </div>
                <button class="self-end border border-1 rounded border-gray-500 px-2 py-1" type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
</x-layout>