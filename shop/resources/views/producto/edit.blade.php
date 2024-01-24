<h1>edicion de {{$id->nombre}}</h1>



<p>{{$id->nombre}},
    {{$id->color}},
    {{$id->stock}},
    {{$id->precio}},
    {{$id->ventas}}
</p>

<form method="post" action="/product/{{$id->id}}">
    @csrf
    @method('Patch')
    <label>
        Id
        <input type="number" name="id" value="{{$id->id}}">
    </label>
    <br>
    <label>
        Nombre
        <input type="text" name="nombre" value="{{$id->nombre}}">
    </label>
    <br>
    <label>
        Color
        <input type="text" name="color" value="{{$id->color}}">
    </label><br>
    <label>
        Foto
        <input type="text" name="foto" value="{{$id->foto}}">
    </label>
    <br>
    <label>
        Stock
        <input type="number" name="stock" value="{{$id->stock}}">
    </label>
    <br>
    <label>
        Precio
        <input type="number" name="precio" value="{{$id->precio}}">
    </label>
    <br>
    <label>
        Vendido
        <input type="number" name="ventas" value="{{$id->ventas}}">
    </label>
    <br>
    <button type="submit">Editar</button>
</form>

<a href="/product">Regresar</a>