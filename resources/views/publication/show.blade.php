<x-layout>
    <div class="flex justify-center gap-32 py-8">
        <div class="flex flex-col gap-2 bg-gray-200 px-8 py-4 rounded">
            <div class="flex items-center justify-between">
                @if ($publication->autor)
                    <div class="flex gap-2 items-center">
                        <img class="h-8 w-8 rounded-full" src="/{{$publication->autor->img}}" alt="">
                        <p>{{$publication->autor->name}}</p>
                    </div>
                @endif
                <div class="flex gap-2  items-center">
                    @if (session("user"))
                        @if(session("user") && session("user")->rol === "admin" || $publication->autor ===session("user")->id)
                            <a href="{{route('publication.edit', $publication)}}">
                                <x-iconoir-edit-pencil />
                            </a>
                        
                        <form class="flex items-center" action="{{route("publication.destroy", $publication)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button>
                                <x-iconoir-trash />
                            </button>
                        </form>
                        @endif
                    @endif
                </div>
            </div>
            <img src="/{{$publication->image}}" alt="" class="rounded">
            <p>{{$publication->title}}</p>
            <p>{{$publication->content}}</p>
        </div>
        <div class="w-[25vw] bg-gray-200 p-3 flex flex-col rounded justify-between">
            <div class="flex flex-col gap-2">
                @foreach ($publication->comments as $comment)
                    <div class="flex bg-gray-300 rounded items-center px-2 py-1 gap-4">
                        <div class="flex gap-2">
                            <img src="/{{$comment->autor->img}}" alt="" class="h-8 w-8 rounded-full">
                        </div>
                        <div class="w-full"> 
                            <div class="flex justify-between">
                                <p>{{$comment->autor->name}} {{$comment->autor->lastname}}</p>    
                                <form action="{{route("comment.destroy", $comment)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button>
                                        <x-iconoir-trash />
                                    </button>
                                </form>
                            </div>
                            {{$comment->content}}
                        </div>
                    </div>
                @endforeach
            </div>
            <form class="w-full border-t border-1 border-gray-300"  method="POST" action="{{ route('comment.store') }}">
            @csrf
                <input name="publication_id" type="text" hidden value="{{$publication->id}}">
                <input class=" w-[80%] bg-gray-200 border rounded border-1 border-gray-200" name="content" type="text">
                <button type="submit"  class="">Publicar</button>
            </form>
        </div>
    </div>
</x-layout>