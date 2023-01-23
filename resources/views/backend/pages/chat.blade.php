@extends('backend.layouts.app')

@section('styles')
@endsection

@section('content')
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="chat chat-app row">

            <div class="chat-content">
                <div class="conversation">
                    <div class="conversation-wrapper">
                        <div class="conversation-header justify-content-between">
                            <div class="media align-items-center">
                                <a href="javascript:void(0);" class="chat-close m-r-20 d-md-none d-block text-dark font-size-18 m-t-5">
                                    <i class="anticon anticon-left-circle"></i>
                                </a>
                                <div class="avatar avatar-image">
                                    <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                </div>
                                <div class="p-l-15">
                                    <h6 class="m-b-0">Customer Name</h6>
                                    <p class="m-b-0 text-muted font-size-13 m-b-0">
                                        <span class="badge badge-success badge-dot m-r-5"></span>
                                        <span>Online</span>
                                    </p>
                                </div>
                            </div>
                            <div class="dropdown dropdown-animated scale-left">
                                <a class="text-dark font-size-20" href="javascript:void(0);" data-toggle="dropdown">
                                    <i class="anticon anticon-setting"></i>
                                </a>
                                <div class="dropdown-menu">
                                    <button class="dropdown-item" type="button">Action</button>
                                    <button class="dropdown-item" type="button">Another action</button>
                                    <button class="dropdown-item" type="button">Something else here</button>
                                </div>
                            </div>
                        </div>
                        <div class="conversation-body">
                            <div class="msg justify-content-center">
                                <div class="font-weight-semibold font-size-12"> 7:57PM </div>
                            </div>
                            <div class="msg msg-recipient">
                                <div class="m-r-10">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                    </div>
                                </div>
                                <div class="bubble">
                                    <div class="bubble-wrapper">
                                        <span>Hey, let me show you something nice!</span>
                                    </div>
                                </div>
                            </div>
                            <div class="msg msg-sent">
                                <div class="bubble">
                                    <div class="bubble-wrapper">
                                        <span>Oh! What is it?</span>
                                    </div>
                                </div>
                            </div>
                            <div class="msg msg-recipient">
                                <div class="m-r-10">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                    </div>
                                </div>
                                <div class="bubble">
                                    <div class="bubble-wrapper p-5">
                                        <img src="https://s3.envato.com/files/249796117/preview.__large_preview.png" alt="https://s3.envato.com/files/249796117/preview.__large_preview.png">
                                    </div>
                                </div>
                            </div>
                            <div class="msg msg-recipient">
                                <div class="bubble m-l-50">
                                    <div class="bubble-wrapper">
                                        <span>Applicator - Bootstrap 4 Admin Template</span>
                                    </div>
                                </div>
                            </div>
                            <div class="msg msg-recipient">
                                <div class="bubble m-l-50">
                                    <div class="bubble-wrapper">
                                        <span>A creative, responsive and highly customizable admin template</span>
                                    </div>
                                </div>
                            </div>
                            <div class="msg msg-sent">
                                <div class="bubble">
                                    <div class="bubble-wrapper">
                                        <span>Wow, that was cool!</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="conversation-footer">
                            <input class="chat-input" type="text" placeholder="Type a message...">
                            <ul class="list-inline d-flex align-items-center m-b-0">
                                <li class="list-inline-item m-r-15">
                                    <a class="text-gray font-size-20" href="javascript:void(0);" data-toggle="tooltip" title="Emoji">
                                        <i class="anticon anticon-smile"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item m-r-15">
                                    <a class="text-gray font-size-20" href="javascript:void(0);" data-toggle="tooltip" title="Attachment">
                                        <i class="anticon anticon-paper-clip"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <button class="d-none d-md-block btn btn-primary">
                                            <span class="m-r-10">Send</span>
                                            <i class="far fa-paper-plane"></i>
                                        </button>
                                    <a href="javascript:void(0);" class="text-gray font-size-20 d-md-none d-block">
                                        <i class="far fa-paper-plane"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Wrapper END -->
@endsection
@section('scripts')
    
@endsection