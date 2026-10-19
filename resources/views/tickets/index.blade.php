
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tickets de soporte</title>
</head>
<body>
    <h1>Tickets de soporte</h1>
@if (session('success'))
    <p>{{ session('success') }}</p>
@endif

    @forelse ($tickets as $ticket)
        <article>
            <h2>{{ $ticket->title }}</h2>

            <p>{{ $ticket->description }}</p>
            <p>Cliente: {{ $ticket->customer->name }}</p>
            <p>Categoría: {{ $ticket->category->name }}</p>
            <p>Estado: {{ $ticket->status }}</p>
            <p>Prioridad: {{ $ticket->priority }}</p>
        </article>

        <hr>
    @empty
        <p>Todavía no hay tickets registrados.</p>
    @endforelse

    {{ $tickets->links() }}
</body>
</html>
