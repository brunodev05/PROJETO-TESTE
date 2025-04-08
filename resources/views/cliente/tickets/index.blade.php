@extends('layouts.app')

@section('content')
<div class="p-6 text-white bg-gray-900 min-h-screen">
    <h2 class="text-2xl font-bold mb-4">Meus Tickets</h2>
    <a href="{{ route('cliente.tickets.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded mb-6 inline-block">Criar Novo Ticket</a>

    @forelse ($tickets as $ticket)
        <div class="border border-gray-700 p-4 rounded mb-4 bg-gray-800">
            <p><strong>Problema:</strong> {{ $ticket->problem }}</p>
            <p><strong>Status:</strong> <span class="text-yellow-400">{{ $ticket->status }}</span></p>
            <p><strong>Descrição:</strong> {{ $ticket->description }}</p>
        </div>
    @empty
        <p class="text-gray-400">Você ainda não possui tickets.</p>
    @endforelse
</div>
@endsection
