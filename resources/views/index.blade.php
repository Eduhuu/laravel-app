<x-layout>
    <div class="w-full min-h-[95vh] relative py-3">
        @if ($user)
        <a class="absolute left-0 top-0 p-2 flex gap-2" href="{{route("publication.create")}}">
            <p>
                Crear publicacion
            </p>
            <x-iconoir-plus-circle class="text-xs"/>    
        </a>
        @endif
        <div class="flex flex-col items-center gap-2">
            @foreach ($publications as $publication)
                <div>
                    <div class="flex flex-col gap-1">
                        <a href="{{route("user.show", $publication->autor->id)}}">
                            <div class="flex gap-2 items-center">
                                <img class="w-7 h-7 rounded-full" src="/{{$publication->autor->img}}" alt="">
                                <p>{{$publication->autor->name}}</p>
                            </div>
                        </a>
                        <a href="{{route("publication.show", $publication)}}">
                            <div class="flex flex-col gap-2">
                                <p>{{$publication->title}}</p>
                                <img class="rounded w-[33vw]" src="/{{$publication->image}}" alt="">
                                <p>{{$publication->content}}</p>
                            </div>
                        </a>
                    </div>
                    <hr>
                </div>
            @endforeach
        </div>
        <div class="absolute bottom-0 right-0 p-2">
            {{$publications->links()}}
        </div>
    </div>
</x-layout>
