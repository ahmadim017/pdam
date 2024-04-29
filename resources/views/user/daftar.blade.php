@extends('layouts.sbadmin')
@section('header')
<link href="{{asset('public/sbadmin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('footer')
<script src="{{asset('public/sbadmin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/sbadmin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/sbadmin/js/demo/datatables-demo.js')}}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
      const checkAllCheckbox = document.getElementById('checkAll');
      const userCheckboxes = document.querySelectorAll('.user-checkbox');
  
      checkAllCheckbox.addEventListener('change', function () {
        userCheckboxes.forEach(function (checkbox) {
          checkbox.checked = checkAllCheckbox.checked;
        });
      });

      const deleteForm = document.getElementById('deleteForm');
      const deleteButton = document.getElementById('deleteButton');

      deleteButton.addEventListener('click', function () {
        // Get the IDs of selected users
        const selectedUserIds = Array.from(userCheckboxes)
          .filter(checkbox => checkbox.checked)
          .map(checkbox => checkbox.value);

        // Set the value of the hidden input in the form
        document.getElementById('selectedUserIds').value = selectedUserIds.join(',');

        // Submit the form
        deleteForm.submit();
      });
    });
</script>
@endsection

@section('content')
<div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
      <h6 class="m-0 font-weight-bold text-secondary">Data User</h6>
    </a>

    <!-- Card Content - Collapse -->
    <div class="collapse show" id="collapseCardExample">
      <div class="card-body">
        @if(session('status'))
          <div class="alert alert-success">
            {{session('status')}}
          </div>
        @endif 
  
        @if(session('Status'))
          <div class="alert alert-danger">
            {{session('Status')}}
          </div>
        @endif

        <form id="deleteForm" action="#" method="post">
          @csrf
          @method('delete')
          <div class="table-responsive">    
            <table class="table table-striped" id="dataTable">
              <thead>
                <tr>
                  <th scope="col">
                    <input class="form-input" type="checkbox" id="checkAll"> Check All
                  </th>
                  <th scope="col">Nik</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Email</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($user as $user)
                  <tr>
                    <td>
                      <input class="form-input user-checkbox" type="checkbox" name="selectedUsers[]" value="{{ $user->id }}">
                    </td>
                    <td>{{$user->nik}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                      @if ($user->status == 'ACTIVE')
                        <span class="badge badge-info">{{$user->status}}</span>
                      @else 
                        <span class="badge badge-warning">{{$user->status}}</span>
                      @endif
                    </td>
                   
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          
          <button type="button" id="deleteButton" class="btn btn-danger">Delete</button>
          <input type="hidden" name="selectedUserIds" id="selectedUserIds">
        </form>
      </div>
    </div>
  </div>
@endsection
