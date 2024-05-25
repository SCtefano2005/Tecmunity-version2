@extends('settings')

@section('title', 'Account')

@section('contenidoSettings')
<div class="right_row">
<div class="row border-radius">
    <div class="settings shadow">
        <div class="settings_title">
            <h3>Account Settings</h3>
        </div>
        <div class="settings_content">
            <ul>
                <li>
                    <p><b>Notifications Sound</b><br>A sound will be played each time you receive a new activity notification</p>
                    <label class="switch"><input type="checkbox" class="primary"><span class="slider round"></span></label>
                </li>
                <li>
                    <p><b>Notifications Email</b><br>We’ll send you an email to your account each time you receive a new activity notification</p>
                    <label class="switch"><input type="checkbox" class="primary" checked><span class="slider round"></span></label>
                </li>
                <li>
                    <p><b>Friend’s Birthdays</b><br>Choose wheather or not receive notifications about your friend’s birthdays on your newsfeed</p>
                    <label class="switch"><input type="checkbox" class="primary" checked><span class="slider round"></span></label>
                </li>
                <li>
                    <p><b>Chat Message Sound</b><br>A sound will be played each time you receive a new message on an inactive chat window</p>
                    <label class="switch"><input type="checkbox" class="primary"><span class="slider round"></span></label>
                </li>
            </ul>
        </div>
    </div>
</div>
</div>
@endsection