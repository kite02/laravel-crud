<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Books') }}
        </h2>
        <br>

        <form x-data="{show:false}">
            <x-primary-button @click="show = !show">
                Create New Book
            </x-primary-button>
        </form>


    </x-slot>

    <div class="py-12">
        <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-5">
            @foreach($books as $book)
                <div class="max-w-sm rounded overflow-hidden shadow-lg">
                    <a href="books/{{$book->slug}}">
                        <img class="w-full" src="{{asset('storage/'.$book->thumbnail)}}" alt="{{$book->title}}">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">{{$book->title}}</div>
                            <p class="text-gray-700 text-base">
                                {{$book->description}}
                            </p>
                        </div>
                    </a>
                    <div class="px-6 pt-4 pb-2">
                    <span
                        class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
                        <span
                            class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
                        <span
                            class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
                    </div>
                </div>
            @endforeach
        </div>
        <x-modal name="modal" id="modal" show="show" maxWidth="sm">

            <form method="POST" action="books/create" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-auto gap-4 flex-col">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        Create a New Book</h2>
                    <x-input-label for="title">
                        Title
                        <x-text-input class="w-full" name="title" id="title"/>
                    </x-input-label>
                    <x-input-label for="author">
                        Author:
                        <x-text-input class="w-full" name="author" id="author"/>
                    </x-input-label>
                    <x-input-label for="description">
                        Description:
                        <x-text-input class="w-full" name="description" id="description"/>
                    </x-input-label>
                    <x-input-label for="thumbnail">
                        Thumbnail
                        <x-text-input class="w-full" type="file" name="thumbnail" id="thumbnail"/>
                    </x-input-label>
                    <x-primary-button class="w-auto mx-auto">Submit</x-primary-button>
                </div>
            </form>
        </x-modal>
    </div>

</x-app-layout>
