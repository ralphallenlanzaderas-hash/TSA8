<x-app-layout>
    <x-slot name="header"><h2 class="text-xl font-semibold leading-tight text-gray-800">{{ __('User Account') }}</h2></x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
            <div class="space-y-4 rounded-lg bg-white p-6 shadow-sm">
                <p><span class="font-semibold">Name:</span> {{ $user->name }}</p>
                <p><span class="font-semibold">Email:</span> {{ $user->email }}</p>
                <p><span class="font-semibold">Created:</span> {{ $user->created_at->format('M j, Y') }}</p>
                <a href="{{ route('users.index') }}" class="inline-block font-medium text-indigo-600 hover:text-indigo-900">Back to user accounts</a>
            </div>
        </div>
    </div>
</x-app-layout>
