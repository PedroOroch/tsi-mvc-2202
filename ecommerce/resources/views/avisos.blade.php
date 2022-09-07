{{-- USA O HTML/CS/JS DO LAYOUTS/PADRAO.BLADE.PHP --}}
@extends('layouts.padrao')

{{-- DEFINE O TÍTULO DA PÁGIA/VIEW --}}
@section('title', 'Quadro de Avisos')

{{-- USA O SIDEBAR DO LAYOUT PADRÃO LAYOUTS/PADRAO.BLADE.PHP --}}
    @section('sidebar')
        @parent
        <div>
            --------- BARRA SUPERIOR ESPECÍFICA ---------
        </div>
@endsection

{{-- PARA INSERIR O CONTEÚDO NO LAYOUT PADRÃO (LAYOUTS/PADRAO.BLADE.PHP) --}}
@section('content')
        <h3>QUADRO DE AVISOS</h3>
        <div>
            <h4>
                Exemplo com a sintaxe do Blade
            </h4>
        </div>
        <div>

            {{-- LOOPING PARA VETOR DO BLADE --}}
            @foreach ($avisos as $aviso)
            {{-- IF NO BLADE --}}
                @if($aviso['exibir'])
                    <div>
                        {{$aviso['data']}}: {{$aviso['aviso']}}
                    </div>
                @endif
            @endforeach
        </div>
        <div>
            <h4>
                Exemplo com a sintaxe do PHP
            </h4>
            <?php
                //Também podemos usar o php puro aqui!! :D
                foreach($avisos as $aviso) {
                    if($aviso['exibir']) {
                        echo "<div>";
                            echo "{$aviso['data']}: {$aviso['aviso']}";
                        echo "</div>";
                    } else {
                        echo "<div>";
                            echo "Não Há Aviso";
                        echo "</div>";
                    }
                }
            ?>
        </div>
@endsection
