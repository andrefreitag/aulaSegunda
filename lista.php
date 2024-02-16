<a href='/incluir'>Incluir Produto</a>

<br>
<?php
foreach($this->produtos as $item) {
    echo '<br>';
    echo '<a href=/conteudo?idProduto='.$item['idProduto'].'>'.$item['nome'].'</a>';
    echo ' - [ <a href=/editar?idProduto='.$item['idProduto'].'>EDITAR]</a>';
    echo ' - [ <a href=/remover?idProduto='.$item['idProduto'].'>REMOVER]</a>';
    
}

 