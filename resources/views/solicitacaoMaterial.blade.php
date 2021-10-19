@extends('static.static')
@section('content')
    <link rel="stylesheet" href="./css/customDetalhes.css">
    <form id="form" action="">
        @csrf
        <input type="hidden" name="id" id="const">
        <h4>Solicitar material</h4>
        <table>
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Quantidade</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if(is_array($materiais))
                    @for($i = 0; $i < count($materiais); $i++)
                        <tr>
                            <td>{{$materiais[$i]->tipo}}</td>
                            <td>{{$materiais[$i]->quantidade}}</td>
                            <td><a class="waves-effect waves-light btn">solicitar</a></td>
                        </tr>
                    @endfor
                @elseif(!is_array($materiais) && isset($materiais[0]))
                    <tr>
                        <td>{{$materiais[0]->tipo}}</td>
                        <td>{{$materiais[0]->quantidade}}</td>
                        <td><a id="btn{{$materiais[0]->codMaterial}}" onclick="solicitar({{$materiais[0]->codMaterial}})" class="waves-effect waves-light btn">solicitar</a></td>
                    </tr>
                @endif
            </tbody>
        </table>
    </form>
    <script type="text/javascript">
        function solicitar(id){
            document.getElementById('const').value = id;
            $.ajax({
                url: "/gerarPedido",
                type: "POST",
                data: $('#form').serialize(),
                dataType: 'text',

                beforeSend : function(){

                },
                success : function(response){
                    console.log(response);
                    document.getElementById("btn"+id).classList.add('disabled');
                },
                error : function(a,b,c){
                    console.log(b);
                    console.log('Erro: ' + a['status'] + ' ' + c);
                }
            });
        }
    </script>
@endsection
