@extends('layouts.app')
@section("title", 'Chỉnh sửa thông tin')
@section("content")
    <div class="container mt-1 mb-5" style="padding-left:6rem; padding-right:6rem">
        <div class="row">
            <div class="col col-md-3 bg-white border-right" style="padding: 0">
                <ul class="list-group">
                    <li class="list-group-item">Thông tin cá nhân</li>
                    <li class="list-group-item">Thay đổi mật khẩu</li>
                    <li class="list-group-item">Ứng dụng và trang web</li>
                    <li class="list-group-item">Email và SMS</li>
                    <li class="list-group-item">Thông báo</li>
                    <li class="list-group-item">Danh bạ</li>
                    <li class="list-group-item">Bảo mật và quyền riêng tư</li>
                    <li class="list-group-item">Hoạt động đăng nhập</li>
                    <li class="list-group-item">Email từ Instargram</li>
                </ul>
            </div>
            <div class="col col-md-9 pb-5 border-right border-top border-bottom bg-white p-2">
                <form>
                    <div class="row pt-5">
                        <div class="col col-md-3">
                            <img class="icon-user pull-right" src="{{ $user->profile->avatar }}" alt="user" width="25%">
                        </div>
                        <div class="col col-md-7 my-auto">
                            <h5><b>{{ $user->username }}</b></h5>
                            <a href="#"><b>Thay đổi ảnh đại diện</b></a>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col col-md-3">
                            <label class="pull-right"><b>Tên</b></label>
                        </div>
                        <div class="col col-md-7">
                            <input type="text" class="form-control" placeholder="Tên" value="{{ $user->name }}">
                            <small class="text-secondary">Bạn đang dùng chung một tên trên cả Instagram và Facebook. Hãy truy cập vào Facebook để đổi tên. <a href="#"><b>Đổi tên</b></a></small>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col col-md-3">
                            <label class="pull-right"><b>Tên người dùng</b></label>
                        </div>
                        <div class="col col-md-7">
                            <input type="text" class="form-control" placeholder="Tên người dùng" value="{{ $user->username }}">
                            <small class="text-secondary">Thông thường, bạn sẽ có thể đổi lại tên người dùng về alexander_lehoang sau 14 ngày nữa. <a href="#"><b>Tìm hiểu thêm</b></a></small>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col col-md-3 my-auto">
                            <label class="pull-right"><b>Trang web</b></label>
                        </div>
                        <div class="col col-md-7">
                            <input type="text" class="form-control" placeholder="Trang web" value="{{ isset($user->profile->url) ? $user->profile->url : ''}}">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col col-md-3 my-auto">
                            <label class="pull-right"><b>Tiểu sử</b></label>
                        </div>
                        <div class="col col-md-7">
                            <textarea type="text" class="form-control" placeholder="Tểu sử">{{ $user->profile->description }}</textarea>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col col-md-3 my-auto"></div>
                        <div class="col col-md-7">
                            <strong class="text-secondary">Thông tin cá nhân</strong>
                            <br>
                            <small class="text-secondary">Cung cấp thông tin cá nhân của bạn, bất kể bạn dùng tài khoản cho doanh nghiệp, thú cưng hay gì khác. Thông tin này sẽ không hiển thị trên trang cá nhân công khai của bạn.</small>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col col-md-3 my-auto">
                            <label class="pull-right"><b>Email</b></label>
                        </div>
                        <div class="col col-md-7">
                            <input type="email" class="form-control" placeholder="Email" value="{{ isset($user->email) ? $user->email : '' }}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col col-md-3 my-auto">
                            <label class="pull-right"><b>Số điện thoại</b></label>
                        </div>
                        <div class="col col-md-7">
                            <input type="text" class="form-control" value="{{ isset($user->profile->phone) ? $user->profile->phone : '' }}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col col-md-3 my-auto">
                            <label class="pull-right"><b>Giới tính</b></label>
                        </div>
                        <div class="col col-md-7">
                            <input type="text" class="form-control" placeholder="Giới tính" value="{{ isset($user->profile->gender) ? $user->profile->gender : '' }}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col col-md-3 my-auto"></div>
                        <div class="col col-md-7">
                            <button type="submit" class="btn btn-primary">Gửi</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
@section("script")
@endsection
