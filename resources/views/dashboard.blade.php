@extends('layouts.app')

@section('title', 'Dashboard - Connect Hub')

@section('content')

<!-- Mensagens de Sucesso -->
@if(session('success'))
<div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-r-lg shadow-md animate-pulse">
    <div class="flex items-center">
        <svg class="w-6 h-6 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <p class="text-green-700 font-medium">{{ session('success') }}</p>
    </div>
</div>
@endif

<!-- Estatísticas -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-primary-600 hover:shadow-xl transition-shadow duration-300">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm font-medium uppercase tracking-wider">Total de Participantes</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">{{ $participants->count() }}</p>
            </div>
            <div class="bg-primary-100 rounded-full p-3">
                <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-green-500 hover:shadow-xl transition-shadow duration-300">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm font-medium uppercase tracking-wider">Cadastros Hoje</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">{{ $participants->where('created_at', '>=', today())->count() }}</p>
            </div>
            <div class="bg-green-100 rounded-full p-3">
                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-purple-500 hover:shadow-xl transition-shadow duration-300">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm font-medium uppercase tracking-wider">Com Empresa</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">{{ $participants->whereNotNull('company')->count() }}</p>
            </div>
            <div class="bg-purple-100 rounded-full p-3">
                <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
            </div>
        </div>
    </div>
</div>

<!-- Grid: Formulário e Lista -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    
    <!-- Formulário de Cadastro -->
    <div class="bg-white rounded-xl shadow-xl p-8 border-t-4 border-primary-600">
        <div class="flex items-center mb-6">
            <div class="bg-primary-100 rounded-lg p-2 mr-3">
                <svg class="w-6 h-6 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-800">Novo Participante</h2>
        </div>

        <form action="{{ route('participants.store') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Nome -->
            <div>
                <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Nome Completo *</label>
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    required
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-primary-500 focus:ring-2 focus:ring-primary-200 transition-all duration-200 outline-none hover:border-gray-300 @error('name') border-red-500 @enderror"
                    placeholder="Ex: João Silva"
                    value="{{ old('name') }}"
                >
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">E-mail *</label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    required
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-primary-500 focus:ring-2 focus:ring-primary-200 transition-all duration-200 outline-none hover:border-gray-300 @error('email') border-red-500 @enderror"
                    placeholder="seuemail@exemplo.com"
                    value="{{ old('email') }}"
                >
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Telefone -->
            <div>
                <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">Telefone *</label>
                <input 
                    type="tel" 
                    name="phone" 
                    id="phone" 
                    required
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-primary-500 focus:ring-2 focus:ring-primary-200 transition-all duration-200 outline-none hover:border-gray-300 @error('phone') border-red-500 @enderror"
                    placeholder="(00) 00000-0000"
                    value="{{ old('phone') }}"
                >
                @error('phone')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Empresa -->
            <div>
                <label for="company" class="block text-sm font-semibold text-gray-700 mb-2">Empresa</label>
                <input 
                    type="text" 
                    name="company" 
                    id="company" 
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-primary-500 focus:ring-2 focus:ring-primary-200 transition-all duration-200 outline-none hover:border-gray-300"
                    placeholder="Nome da empresa (opcional)"
                    value="{{ old('company') }}"
                >
            </div>

            <!-- Cargo -->
            <div>
                <label for="position" class="block text-sm font-semibold text-gray-700 mb-2">Cargo</label>
                <input 
                    type="text" 
                    name="position" 
                    id="position" 
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-primary-500 focus:ring-2 focus:ring-primary-200 transition-all duration-200 outline-none hover:border-gray-300"
                    placeholder="Seu cargo (opcional)"
                    value="{{ old('position') }}"
                >
            </div>

            <!-- Botão Submit -->
            <button 
                type="submit" 
                class="w-full gradient-bg text-white font-bold py-4 px-6 rounded-lg hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200 focus:outline-none focus:ring-4 focus:ring-primary-300"
            >
                <span class="flex items-center justify-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Cadastrar Participante
                </span>
            </button>
        </form>
    </div>

    <!-- Lista de Participantes -->
    <div class="bg-white rounded-xl shadow-xl p-8 border-t-4 border-green-500">
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center">
                <div class="bg-green-100 rounded-lg p-2 mr-3">
                    <svg class="w-6 h-6 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-800">Participantes</h2>
            </div>
            <span class="bg-primary-100 text-primary-700 text-sm font-bold px-3 py-1 rounded-full">
                {{ $participants->count() }}
            </span>
        </div>

        <div class="space-y-3 max-h-[600px] overflow-y-auto pr-2">
            @forelse($participants as $participant)
            <div class="bg-gray-50 rounded-lg p-4 border-2 border-gray-200 hover:border-primary-300 hover:shadow-md transition-all duration-200">
                <div class="flex items-start justify-between">
                    <div class="flex-1">
                        <div class="flex items-center mb-2">
                            <div class="w-10 h-10 bg-primary-600 rounded-full flex items-center justify-center text-white font-bold mr-3">
                                {{ strtoupper(substr($participant->name, 0, 1)) }}
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800">{{ $participant->name }}</h3>
                                <p class="text-sm text-gray-500">{{ $participant->email }}</p>
                            </div>
                        </div>
                        
                        <div class="ml-13 space-y-1">
                            <p class="text-sm text-gray-600 flex items-center">
                                <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                {{ $participant->phone }}
                            </p>
                            @if($participant->company)
                            <p class="text-sm text-gray-600 flex items-center">
                                <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                                {{ $participant->company }}
                                @if($participant->position)
                                    - {{ $participant->position }}
                                @endif
                            </p>
                            @endif
                        </div>
                    </div>
                    
                    <form action="{{ route('participants.destroy', $participant->id) }}" method="POST" class="ml-2">
                        @csrf
                        @method('DELETE')
                        <button 
                            type="submit" 
                            onclick="return confirm('Tem certeza que deseja remover este participante?')"
                            class="text-red-500 hover:bg-red-50 p-2 rounded-lg transition-colors duration-200"
                            title="Remover participante"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </form>
                </div>
                
                <div class="mt-2 ml-13">
                    <span class="text-xs text-gray-400">
                        Cadastrado em {{ $participant->created_at->format('d/m/Y H:i') }}
                    </span>
                </div>
            </div>
            @empty
            <div class="text-center py-12">
                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <p class="text-gray-500 font-medium">Nenhum participante cadastrado ainda</p>
                <p class="text-gray-400 text-sm mt-1">Comece adicionando o primeiro participante!</p>
            </div>
            @endforelse
        </div>
    </div>

</div>
