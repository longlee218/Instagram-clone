@extends('layouts.app')
@section("title", $user->username)
@section('content')
    <style>
        img:hover{
            filter: grayscale(50%);
        }
    </style>
    <div class="container" style="padding-left:2rem; padding-right:2rem">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    <div class="col col-md-3">
                        <a href="javascript:void(0)">
                            <img class="icon-user" src="{{ $user->profile->avatar }}" alt="{{ $user }}">
                        </a>
                    </div>
                    <div class="p-3 col col-md-9" style="padding-left:1rem !important;">
                        <div class="header" style="display: flex; flex-direction:row; align-items:center;">
                            <h3>{{$user->profile->titles}}</h3>
                            <a class="ml-5" href="javascript:void(0)"
                               style="border: 1px solid #dbdbdb; background-color: transparent; padding: 2px 10px; border-radius:3px; text-decoration: none; color: black">
                                <strong>Chỉnh sửa trang cá nhân</strong></a>
                            <div class="dropdown">
                                <img class="ml-5 dropdown-toggle" id="dropdownMenuButton"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" src="{{ asset('svg/settings.svg') }}" alt="settings" width="14%" />
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="javascript:" onclick="openModal()">Thêm bài viết</a>
                                </div>
                            </div>
                        </div>
                        <div class="details mt-3" style="display:flex; flex-direction:row; justify-content:start;">
                            <span class="mr-5"><strong>{{ $user->posts->count() }}</strong> bài viết</span>
                            <span class="mr-5"><strong>107</strong> người theo dõi</span>
                            <span class="mr-5">Đang theo dõi <strong>412</strong> người dùng</span>
                        </div>
                        <div class="caption mt-3">
                            <blockquote style="">
                                <div><strong>{{ $user['name'] }}</strong></div>
                                <div>{{ $user->profile->description }}</div>
                                <div><a href="{{ $user->profile->url }}">{{ $user->profile->url }}</a></div>
                                <div><small>Có <strong>longle</strong>, <strong>cocon</strong> và 8 người khác theo dõi</small></div>
                            </blockquote>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <ul class="nav nav-tabs nav-header">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#home">
                                <i class="fa fa-table mr-1" aria-hidden="true"></i>
                                BÀI VIẾT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu1">
                                <i class="fa fa-television mr-1" aria-hidden="true"></i>
                                IGTV</a>
                        </li>
                        <li class="nav-item">

                            <a class="nav-link" data-toggle="tab" href="#menu2">
                                <i class="fa fa-bookmark-o mr-1" aria-hidden="true"></i>
                                ĐÃ LƯU</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu2">
                                <i class="fa fa-tags mr-1" aria-hidden="true"></i>
                                ĐƯỢC GẮN THẺ</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="row mt-1">
                                @if($user->posts->count() == 0)
                                    <h5 class="m-auto">Không có bài viết nào</h5>
                                @endif
                                @foreach($user->posts as $post)
                                    <div class="col col-md-4">
                                        @if(empty($post->picture))
                                            @continue
                                        @endif
                                    <a href="#">
                                        <img src="/storage/{{ $post->picture }}" class="w-100" >
                                    </a>
                                    </div>
                                @endforeach
{{--                                <div class="col col-md-4">--}}
{{--                                    <img class="w-100" src="https://scontent.fhan2-4.fna.fbcdn.net/v/t1.0-9/110157935_301447384391653_8150559747557080942_o.jpg?_nc_cat=110&ccb=2&_nc_sid=0debeb&_nc_ohc=UaZv9glQ_r0AX9FIM5s&_nc_ht=scontent.fhan2-4.fna&oh=96770df4848e11dd7d050addc071cf13&oe=60347967">--}}
{{--                                </div>--}}
{{--                                <div class="col col-md-4">--}}
{{--                                    <img class="w-100" src="https://scontent.fhan2-4.fna.fbcdn.net/v/t1.0-9/110157935_301447384391653_8150559747557080942_o.jpg?_nc_cat=110&ccb=2&_nc_sid=0debeb&_nc_ohc=UaZv9glQ_r0AX9FIM5s&_nc_ht=scontent.fhan2-4.fna&oh=96770df4848e11dd7d050addc071cf13&oe=60347967">--}}
{{--                                </div>--}}
{{--                                <div class="col col-md-4">--}}
{{--                                    <img class="w-100" src="https://scontent.fhan2-4.fna.fbcdn.net/v/t1.0-9/110157935_301447384391653_8150559747557080942_o.jpg?_nc_cat=110&ccb=2&_nc_sid=0debeb&_nc_ohc=UaZv9glQ_r0AX9FIM5s&_nc_ht=scontent.fhan2-4.fna&oh=96770df4848e11dd7d050addc071cf13&oe=60347967">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row mt-4">--}}
{{--                                <div class="col col-md-4">--}}
{{--                                    <img class="w-100" src="https://scontent.fhan2-4.fna.fbcdn.net/v/t1.0-9/71322594_153899405813119_4751034102042329088_n.jpg?_nc_cat=105&ccb=2&_nc_sid=8bfeb9&_nc_ohc=f-Bp7Xy44U0AX_cN1Qw&_nc_ht=scontent.fhan2-4.fna&oh=df3bfff4cdba2fda933942fbef576e50&oe=60341000">--}}
{{--                                </div>--}}
{{--                                <div class="col col-md-4">--}}
{{--                                    <img class="w-100" src="https://scontent.fhan2-4.fna.fbcdn.net/v/t1.0-9/71322594_153899405813119_4751034102042329088_n.jpg?_nc_cat=105&ccb=2&_nc_sid=8bfeb9&_nc_ohc=f-Bp7Xy44U0AX_cN1Qw&_nc_ht=scontent.fhan2-4.fna&oh=df3bfff4cdba2fda933942fbef576e50&oe=60341000">--}}
{{--                                </div>--}}
{{--                                <div class="col col-md-4">--}}
{{--                                    <img class="w-100" src="https://scontent.fhan2-4.fna.fbcdn.net/v/t1.0-9/71322594_153899405813119_4751034102042329088_n.jpg?_nc_cat=105&ccb=2&_nc_sid=8bfeb9&_nc_ohc=f-Bp7Xy44U0AX_cN1Qw&_nc_ht=scontent.fhan2-4.fna&oh=df3bfff4cdba2fda933942fbef576e50&oe=60341000">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row mt-4">--}}
{{--                                <div class="col col-md-4">--}}
{{--                                    <img class="w-100" src="https://scontent.fhan2-1.fna.fbcdn.net/v/t1.0-9/71311897_155669755636084_4345356165849284608_n.jpg?_nc_cat=101&ccb=2&_nc_sid=8bfeb9&_nc_ohc=3pHAvOtAB9sAX-7wKx3&_nc_ht=scontent.fhan2-1.fna&oh=50bb43903733e59b804c76861a2ab381&oe=6037AD87">--}}
{{--                                </div>--}}
{{--                                <div class="col col-md-4">--}}
{{--                                    <img class="w-100" src="https://scontent.fhan2-1.fna.fbcdn.net/v/t1.0-9/71311897_155669755636084_4345356165849284608_n.jpg?_nc_cat=101&ccb=2&_nc_sid=8bfeb9&_nc_ohc=3pHAvOtAB9sAX-7wKx3&_nc_ht=scontent.fhan2-1.fna&oh=50bb43903733e59b804c76861a2ab381&oe=6037AD87">--}}
{{--                                </div>--}}
{{--                                <div class="col col-md-4">--}}
{{--                                    <img class="w-100" src="https://scontent.fhan2-1.fna.fbcdn.net/v/t1.0-9/71311897_155669755636084_4345356165849284608_n.jpg?_nc_cat=101&ccb=2&_nc_sid=8bfeb9&_nc_ohc=3pHAvOtAB9sAX-7wKx3&_nc_ht=scontent.fhan2-1.fna&oh=50bb43903733e59b804c76861a2ab381&oe=6037AD87">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        const openModal = () => {
            $.ajax({
                method: 'GET',
                url: "{{ route('post.create') }}",
                success: function (data) {
                    $('#modal').empty().html(data);
                    $('#modalPost').modal('show');
                }
            })
        }
    </script>
@endsection
