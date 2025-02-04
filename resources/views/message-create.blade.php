@extends('layouts.app')

@section('content')

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Success Alert -->
                    @if(session()->has('success'))
                        <div
                            class="mb-4 flex items-center bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg w-full max-w-md"
                            role="alert">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v4a1 1 0 102 0V7zm-1 6a1.5 1.5 0 100 3 1.5 1.5 0 000-3z"
                                      clip-rule="evenodd"></path>
                            </svg>
                            <span>{{ session()->get('success') }}</span>
                        </div>
                    @endif

                    {{ __("Message form") }}
                    <div class="overflow-x-auto">
                        <!-- Form -->
                        <form action="{{ route('create.message') }}" method="POST">
                            @method('post')
                            @csrf
                            <!-- Title Input -->
                            <div class="mb-2">
                                <label for="title" class="block text-gray-700 font-medium mb-2">Title</label>
                                <input
                                    type="text"
                                    id="title"
                                    name="title"
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    placeholder="Enter a title"
                                    required>
                            </div>

                            <!-- Message Input -->
                            <div class="mb-2">
                                <label for="message" class="block text-gray-700 font-medium mb-2">Message</label>
                                <textarea
                                    id="message"
                                    name="message"
                                    rows="4"
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    placeholder="Enter your message"
                                    required></textarea>
                            </div>


                            <button
                                type="submit"
                                class="w-full bg-black text-white py-3 rounded-lg font-medium hover:bg-blue-600 transition">
                                Submit
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
