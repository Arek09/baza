@extends('layouts.app')

@section('body')

{{-- <style>
table tbody tr {
  display: none;
}

table tbody tr.show {
  display: table-row;
}

</style> --}}
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css"> --}}
<body>
  @include('layouts.header')
    <div class="container-fluid pb-3">
        <div class="d-grid gap-3" style="grid-template-columns: 1fr 3fr;">
          <div class="bg-body-tertiary border rounded-3">
            <div class="container">
              <h2 class="p-3">Kategorie</h2>
              <div id="accordion" class="p-3">
                @foreach($categories as $category)
                  <div class="card" style="margin-bottom: 10px;">
                    <div class="card-header" id="heading{{$category->id}}">
                      <h5 class="mb-0">
                        <button class="btn btn-link" style="text-transform: uppercase;text-decoration:none;color:black;" data-toggle="collapse" data-target="#collapse{{$category->id}}" aria-expanded="true" aria-controls="collapse{{$category->id}}">
                          {{$category->name}}
                        </button>
                      </h5>
                    </div>
                    <div id="collapse{{$category->id}}" class="collapse" aria-labelledby="heading{{$category->id}}" data-parent="#accordion">
                      <div class="card-body">
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>Nazwa</th>
                              <th>Opis</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($category->items as $item)
                              <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
            
          </div>
          <div class="bg-body-tertiary border rounded-3 p-3">
            <table id="myTable" class="table table-striped">
          
              
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nazwa</th>
                  <th>Ilość</th>
                  <th>Kategoria</th>
                  <th>Data utworzenia</th>
                  <th>Data aktualizacji</th>
                  <th>Akcje</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $product)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $product->name }}</td>
                  <td>{{ $product->quantity }}</td>
                  <td>{{ $product->category->name }}</td>
                  <td>{{ $product->created_at }}</td>
                  <td>{{ $product->updated_at }}</td>
                  <td>
                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal{{ $product->id }}">Edytuj</a>
                    <a href="{{ route('products.destroy', $product->id) }}" 
                      class="btn btn-danger btn-sm" 
                      data-item-id="{{ $product->id }}">Usuń</a>
                    {{-- <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#formularzModal2">Usuń</a> --}}
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
              
          </div>
        </div>
      </div>
      @foreach($data as $product)
       <!-- Modal z formularzem edycji -->
       <div class="modal fade" id="editModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="formularzModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="formularzModalLabel">Formularz edycji przedmiotu</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            
              <form method="POST" action="{{ route('items.update', [$product->id]) }}">
                @csrf
              
                <div class="mb-3">   
                 
                   
                  <label for="name" class="form-label">Nazwa przedmiotu</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
                </div>
              
                <div class="mb-3">
                  <label for="quantity" class="form-label" >Ilość</label>
                  <input type="number" class="form-control" id="quantity" value="{{ $product->quantity }}" name="quantity" required>
                </div>
           
                <div class="mb-3">
                  <label for="category" class="form-label">Kategoria</label>
                  <select class="form-select" id="category" name="category_id">
                    <option value="">Wybierz kategorie</option>
                    
                    @if($categories->isEmpty())
                      <option disabled>Brak kategorii</option>
                    @else
                      @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                    @endif
                  </select>
                </div>
             
              
                <div class="mb-3">
                  <label for="new_category" class="form-label">Nowa kategoria</label>
                  <input type="text" class="form-control" id="new_category" name="new_category">
                </div>
              
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
              <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
            </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
       <!-- Modal z formularzem usunięcia -->
       <div class="modal fade" id="formularzModal2" tabindex="-1" role="dialog" aria-labelledby="formularzModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="formularzModalLabel">Czy chcesz usunąć rekord?</h5>
            </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-center align-items-center">
                        <button class="btn btn-primary btn-block mx-3">Tak</button>
                        <button class="btn btn-danger btn-block mx-3">Nie</button>
                    </div> 
                </div>
            </div>
          </div>
        </div>
      </div>
            <script type="text/javascript"> 
              const selectCategory = document.getElementById("category");
              const inputNewCategory = document.getElementById("new_category");
          
              inputNewCategory.disabled = false;
          
              selectCategory.addEventListener("change", function() {
                if (selectCategory.value < 1) {
                  inputNewCategory.disabled = false;
                } else {
                  inputNewCategory.disabled = true;
                }
               
              });
              </script>
        <!-- Dodanie skryptów DataTables -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        
        <script type="text/javascript">
          $(document).ready(function() {
            $('#myTable').DataTable();
          });
        </script>

@stop

