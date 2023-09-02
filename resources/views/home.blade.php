@extends('layouts.app')
@section('content')
<div class="container rounded bg-white mt-5 mb-5">
    <div style="box-shadow: 0 4px 12px rgb(0 0 0 / 15%); -webkit-box-shadow: 0 4px 12px rgb(0 0 0 / 15%); border-radius:8px;" class="row">

        <div class="row d-flex justify-content-center">
            @if($errors->any())
            <div class="col-md-6 mt-4">
                <div class="alert alert-danger text-center">
                    <ul class="list-group">
                        @foreach ($errors->all() as $error )
                            <li class="list-group-item text-danger text-center">{{ $error }}</li>
                        @endforeach
                    </ul>
              </div>
            </div>
           @endif
        </div>
        <div class="col-md-3 border-right">

            <form method="POST" action="{{route('update_profile', auth()->user()->id)}}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                @if($user->profpix)
                    <img style="border: 2px solid #ced4da" class="rounded-circle mt-5" width="150px" height="150px" src="{{'storage/'.$user->profpix }}">
                @else
                <img style="border: 2px solid #ced4da" class="rounded-circle mt-5" width="150px" height="150px" src="{{ asset('img/avatar.webp')}}">
                @endif
                <div style="position: relative; bottom:40px; left:45px; border-radius:45px; height:40px; width:40px; cursor:pointer; border:3px solid white;" class="p-2 bg-success d-flex justify-content-center" onclick="openFileUpload()">
                    <i class="fas fa-camera text-white"></i>
                  </div>
                  <input id="fileUploadInput" name="profpix" type="file" style="display: none">
                  <script>
                    function openFileUpload() {
                      document.getElementById('fileUploadInput').click();
                    }
                  </script>
                <span class="font-weight-bold">{{auth()->user()->name}}</span>
                <span class="text-black-50">{{ auth()->user()->email }}</span><span> </span></div>
        </div>
        <div class="col-md-7 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Personal Info</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Name</label><input name="firstname" type="text" class="form-control"  value=""></div>
                    <div class="col-md-6"><label class="labels">Surname</label><input name="lastname" type="text" class="form-control" value=""></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Middle Name (optional)</label><input type="text" class="form-control" name="middle_name" value=""></div>
                </div>

                <div class="mt-5 text-center">
                    <input value="save" type="submit" class="btn" />
                </div>
                </form>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Address Info</h4>
                </div>
                <form method="POST" action="" >
                    @csrf
                    <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" name="phone"  value=""></div>
                    <div class="col-md-12"><label class="labels">Street  </label><input type="text" class="form-control @error('street') is-invalid @enderror"  name="street" value="">
                        @error('street')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-12"><label class="labels">Postcode</label><input type="text" class="form-control" name="postcode" value=""></div>
                    <div class="col-md-12"><label class="labels">State</label><input type="text" class="form-control" name="state" value=""></div>
                    <div class="col-md-12"><label class="labels">Country  </label><input type="text" class="form-control"  name="country" value=""></div>

                    <div class="mt-5 text-center">
                        <input value="save" type="submit" class="btn" />
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
