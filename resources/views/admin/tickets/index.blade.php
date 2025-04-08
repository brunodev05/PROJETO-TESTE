@extends('layouts.app')

@section('content')
<div class="p-6 text-white bg-gray-900 min-h-screen">
    <h2 class="text-2xl font-bold mb-4">Tickets Recebidos</h2>

    @forelse ($tickets as $ticket)
        <div class="border border-gray-700 p-4 rounded mb-4 bg-gray-800">
            <p><strong>Usuário:</strong> {{ $ticket->user->name }} ({{ $ticket->user->email }})</p>
            <p><strong>Problema:</strong> {{ $ticket->problem }}</p>
            <p><strong>Status:</strong> <span class="text-yellow-400">{{ $ticket->status }}</span></p>
            <a href="{{ route('admin.tickets.edit', $ticket->id) }}" class="text-blue-400 hover:underline mt-2 inline-block">Editar Status</a>
        </div>
    @empty
        <p class="text-gray-400">Nenhum ticket encontrado.</p>
    @endforelse
</div>
@endsection
