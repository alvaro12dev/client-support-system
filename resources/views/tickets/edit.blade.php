
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar ticket</title>
</head>
<body>
    <h1>Editar ticket #{{ $ticket->id }}</h1>

    <form action="{{ route('tickets.update', $ticket) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="title">Título:</label>
        <input
            type="text"
            id="title"
            name="title"
            value="{{ old('title', $ticket->title) }}"
            required
        >

        @error('title')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <label for="description">Descripción:</label>
        <textarea
            id="description"
            name="description"
            required
        >{{ old('description', $ticket->description) }}</textarea>

        @error('description')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <label for="status">Estado:</label>
        <select id="status" name="status" required>
            <option value="open" @selected(old('status', $ticket->status) == 'open')>Abierto</option>
            <option value="in_progress" @selected(old('status', $ticket->status) == 'in_progress')>En progreso</option>
            <option value="closed" @selected(old('status', $ticket->status) == 'closed')>Cerrado</option>
        </select>

        @error('status')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <label for="priority">Prioridad:</label>
        <select id="priority" name="priority" required>
            <option value="low" @selected(old('priority', $ticket->priority) == 'low')>Baja</option>
            <option value="medium" @selected(old('priority', $ticket->priority) == 'medium')>Media</option>
            <option value="high" @selected(old('priority', $ticket->priority) == 'high')>Alta</option>
        </select>

        @error('priority')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <button type="submit">Guardar cambios</button>
    </form>

    <p>
        <a href="{{ route('tickets.show', $ticket) }}">Volver al detalle</a>
    </p>
</body>
</html>
