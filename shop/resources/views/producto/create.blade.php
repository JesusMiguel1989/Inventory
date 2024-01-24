<h1>Create new Product</h1>

<form method="post" action="/product/store">
    @csrf
    <label>
        Id
        <input type="number" name="id">
    </label>
    <br>
    <label>
        Nombre
        <input type="text" name="nombre">
    </label>
    <br>
    <label>
        Color
        <input type="text" name="color">
    </label>
    <br>
    <label>
        Foto
        <input type="text" name="foto">
    </label>
    <br>
    <label>
        Stock
        <input type="number" name="stock">
    </label>
    <br>
    <label>
        Precio
        <input type="number" name="precio">
    </label>
    <br>
    <label>
        Vendido
        <input type="number" name="ventas">
    </label>
    <br>
    <button type="submit">Enviar</button>
</form>