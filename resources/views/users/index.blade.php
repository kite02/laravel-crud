<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            List of Users
        </h2>
        <br>
        <form method="GET" action="/users/create">
            <x-primary-button>Create New User</x-primary-button>
        </form>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table-auto">
                        <thead class="border-collapse border border-slate-400">
                        <tr>
                            <th class="border border-slate-300">Name</th>
                            <th class="border border-slate-300">Email</th>
                            <th class="border border-slate-300">Password</th>
                            <th class="border border-slate-300">Delete?</th>
                            <th class="border border-slate-300">Edit?</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td class="border border-slate-300">{{$user->name}}</td>
                                <td class="border border-slate-300">{{$user->email}}</td>
                                <td class="border border-slate-300">{{$user->password}}</td>
                                <td class="border border-slate-300">
                                    <form method="POST" action="users/{{$user->id}}">
                                        @csrf
                                        @method("DELETE")
                                        <x-danger-button>Delete</x-danger-button>
                                    </form>
                                </td>
                                <td class="border border-slate-300">
                                    <form method="GET" action="users/{{$user->id}}/edit">
                                        @csrf

                                        <x-primary-button>Edit</x-primary-button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
