@extends('layouts.app')

@section('body')



<body>
    @extends('layouts.header')
    <div class="container-fluid pb-3">
        <div class="d-grid gap-3" style="grid-template-columns: 1fr 3fr;">
          <div class="bg-body-tertiary border rounded-3">
            <br><br><br><br><br><br><br><br><br><br>
          </div>
          <div class="bg-body-tertiary border rounded-3">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nazwa</th>
                    <th>Ilość</th>
                    <th>Cena jednostkowa</th>
                    <th>Cena jednostkowa</th>
                    <th>Cena jednostkowa</th>
                    <th>Akcje</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Produkt A</td>
                    <td>10 szt.</td>
                    <td>100 zł</td>
                    <td>100 zł</td>
                    <td>100 zł</td>
                    <td>
                        <a href="#" class="btn btn-primary btn-sm "  data-toggle="modal" data-target="#formularzModal">Edytuj</a>
                        <a href="#" class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#formularzModal2">Usuń</a>
                    </td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>Produkt A</td>
                    <td>10 szt.</td>
                    <td>100 zł</td>
                    <td>100 zł</td>
                    <td>100 zł</td>
                    <td>
                        <a href="#" class="btn btn-primary btn-sm "  data-toggle="modal" data-target="#formularzModal">Edytuj</a>
                        <a href="#" class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#formularzModal">Usuń</a>
                    </td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>Produkt A</td>
                    <td>10 szt.</td>
                    <td>100 zł</td>
                    <td>100 zł</td>
                    <td>100 zł</td>
                    <td>
                        <a href="#" class="btn btn-primary btn-sm "  data-toggle="modal" data-target="#formularzModal">Edytuj</a>
                        <a href="#" class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#formularzModal">Usuń</a>
                    </td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>Produkt A</td>
                    <td>10 szt.</td>
                    <td>100 zł</td>
                    <td>100 zł</td>
                    <td>100 zł</td>
                    <td>
                        <a href="#" class="btn btn-primary btn-sm "  data-toggle="modal" data-target="#formularzModal">Edytuj</a>
                      <a href="#" class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#formularzModal">Usuń</a>
                    </td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>Produkt A</td>
                    <td>10 szt.</td>
                    <td>100 zł</td>
                    <td>100 zł</td>
                    <td>100 zł</td>
                    <td>
                      <a href="#" class="btn btn-primary btn-sm "  data-toggle="modal" data-target="#formularzModal">Edytuj</a>
                      <a href="#" class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#formularzModal">Usuń</a>
                    </td>
                  </tr>
                </tbody>
              </table>
              
          </div>
        </div>
      </div>

       <!-- Modal z formularzem edycji -->
       <div class="modal fade" id="formularzModal" tabindex="-1" role="dialog" aria-labelledby="formularzModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="formularzModalLabel">Formularz edycji przedmiotu</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="nazwa">Nazwa:</label>
                  <input type="text" class="form-control" id="nazwa" name="nazwa">
                </div>
                <div class="form-group">
                  <label for="opis">Opis:</label>
                  <textarea class="form-control" id="opis" name="opis"></textarea>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
                  <button type="button" class="btn btn-primary">Zapisz zmiany</button>
              </div>
            </div>
          </div>
        </div>
      </div>

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
    
      
           
            
            <!-- Załączenie bibliotek jQuery oraz Bootstrap JavaScript -->
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
            

@stop

