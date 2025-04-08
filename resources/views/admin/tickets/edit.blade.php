@extends('layouts.app')

@section('content')
<div class="p-6 text-white bg-gray-900 min-h-screen">
    <h2 class="text-2xl font-bold mb-4">Atualizar Ticket</h2>

    <div class="border border-gray-700 p-4 rounded mb-6 bg-gray-800">
        <p><strong>Usuário:</strong> {{ $ticket->user->name }}</p>
        <p><strong>Problema:</strong> {{ $ticket->problem }}</p>
        <p><strong>Descrição:</strong> {{ $ticket->description }}</p>
    </div>

    <form action="{{ route('admin.tickets.update', $ticket->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="status" class="block font-medium mb-1">Status</label>
            <select name="status" id="status" class="w-full bg-gray-800 text-white border border-gray-600 rounded p-2">
                <option value="Aberto" {{ $ticket->status == 'Aberto' ? 'selected' : '' }}>Aberto</option>
                <option value="Em andamento" {{ $ticket->status == 'Em andamento' ? 'selected' : '' }}>Em andamento</option>
                <option value="Resolvido" {{ $ticket->status == 'Resolvido' ? 'selected' : '' }}>Resolvido</option>
            </select>
        </div>

        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded">Atualizar Status</button>
    </form>
</div>
@endsection
