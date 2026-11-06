@extends('layouts.public')

@section('title', 'About')

@section('content')
    <article class="mx-auto max-w-3xl rounded-xl border bg-white p-8 shadow-sm">
        <p class="text-sm font-semibold uppercase tracking-widest text-indigo-600">About</p>
        <h1 class="mt-2 text-3xl font-bold">A simple Laravel POS application</h1>
        <p class="mt-5 leading-7 text-slate-600">
            This application demonstrates Laravel's MVC architecture with routes, resource controllers,
            Blade views, database-backed customer and user accounts, and Breeze authentication.
        </p>
        <a href="{{ route('home') }}" class="mt-6 inline-block font-semibold text-indigo-700 hover:text-indigo-900">Back to home</a>
    </article>
@endsection
