@extends('layouts.chat')
@section('content')
<div class="section-chat">
    <div class="chat-left">
       <div class="button-chat d-flex flex-row justify-content-between">
        <li>
            <a href="/" class="btn btn-dark">Trang chủ</a>
        </li>
        <li>
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">
                New message
            </button>
        </li>
       </div>
        <ul class="user-list">
            
            <div class="user-taskbar">
                @if (isset($taskbar))
                @foreach ($taskbar as $a => $b)
                <li class="user-item" data-name="{{ $newUsers[$a] }}" data-id="{{ $a }}">
                    <img width="100" height="100" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg" alt="" srcset="">
                    <div class="chat">
                        <p class="name">{{ $newUsers[$a] }}</p>
                        <p class="chat-last">{{ $b }}</p>
                    </div>
                </li>
                @endforeach
                @endif
            </div>
        </ul>
    </div>
    <div class="chat-right">
        <div class="errorsSide"></div>
        <div class="mainChater">
            <div class="headerDet">
                <div class="chatDety">
                    <div class="nameC">
                        @if (isset($_SESSION['toUser']))
                        <p class="roomTitle" id="titleFirst">{{ $_SESSION['toUserName'][$_SESSION['toUser']] }}</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="blackout"></div>
            <div onload="scroll()" class="chatArea changeW">
                <div class="chatMessages" id="bottom">

                </div>
                <div class="messageBox">
                    <div class="textA">
                        <textarea id="message" name="message" rows="1" cols="30" placeholder="Type your message here"></textarea>
                    </div>
                    <button class="button-s1" id="send" tooltip="Send" flow="left">Send</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Search</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <input type="text" id="search-input" name="search" placeholder="Enter name" />
                    </form>
                    <div class="result-user">

                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    <button type="button" class="btn btn-primary" id="search">Search</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection