@extends('layouts.master')
@section('styles')
<link rel="stylesheet" href="{{ asset('styles/pageStyle/profile.css') }}">
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
@stop
@section('content')
<form action="">
    <div id="showOff" class="container ">
        <div class="container__info">
            <div class="container__info-top">
                <div class="container__info-top-avatar">
                    <div class="container__info-top-avatar-img" style="background-image: url({{ asset('assets/image/dungdeptrai.jpg') }});">
                        <div class="container__info-top-avatar-img-change">
                            <button type="button" id="changeAvatar">
                                {{-- <form action="" enctype="multipart/form-data">
                                    <input id="avt-btn" type="file">
                                </form> --}}
                                Change
                            </button>
                        </div>
                    </div>
                </div>
                <div class="container__info-top-username">
                    <div class="username">{{ $user[0]->username }}</div>
                    <div class="usercode">{{ $user[0]->Code }}</div>
                </div>
                <div class="container__info-top-button">
                    <button id="edit">
                        <ion-icon name="create-outline"></ion-icon>
                    </button>
                </div>
            </div>
            <div class="container__info-details">
                <table>
                    @if (!empty($user->Rank))
                        <tr>
                            <th>Member</th>
                            <td>{{ $user->Rank }}</td>
                        </tr>
                        <tr>
                            <th>First Name:</th>
                            <td>{{ $user->First_Name }}</td>
                        </tr>
                        <tr>
                            <th>Last Name:</th>
                            <td>{{ $user->Last_Name }}</td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>{{ $user->Email }}</td>
                        </tr>
                        <tr>
                            <th>Phone:</th>
                            <td>{{ $user->Number_Phone }}</td>
                        </tr>
                        <tr>
                            <th>DOB:</th>
                            <td>{{ $user->Dob }}</td>
                        </tr>
                    @else
                        <tr>
                            <th>Member</th>
                            <td>{{ $user[0]->Rank }}</td>
                        </tr>
                        <tr>
                            <th>First Name:</th>
                            <td>{{ $user[0]->First_Name }}</td>
                        </tr>
                        <tr>
                            <th>Last Name:</th>
                            <td>{{ $user[0]->Last_Name }}</td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>{{ $user[0]->Email }}</td>
                        </tr>
                        <tr>
                            <th>Phone:</th>
                            <td>{{ $user[0]->Number_Phone }}</td>
                        </tr>
                        <tr>
                            <th>DOB:</th>
                            <td>{{ $user[0]->Dob }}</td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>
        <div class="container__history">
            <div class="container__history-title">
                <p>Shopping History</p>
            </div>
            <div class="container__history-list">
                @if (!empty($user[0]->Order_Code))
                    @foreach ($user as $user)
                        <A class="container__history-list-item" href="{{ url('client/orders',$user->Order_Code) }}">
                            <div class="container__history-list-item-title">
                                <div class="container__history-list-item-title-userCode">{{ $user->Order_Code }}</div>
                                <div class="container__history-list-item-title-date">{{ $user->created_at }}</div>
                            </div>
                            <div class="container__history-list-item-content">
                                <div class="container__history-list-item-content-status">
                                    @if ($user->Status == 'Pending')
                                        <div class="container__history-list-item-content-status-color"
                                            style="background-color: rgb(5, 150, 150);"></div>
                                    @elseif ($user->Status == 'Done')
                                        <div class="container__history-list-item-content-status-color"
                                            style="background-color: #28a745;"></div>
                                    @else
                                        <div class="container__history-list-item-content-status-color"
                                            style="background-color: #6c757d;"></div>
                                    @endif
                                    <div class="container__history-list-item-content-status-text">{{ $user->Status }}
                                    </div>
                                </div>
                                <div class="container__history-list-item-content-details">
                                    <div class="container__history-list-item-content-details-quantity">
                                        <div>Total quantity</div>
                                        <div>{{ $user->Total_Quantity }}</div>
                                    </div>
                                    <div class="container__history-list-item-content-details-totalPrice">
                                        <div>Total price</div>
                                        <div>${{ $user->Total_Price }}</div>
                                    </div>
                                </div>
                            </div>
                        </A>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <div id="showEdit" class="container__edit ">
        <div class="editProfile">
            <div class="editProfile__title">Edit Profile</div>
            <div class="profile editProfile__content">
                {{ csrf_field() }}
                <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>
                @if (!empty($user->First_Name))
                    <input id="firstname" type="text" value="{{ $user->First_Name }}" placeholder="  Firstname">
                    <input id="lastname" type="text" value="{{ $user->Last_Name }}" placeholder="  Lastname">
                    <input id="email" type="text" value="{{ $user->Email }}" placeholder="  Email">
                    <input id="dob" type="date" value="{{ $user->Dob }}" placeholder="  DOB">
                    <input id="phone_number" type="text" value="{{ $user->Number_Phone }}"
                        placeholder="  Phone Number">
                @else
                    <input id="firstname" type="text" value="{{ $user[0]->First_Name }}" placeholder="  Firstname">
                    <input id="lastname" type="text" value="{{ $user[0]->Last_Name }}" placeholder="  Lastname">
                    <input id="email" type="text" value="{{ $user[0]->Email }}" placeholder="  Email">
                    <input id="dob" type="date" value="{{ $user[0]->Dob }}" placeholder="  DOB">
                    <input id="phone_number" type="text" value="{{ $user[0]->Number_Phone }}"
                        placeholder="  Phone Number">
                @endif
                <button id="btn" type="button">Submit</button>

            </div>
            <button id="offEdit">
                <ion-icon name="close-outline"></ion-icon>
            </button>
        </div>
    </div>
</form>



<script src="{{ asset('javascript/client/profile.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src='https://cdn.jsdelivr.net/jquery.cloudinary/1.0.18/jquery.cloudinary.js' type='text/javascript'></script>
<script src="//widget.cloudinary.com/global/all.js" type="text/javascript"></script>

<script>
    $(document).ready(function() {
        // Edit Profile
        $('#btn').click(function() {
            var firstname = $('#firstname').val()
            var lastname = $('#lastname').val()
            var email = $('#email').val()
            var dob = $('#dob').val()
            var phoneNumber = $('#phone_number').val()
            var _token = $('input[name="_token"]').val()
            $.ajax({
                url: "{{ route('client.edit-profile') }}",
                method: "POST",
                data: {
                    firstname: firstname,
                    lastname: lastname,
                    email: email,
                    dob: dob,
                    phoneNumber: phoneNumber,
                    _token: _token
                },
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        printErrorMsg();
                        alert(data.success);
                        location.reload();
                    } else {
                        printErrorMsg(data.error);
                    }
                    // console.log(data);
                }
            })
        })

        // Edit Profile Message
        function printErrorMsg(msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display', 'block');
            $.each(msg, function(key, value) {
                $(".print-error-msg").find("ul").append('<li style="color:red">' + value + '</li>');
            });
        }

        // Edit Avatar
        $('#avt-btn').change(function() {
            var file = $(this)[0].files[0]
            if (test) {
                console.log('hehe');
                console.log(test);
                var formData = new FormData();
                formData.append('file', file)
                formData.append('upload_preset', 'kem7hhjd')

                $.ajax({
                    url: "https://api.cloudinary.com/v1_1/dsqiav317/image/upload" + formData,
                    method: "POST",
                    data: {
                        _token: _token
                    },
                    success: function(data) {
                        console.log(data);
                    }
                })
            } else {
                console.log('khong hehe');
                console.log(test);
            }
        })
    })
</script>
@stop
