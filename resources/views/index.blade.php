@extends('layouts.layout')

@section('title', 'index')

@section('content')
    <h1 class="text-center text-4xl">Welkom bij <b>Levend Monopoly</b></h1>
    <div class="md:grid grid-cols-2 pt-6 text-center gap-x-16">
        <div>
            <h2 class="text-2xl">Wat is <b>Levend Monopoly</b>?</h2>
            <p class="text-lg">
                Levend Monopoly is een in real-life variant van het bordspel monopoly.
                Het spel moet zo goed mogelijk het echte spel na bootsen en zorgen voor
                minimaal een uur aan plezier en strategie, en natuurlijk capitalisme
            </p>
        </div>
        <div class="md:pt-0 pt-6">
            <h2 class="text-2xl">Voor wie is <b>Levend Monopoly</b> gemaakt?</h2>
            <p class="text-lg">
                Levend Monopoly is gemaakt voor de lieve kinderen van Scouting Ruwaard van Putten, maar
                eigenlijk kan/mag iedereen er gebruik van maken. Het spel is in iedergeval gemaakt door <a href="https://github.com/nietrenswens">nietrenswens</a>
            </p>
        </div>
    </div>
    <img class="mx-auto text-center w-4/6 md:pt-12 pt-6" src="{{ asset('img/monopoly.jpg') }}" alt="monopoly logo">
@endsection