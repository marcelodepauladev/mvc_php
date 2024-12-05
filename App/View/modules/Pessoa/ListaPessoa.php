<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Pessoas</title>
</head>
<body>
    
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Data Nascimento</th>
        </tr>

        <?php foreach($model->rows as $item): ?>
        <tr>
            <td><?=$item->id ?></td>

            <td>
                <a href="/pessoa/form?id=<?= $item->id ?>"><?= $item->nome ?></a>
            </td>

            <td><?=$item->cpf ?></td>
            <td><?=$item->data_nascimento ?></td>
        </tr>
        <?php endforeach ?>

    </table>

</body>
</html>