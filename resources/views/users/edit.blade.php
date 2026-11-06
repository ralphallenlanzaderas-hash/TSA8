<x-app-layout>
    <x-slot name="header"><h2 class="text-xl font-semibold leading-tight text-gray-800">{{ __('Edit User Account') }}</h2></x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
            <form action="{{ route('users.update', $user) }}" method="POST" class="space-y-5 rounded-lg bg-white p-6 shadow-sm">
                @csrf
                @method('PUT')
                @include('users.partials.form', ['submitLabel' => 'Save Changes'])
            </form>
        </div>
    </div>
</x-app-layout>
