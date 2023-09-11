<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/userprofile.css') }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        {{-- <h1>Donations for {{ auth()->user()->name }}</h1> --}}
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="padding: 20px">NAME</th>
                                    <th style="padding: 20px">description</th>
                                    <th style="padding: 20px">price</th>
                                    <th style="padding: 20px">quantity</th>
                                    {{-- <th style="padding: 20px">image</th> --}}
                                    <!-- Add more columns if needed -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($test as $donation)
                                    <tr>
                                        <td>{{ $donation->donation->name }}</td>
                                        <td>{{ $donation->donation->description }}</td>
                                        <td>{{ $donation->donation->price }}</td>
                                        <td>{{ $donation->quantity }}</td>
                                        {{-- <td>{{ $donation->donation->image }}</td> --}}
                                        <!-- Add more columns if needed -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- starrtt --}}
    <!-- resources/views/user/profile.blade.php -->







    {{-- endd --}}
</x-app-layout>
