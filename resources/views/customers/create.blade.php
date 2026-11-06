<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Customer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 max-w-2xl mx-auto border border-gray-100">
                
                <!-- Validation Errors -->
                @if ($errors->any())
                    <div class="mb-4 bg-rose-50 border-l-4 border-rose-400 p-4 text-rose-700 rounded-r-lg text-sm">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('customers.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Full Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" required 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border p-2.5">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email Address</label>
                        <input type="email" name="email" value="{{ old('email') }}" required 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border p-2.5">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Phone Number</label>
                        <input type="text" name="phone" value="{{ old('phone') }}" required 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border p-2.5">
                    </div>

                    <div class="flex justify-end space-x-3">
                        <a href="{{ route('customers.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-md text-sm font-medium transition">
                            Cancel
                        </a>
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md text-sm font-medium transition">
                            Save Customer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>