<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gerador de Questões</title>
    <script type="text/javascript">
        function novaQuestao(){
            let formItem = document.createElement("div");
            formItem.id = "formItem"+parseInt(getIdIndex()+1);

            let br = document.createElement("br");

            let p = document.createElement("p");
            let text = document.createTextNode("Configurar Grupo de Questões: ");
            p.appendChild(text);

            let labelTipo = document.createElement("label");
            text = document.createTextNode("Tipo de Questões:");
            labelTipo.appendChild(text);

            let selectTipo = document.createElement("select");
            selectTipo.name = "tipo[]";
            selectTipo.id = "tipo";

            let option = document.createElement("option");
            option.value = "Add";
            option.text =  "Adição";
            selectTipo.appendChild(option);

            option = document.createElement("option");
            option.value = "Sub";
            option.text =  "Subtração";
            selectTipo.appendChild(option);

            option = document.createElement("option");
            option.value = "Mult";
            option.text =  "Multiplicação";
            selectTipo.appendChild(option);

            option = document.createElement("option");
            option.value = "Div";
            option.text =  "Divisão";
            selectTipo.appendChild(option);

            let labelQtd = document.createElement("label");
            text = document.createTextNode("Quantidade de questões: ");
            labelQtd.appendChild(text);

            let inputQtd = document.createElement("input");
            inputQtd.type = "int";
            inputQtd.name = "quantidade[]";
            inputQtd.id = "quantidade";
            inputQtd.placeholder = "Num. de questões";

            let selectNivel = document.createElement("select");
            selectNivel.name = "nivel[]";
            selectNivel.id = "nivel";

            option = document.createElement("option");
            option.value = "1";
            option.text =  "Fácil";
            selectNivel.appendChild(option);

            option = document.createElement("option");
            option.value = "2";
            option.text =  "Intermediário";
            selectNivel.appendChild(option);

            option = document.createElement("option");
            option.value = "3";
            option.text =  "Avançado";
            selectNivel.appendChild(option);

            let excluir = document.createElement("a");
            excluir.href = "#";
            excluir.text = "Excluir Questão";
            excluir.onclick = function excluindo(event){
                id = event.path[1].id.split("formItem")[1];
                excluirQuestao(id);
            }

            formItem.appendChild(p);
            formItem.appendChild(br);
            formItem.appendChild(labelTipo);
            formItem.appendChild(selectTipo);
            formItem.appendChild(labelQtd);
            formItem.appendChild(inputQtd);
            formItem.appendChild(selectNivel);
            formItem.appendChild(excluir);
            formItem.appendChild(br);

            let form = document.getElementById("formulario");
            form.appendChild(formItem);
        }

        function excluirQuestao(num){
            let elemento = document.getElementById("formItem"+num);
            elemento.remove();
        }

        function getIdIndex(){
            let container = document.getElementById("formulario");
            let total = container.children.length
            if(total === 0){
                ultimo = 1;
            }else{
                let ultimo = container.children[total-1].id.split("formItem")[1];
            }
            ultimo = parseInt(ultimo);
            return ultimo;
        }

    </script>
</head>
<body>
    <h1>Especificações da Avaliação: </h1>
    <br>
    <button onclick="novaQuestao()">Adicionar Questão</button>
    <form action="{{ route('operations.generate') }}" method="POST" target="_blank">
        @csrf
        <div id="config">
            <label for="totalAvaliacoes">Quantidade de provas: </label>
            <input type="number" name="totalAvaliacoes" id="totalAvaliacoes">
        </div>
        <div id="formulario" name="form">
            {{-- <div id="formItem1">
                <p>Configurar Questão: </p> <br>
                <label for="tipo">Tipo de questão:</label>
                <select name="tipo[]" id="tipo">
                    <option value="Add">Adição</option>
                    <option value="Sub">Subtração</option>
                    <option value="Mult">Multiplicação</option>
                    <option value="Div">Divisão</option>
                </select>

                <label for="quantidade">Quantidade de questões</label>
                <input type="int" name="quantidade[]" id="quantidade" placeholder="Num. de questões">

                <select name="nivel[]" id="nivel">
                    <option value="1">Fácil</option>
                    <option value="2">Intermediário</option>
                    <option value="3">Avançado</option>
                </select>

                <a href="#" onclick="excluirQuestao(1)">Excluir Questão</a>
                <br>
            </div> --}}
        </div>

        <button type="submit">ENVIAR</button>
    </form>
</body>
</html>
