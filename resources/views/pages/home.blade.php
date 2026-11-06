@extends('layouts.public')

@section('title', 'Home')

@section('content')
    <section class="rounded-2xl bg-indigo-700 px-8 py-16 text-white sm:px-12">
        <p class="mb-3 text-sm font-semibold uppercase tracking-widest text-indigo-200">Point of Sale</p>
        <h1 class="max-w-3xl text-4xl font-bold tracking-tight sm:text-5xl">Welcome to your POS application</h1>
        <p class="mt-5 max-w-2xl text-lg text-indigo-100">Manage customer accounts and user accounts from one simple place.</p>
        <div class="mt-8 flex flex-wrap gap-3">
            @auth
                <a href="{{ route('customers.index') }}" class="rounded-md bg-white px-5 py-3 font-semibold text-indigo-700 hover:bg-indigo-50">Manage customers</a>
                <a href="{{ route('users.index') }}" class="rounded-md border border-indigo-300 px-5 py-3 font-semibold text-white hover:bg-indigo-600">Manage users</a>
            @else
                <a href="{{ route('register') }}" class="rounded-md bg-white px-5 py-3 font-semibold text-indigo-700 hover:bg-indigo-50">Create an account</a>
                <a href="{{ route('login') }}" class="rounded-md border border-indigo-300 px-5 py-3 font-semibold text-white hover:bg-indigo-600">Log in</a>
            @endauth
        </div>
    </section>

    <section class="mt-10 grid gap-6 md:grid-cols-2">
        <a href="{{ route('about') }}" class="rounded-xl border bg-white p-6 shadow-sm hover:border-indigo-300">
            <h2 class="text-xl font-semibold">About this project</h2>
            <p class="mt-2 text-slate-600">Learn about the application and its Laravel features.</p>
        </a>
        <div class="rounded-xl border bg-white p-6 shadow-sm">
            <h2 class="text-xl font-semibold">Account management</h2>
            <p class="mt-2 text-slate-600">Customer and user records are available after you sign in.</p>
        </div>
    </section>
@endsection
