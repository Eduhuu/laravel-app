<x-layout>
<div class="h-full flex justify-center items-center">
    <div class=" bg-gray-200 rounded px-6 py-4 shadow">
        <h1>Crear Publicacion</h1>
        <form class="flex flex-col gap-2" method="POST" action="{{ route('publication.store') }}"  enctype="multipart/form-data">
            @csrf
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
                    <img id="img-tag" src="" class="h-[20vh] w-[25vw] cursor-pointer rounded border border-1 border-gray-300">
                    <input hidden type="file" name="image" id="image" class="form-control">
                </div>
                
                <div class="flex flex-col gap-1">
                    <label for="title">Titulo:</label>
                    <input class="bourder border-1 border-gray-300 rounded" placeholder="Titulo" type="text" name="title" id="title" class="form-control" required>
                </div>

                <div class="flex flex-col gap-1">
                    <label for="content">Contenido:</label>
                    <textarea class="bourder border-1 border-gray-300 rounded" placeholder="Contenido" name="content" id="content" class="form-control" required></textarea>
                </div>

                <button class="self-end border border-1 rounded border-gray-500 px-2 py-1" type="submit">Crear</button>
            </form>
    </div>
</div>
</x-layout>
