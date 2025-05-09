@extends('user.base')

@section('content')

    <!-- DataTales Example -->
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                {{$pageName}}
            </h6>
        </div>
        <div class="card-body row">
            <div class="col-md-12 mx-auto">
                <form method="post" action="{{route('settings.update')}}" class="g-5">
                    @csrf
                    @include('templates.notification')
                    <div class="row">
                        <div class="form-group col-md-6 mt-3">
                            <label for="inputEmail4">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Name"
                                   value="{{$user->name}}" name="name">
                        </div>
                        <div class="form-group col-md-6 mt-3">
                            <label for="inputEmail4">Email</label>
                            <input type="email" class="form-control" id="inputEmail4" placeholder="Email"
                                   value="{{$user->email}}" disabled>
                        </div>
                        <div class="form-group col-md-6 mt-3">
                            <label for="inputEmail4">Username</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="username"
                                   value="{{$user->username}}" disabled>
                        </div>
                        <div class="form-group col-md-6 mt-3">
                            <label for="inputEmail4">Reference</label>
                            <input type="email" class="form-control" id="inputEmail4" placeholder=""
                                   value="{{$user->userRef}}" disabled>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="form-group col-md-6 mt-3">
                            <label for="inputAddress2">Phone</label>
                            <input type="text" class="form-control" id="inputAddress2"
                                   placeholder="Enter your contact number" name="phone"
                                   value="{{$user->phone}}">
                        </div>
                        <div class="form-group col-md-6 mt-3">
                            <label for="inputAddress2">Date of Birth</label>
                            <input type="date" class="form-control" id="inputAddress2"
                                   placeholder="Enter your contact number" name="dob"
                                   value="{{$user->dateOfBirth}}">
                        </div>
                        <div class="form-group col-md-6 mt-3">
                            <label for="inputAddress2">Country</label>
                            <input type="text" class="form-control" id="inputAddress2"
                                   placeholder="Enter country" name="country" value="{{$user->country}}">
                        </div>
                        <div class="form-group col-md-6 mt-3">
                            <label for="inputAddress2">2FA</label>
                            <select type="text" class="form-control" id="inputAddress2"
                                   name="twoWay">
                                <option value="">Select an Option</option>
                                @if($user->twoWay == 1)
                                    <option value="1" selected>ON</option>
                                    <option value="2" >OFF</option>
                                @else
                                    <option value="1" >ON</option>
                                    <option value="2" selected>OFF</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="text-center mt-5">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- DataTales Example -->
    <div class="card mt-5">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Photo Change
            </h6>
        </div>
        <div class="card-body row">
            <div class="col-md-12 mx-auto">
                <form method="post" action="{{route('photo.update')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-3">
                        <div class="form-group col-md-12 mt-3">
                            <label for="inputEmail4">Current Photo</label>

                            <div class="profile-face">
                                <div class="row align-items-end justify-content-center">
                                    <div class="col-lg-4">
                                        <div class="avatar">
                                            <img src="{{empty($user->photo)?'https://ui-avatars.com/api/?name='.$user->name:asset('dashboard/user/images/'.$user->photo)}}"
                                                 alt="Images" style="width: 80px;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-group col-md-12 mt-3">
                            <label for="inputEmail4">Upload Profile Photo</label>
                            <input type="file" class="form-control" id="inputEmail4"
                            name="photo" accept="image/*"/>
                        </div>
                    </div>
                    <div class="text-center mt-5">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="card mt-5">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Password Change
            </h6>
        </div>
        <div class="card-body row">
            <div class="col-md-12 mx-auto">
                <form method="post" action="{{route('password.update')}}">
                    @csrf
                    <div class="row mt-3">
                        <div class="form-group col-md-12 mt-3">
                            <label for="inputEmail4">Old Password</label>
                            <input type="password" class="form-control" id="name" placeholder="Enter old password"
                                   name="old_password">
                        </div>
                        <div class="form-group col-md-6 mt-3">
                            <label for="inputEmail4">New Password</label>
                            <input type="password" class="form-control" id="inputEmail4"
                                   name="new_password" placeholder="Enter New Password">
                        </div>
                        <div class="form-group col-md-6 mt-3">
                            <label for="inputEmail4">Repeat New Password</label>
                            <input type="password" class="form-control" id="inputEmail4"
                                   name="new_password_confirmation" placeholder="Repeat New Password">
                        </div>

                    </div>
                    <div class="text-center mt-5">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
