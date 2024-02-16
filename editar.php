<!DOCTYPE html>
<form method=post >
    Nome: <input name="nome" value="<?php echo $this->detalhe_produto['nome'];?>">
    <br>
    Descrição:
    <br><textarea name="descricao" rows="10" cols="50"><?php echo $this->detalhe_produto['descricao'];?></textarea>
    <br><input type="submit">    
</form>