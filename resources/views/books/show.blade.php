<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Book Info') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex flex-auto">
        <img class="w-full h-96" src="{{asset('storage/thumbnails/kingavatar.jpg')}}">

        <div class="flex flex-col px-10">
            <h1>The King's Avatar</h1>
            <p class="text-gray-700 text-base">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et
                perferendis eaque, exercitationem praesentium nihil.
            </p>
        </div>
        </div>

    </div>
</x-app-layout>
