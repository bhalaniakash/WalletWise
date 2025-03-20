<form action="{{ route('admin.category.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT') <!-- For updating the record -->

    <label for="name">Category Name:</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" required>

    <label for="type" class="form-label">Category Type</label>
    <select name="type" id="type" class="form-control" required>
        <option value="income" {{ $category->type == 'income' ? 'selected' : '' }}>Income</option>
        <option value="expense" {{ $category->type == 'expense' ? 'selected' : '' }}>Expense</option>
    </select>

    <button type="submit" class="btn btn-success">Update Category</button>
</form>