@extends('layouts.app')

@section('content')
<div class="p-6 text-white bg-gray-900 min-h-screen">
    <h2 class="text-2xl font-bold mb-4">Criar Ticket</h2>

    <form action="{{ route('cliente.tickets.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="problem" class="block font-medium mb-1">Problema</label>
            <input type="text" name="problem" id="problem" required class="w-full bg-gray-800 text-white border border-gray-600 rounded p-2">
        </div>

        <div>
            <label for="description" class="block font-medium mb-1">Descrição</label>
            <textarea name="description" id="description" required rows="5" class="w-full bg-gray-800 text-white border border-gray-600 rounded p-2"></textarea>
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Enviar Ticket</button>
    </form>
</div>
@endsection
