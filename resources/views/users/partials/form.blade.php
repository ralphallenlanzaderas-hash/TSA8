@if ($errors->any())
    <div class="rounded-md bg-rose-50 p-4 text-sm text-rose-700">
        <ul class="list-inside list-disc">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div>
    <label for="name" class="block text-sm font-medium text-gray-700">Full name</label>
    <input id="name" name="name" value="{{ old('name', $user->name ?? '') }}" required maxlength="255" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
</div>
<div>
    <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
    <input id="email" type="email" name="email" value="{{ old('email', $user->email ?? '') }}" required maxlength="255" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
</div>
<div>
    <label for="password" class="block text-sm font-medium text-gray-700">
        Password {{ isset($user) ? '(leave blank to keep current password)' : '' }}
    </label>
    <input id="password" type="password" name="password" {{ isset($user) ? '' : 'required' }} autocomplete="new-password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
</div>
<div>
    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm password</label>
    <input id="password_confirmation" type="password" name="password_confirmation" {{ isset($user) ? '' : 'required' }} autocomplete="new-password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
</div>
<div class="flex justify-end gap-3">
    <a href="{{ route('users.index') }}" class="rounded-md bg-gray-200 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-300">Cancel</a>
    <button type="submit" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700">{{ $submitLabel }}</button>
</div>
