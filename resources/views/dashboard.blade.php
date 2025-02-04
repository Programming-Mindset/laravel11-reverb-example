@extends('layouts.app')

@section('content')

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white rounded-lg shadow">
                            <thead class="bg-blue-600 text-white">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-medium">#</th>
                                <th class="px-6 py-3 text-left text-sm font-medium">Title</th>
                                <th class="px-6 py-3 text-left text-sm font-medium">Message</th>
                                <th class="px-6 py-3 text-left text-sm font-medium">Action</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                            @foreach($messages as $message)


                            <tr>
                                <td class="px-6 py-4">{{ $message->id }}</td>
                                <td class="px-6 py-4">{{ $message->title }}</td>
                                <td class="px-6 py-4">{{ $message->message }}</td>
                                <td class="px-6 py-4">
                                    <a href="">{{ $message->created_at->format('d-m-Y') }}</a>
                                </td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
