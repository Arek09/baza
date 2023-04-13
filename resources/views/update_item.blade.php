@extends('layouts.app')

@section('body')

<body>
    @extends('layouts.header')


    <div class="d-flex justify-content-center">
        <form method="POST" action="{{ route('items.update') }}">
            @csrf
          
            <div class="mb-3">
              <label for="name" class="form-label">Nazwa przedmiotu</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
          
            <div class="mb-3">
              <label for="quantity" class="form-label">Ilość</label>
              <input type="number" class="form-control" id="quantity" name="quantity" required>
            </div>
          
            <div class="mb-3">
              <label for="category" class="form-label">Kategoria</label>
              <select class="form-select" id="category" name="category_id">
                <option value="">Wybierz kategorię lub dodaj nową</option>
                
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
          
            <button type="submit" class="btn btn-primary">Aktualizuj przedmiot</button>
          </form>
          
          
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
    <!--Skrypt zabezpieczający wybór jednocześnie nowej kategorii i dodanie nowej kategorii -->
  @stop