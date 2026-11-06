<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">{{ __('User Accounts') }}</h2>
            <a href="{{ route('users.create') }}" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700">+ Add User</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="mb-4 rounded-md bg-emerald-50 p-4 text-emerald-700">{{ session('status') }}</div>
            @endif
            <div class="overflow-hidden bg-white p-6 shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Email</th>
                                <th class="px-6 py-3 text-right text-xs font-medium uppercase text-gray-500">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @forelse ($users as $user)
                                <tr>
                                    <td class="whitespace-nowrap px-6 py-4 text-sm">{{ $user->id }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 text-sm font-medium">{{ $user->name }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-600">{{ $user->email }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 text-right text-sm">
                                        <a href="{{ route('users.show', $user) }}" class="mr-3 text-indigo-600 hover:text-indigo-900">View</a>
                                        <a href="{{ route('users.edit', $user) }}" class="mr-3 text-indigo-600 hover:text-indigo-900">Edit</a>
                                        <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-rose-600 hover:text-rose-900" onclick="return confirm('Delete this user account?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="4" class="px-6 py-8 text-center text-sm text-gray-500">No user accounts found.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">{{ $users->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>
