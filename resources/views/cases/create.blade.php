<!-- resources/views/cases/create.blade.php -->
<form action="{{ route('cases.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div>
        <label for="name">Название</label>
        <input type="text" name="name" id="name" required>
    </div>

    <div>
        <label for="description">Описание</label>
        <textarea name="description" id="description" required></textarea>
    </div>

    <div>
        <label for="price">Цена</label>
        <input type="number" name="price" id="price" required>
    </div>

    <div>
        <label for="image">Изображение</label>
        <input type="file" name="image" id="image" required>
    </div>

    <div>
        <button type="submit">Создать</button>
    </div>
</form>
