@extends('layouts.layout')

@section('title', 'All Articles')

@section('content')
<table id="data-table" class="min-w-full leading-normal">

    <thead>

        <tr>

            <th
                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">

                #</th>

            <th
                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">

                Name</th>

            <th
                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">

                Email</th>

            <th
                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">

                Action</th>

        </tr>

    </thead>

    <tbody>

        @forelse ($users as $user)
            <tr>

                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $user->id }}</td>

                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $user->name }}</td>

                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $user->email }}</td>

                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm flex">

                    <a href="#" class="text-green-600 hover:text-green-900">View</a>

                    <a href="#"
                        class="ml-3 text-blue-600 hover:text-blue-900">Edit</a>

                    <form method="POST" action="{{ route('users.destroy', $user->id) }}"
                        onsubmit="return confirm('Are you sure?');" class="ml-3">

                        @csrf

                        @method('DELETE')

                        <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="4" class="px-5 py-5 text-center">No users found.</td>

            </tr>
        @endforelse

    </tbody>

</table>

@endsection
