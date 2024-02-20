<div>
    <h1>Usuário criado</h1>
    <ul>
        <li>Nome: {{ $user->name }}</li>
        <li>Email: {{ $user->email }}</li>
        <li>Número do documento: {{ $user->governmentId }}</li>
        <li>Valor: {{ $user->debtAmount }}</li>
        <li>Data a ser paga: {{ $user->debtDueDate }}</li>
        <li>UUID do Débito: {{ $user->debtId }}</li>
    </ul>
</div>