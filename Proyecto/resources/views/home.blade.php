@extends('components.layout')

@section('content')
<div style="max-width: 700px; margin: 40px auto;">
    <h1 style="text-align:center; color:#2d3748; font-size:2.5rem; margin-bottom:2rem; font-weight:bold; letter-spacing:1px;">Bulos recientes</h1>
    @forelse ($bulos as $bulo)
        <div style="background: #fff; border-radius: 16px; box-shadow: 0 4px 24px rgba(0,0,0,0.08); margin-bottom: 2rem; padding: 2rem 2.5rem; border-left: 6px solid #3182ce;">
            <div style="display:flex; align-items:center; margin-bottom:1rem;">
                <div style="font-weight:600; color:#3182ce; font-size:1.1rem; margin-right:1rem;">
                    {{ $bulo->user ? $bulo->user->name : 'Anónimo' }}
                </div>
                <div style="color:#a0aec0; font-size:0.95rem;">
                    {{ $bulo->created_at->diffForHumans() }}
                </div>
            </div>
            <div style="margin-bottom:1rem;">
                <span style="font-weight:500; color:#e53e3e;">Bulo:</span>
                <span style="color:#2d3748;">{{ $bulo->texto_bulo }}</span>
            </div>
            <div style="margin-bottom:1rem;">
                <span style="font-weight:500; color:#38a169;">Desmentido:</span>
                <span style="color:#2d3748;">{{ $bulo->texto_desmentido }}</span>
            </div>
        </div>
    @empty
        <div style="background: #f7fafc; border-radius: 12px; padding: 2rem; text-align:center; color:#718096; font-size:1.2rem;">
            No hay bulos todavía, ¡prueba a poner el primero!
        </div>
    @endforelse
</div>
@endsection
