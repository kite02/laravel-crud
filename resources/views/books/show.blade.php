<x-app-layout>

    <x-slot name="header">
        <div class="flex flex-auto">
            <button
                action="action"
                onclick="window.history.go(-1); return false;"
                type="submit"
                value="Cancel"
            > <<<</button>
        <h2 class="font-semibold text-xl ml-10 text-gray-800 leading-tight">
            {{ __('Book Info') }}
        </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="flex flex-auto">
        <img class="w-96 h-96" src="{{asset('storage/'.$book->thumbnail)}}">

        <div class="flex flex-col px-10">
            <h1>{{$book->title}}</h1>
            <p class="text-gray-700 text-base">
                {{$book->description}}
            </p>
        </div>
        </div>

    </div>
</x-app-layout>
