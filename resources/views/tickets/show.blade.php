
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del ticket</title>
</head>
<body>
    <h1>Detalle del ticket #{{ $ticket->id }}</h1>

    @if (session('success'))
    <p>{{ session('success') }}</p>
@endif

    <h2>{{ $ticket->title }}</h2>

    <p>
        <strong>Descripción:</strong>
        {{ $ticket->description }}
    </p>

    <p>
        <strong>Cliente:</strong>
        {{ $ticket->customer->name }}
    </p>

    <p>
        <strong>Categoría:</strong>
        {{ $ticket->category->name }}
    </p>

    <p>
        <strong>Estado:</strong>
        {{ $ticket->status }}
    </p>

    <p>
        <strong>Prioridad:</strong>
        {{ $ticket->priority }}
    </p>

    <p>
        <strong>Fecha de creación:</strong>
        {{ $ticket->created_at->format('d/m/Y H:i') }}
    </p>

    <p>
        <a href="{{ route('tickets.edit', $ticket) }}">Editar ticket</a>
    </p>

    <p>
        <a href="{{ route('tickets.index') }}">Volver al listado</a>
    </p>
</body>
</html>
