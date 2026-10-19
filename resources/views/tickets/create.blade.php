
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear ticket</title>
</head>
<body>
    <h1>Crear ticket de soporte</h1>

    <form action="{{ route('tickets.store') }}" method="POST">
        @csrf

        <label for="title">Título:</label>
        <input
            type="text"
            id="title"
            name="title"
            value="{{ old('title') }}"
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
        >{{ old('description') }}</textarea>
        @error('description')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <label for="customer_id">Cliente:</label>
        <select id="customer_id" name="customer_id" required>
            <option value="">Selecciona un cliente</option>
            @foreach ($customers as $customer)
                <option
                    value="{{ $customer->id }}"
                    @selected(old('customer_id') == $customer->id)
                >
                    {{ $customer->name }}
                </option>
            @endforeach
        </select>
        @error('customer_id')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <label for="category_id">Categoría:</label>
        <select id="category_id" name="category_id" required>
            <option value="">Selecciona una categoría</option>
            @foreach ($categories as $category)
                <option
                    value="{{ $category->id }}"
                    @selected(old('category_id') == $category->id)
                >
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <label for="priority">Prioridad:</label>
        <select id="priority" name="priority" required>
            <option value="low" @selected(old('priority') == 'low')>Baja</option>
            <option value="medium" @selected(old('priority', 'medium') == 'medium')>Media</option>
            <option value="high" @selected(old('priority') == 'high')>Alta</option>
        </select>
        @error('priority')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <button type="submit">Crear ticket</button>
    </form>

    <p>
        <a href="{{ route('tickets.index') }}">Volver al listado</a>
    </p>
</body>
</html>
