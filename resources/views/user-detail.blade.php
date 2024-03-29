<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Account Settings UI Design</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/user.css')}}">
</head>

<body>
    <section class="py-5 my-5">
        <div class="container">
            <h1 class="mb-5">Account Settings</h1>
            <div class="bg-white shadow rounded-lg d-block d-sm-flex">
                <div class="profile-tab-nav border-right">
                    <div class="p-4">
                        <div class="img-circle text-center mb-3">

                        </div>
                        <h4 class="text-center">{{$users->name}}</h4>
                    </div>
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                       
                        <a class="nav-link" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="false">
                            <i class="fa fa-home text-center mr-1"></i>
                            Account
                        </a>
                        <a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
                            <i class="fa fa-key text-center mr-1"></i>
                            Password
                        </a>
                        <a class="nav-link" id="security-tab" data-toggle="pill" href="#security" role="tab" aria-controls="security" aria-selected="false">
                            <i class="fa fa-user text-center mr-1"></i>
                            Booking History
                        </a>
                        <a class="nav-link" id="application-tab" data-toggle="pill" href="#application" role="tab" aria-controls="application" aria-selected="false">
                            <i class="fa fa-tv text-center mr-1"></i>
                            Application
                        </a>
                        <a class="nav-link" id="notification-tab" data-toggle="pill" href="#notification" role="tab" aria-controls="notification" aria-selected="false">
                            <i class="fa fa-bell text-center mr-1"></i>
                            Notification
                        </a>
                    </div>
                </div>

                <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">

                   

                    <div class="tab-pane fade show" id="account" role="tabpanel" aria-labelledby="account-tab">
                        <form class="" action="{{route('acc.edit')}}" method="post">
                            @csrf
                            <h3 class="mb-4">Account Settings</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" value="{{$users->name}}" name="name">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" value="{{$users->email}}" name="email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone number</label>
                                        <input type="text" class="form-control" value="{{$users->phone}}" name="phone">
                                    </div>
                                </div>
                                                               
                            </div>
                            <div>
                                <input type="hidden" name="id" value="{{$users->id}})">
                                <button type="submit" class="btn btn-primary">Update</button>

                                <button class="btn btn-light">Cancel</button>
                            </div>
                        </form>
                    </div>



                    <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                        <form form class="" action="{{route('update-password')}}" method="post">
                            @csrf
                            <h3 class="mb-4">Password Settings</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Old password</label>
                                        <input type="password" class="form-control" name="old_password" placeholder="Enter old password">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>New password</label>
                                        <input type="password" class="form-control" name="new_password"> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Confirm new password</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>
                            </div>
                            <div>
                            <input type="hidden" name="id" value="{{$users->id}})">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>

                    </div>
                    <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
                    <h3 class="mb-4">Booking History</h3>
                            <div class="row">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th style="width:10%">Image</th>
                                            <th>Room</th>
                                            <th>Check-in date</th>
                                            <th>Check-out date</th>
                                            <th>Status</th>
                                            
                                        </tr>
                                    </thead>
                                    @foreach($bookings as $booking)
                                    <tbody>
                                        
                                        <tr>
                                            <td>{{$booking->id}}</td>
                
                                            <td ><img  src="{{  asset('images/rooms/' . $booking->room->img) }}" alt=" " height="200"></td>
                                            <td>{{$booking->room->name}}</td>
                                            <td>{{ $booking->checkin_date }}</td>
                                            <td>{{ $booking->checkout_date }}</td>
                                            <td></td>
                                        </tr>
                                        
                                        
                                        
                                    </tbody>
                                    @endforeach
                                </table>
                                                               
                            </div>
                    </div>
                    <div class="tab-pane fade" id="application" role="tabpanel" aria-labelledby="application-tab">
                        <h3 class="mb-4">Application Settings</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="app-check">
                                        <label class="form-check-label" for="app-check">
                                            App check
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                                        <label class="form-check-label" for="defaultCheck2">
                                            Lorem ipsum dolor sit.
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary">Update</button>
                            <button class="btn btn-light">Cancel</button>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="notification" role="tabpanel" aria-labelledby="notification-tab">
                        <h3 class="mb-4">Notification Settings</h3>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="notification1">
                                <label class="form-check-label" for="notification1">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum accusantium accusamus, neque cupiditate quis
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="notification2">
                                <label class="form-check-label" for="notification2">
                                    hic nesciunt repellat perferendis voluptatum totam porro eligendi.
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="notification3">
                                <label class="form-check-label" for="notification3">
                                    commodi fugiat molestiae tempora corporis. Sed dignissimos suscipit
                                </label>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary">Update</button>
                            <button class="btn btn-light">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>