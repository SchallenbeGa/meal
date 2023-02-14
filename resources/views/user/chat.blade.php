<style>
  .container {
    max-width: 100%;
    margin: auto;
  }

  img {
    max-width: 100%;
  }
  .top_spac {
    margin: 20px 0 0;
  }
  .recent_heading {
    float: left;
    width: 40%;
  }
  .recent_heading h4 {
    color: #05728f;
    font-size: 21px;
    margin: auto;
  }

  .chat_ib h5 {
    font-size: 15px;
    color: #464646;
    margin: 0 0 8px 0;
  }

  .chat_ib h5 span {
    font-size: 13px;
    float: right;
  }

  .chat_ib p {
    font-size: 14px;
    color: #989898;
    margin: auto
  }

  .chat_img {
    float: left;
    width: 11%;
  }

  .chat_ib {
    float: left;
    padding: 0 0 0 15px;
    width: 88%;
  }

  .chat_people {
    overflow: hidden;
    clear: both;
  }


  .inbox_chat {
    height: 550px;
    overflow-y: scroll;
  }

  .active_chat {
    background: #f3f3f3;
  }

  .incoming_msg_img {
    display: inline-block;
    width: 6%;
  }

  .received_msg {
    display: inline-block;
    padding: 0 0 0 10px;
    vertical-align: top;
    width: 92%;
  }

  .received_withd_msg p {
    background: #ebebeb none repeat scroll 0 0;
    border-radius: 3px;
    color: #646464;
    font-size: 14px;
    margin: 0;
    padding: 5px 10px 5px 12px;
    width: 100%;
  }

  .time_date {
    color: #747474;
    display: block;
    font-size: 12px;
    margin: 8px 0 0;
  }

  .mesgs {
    border-radius:10px;
    padding: 30px 15px 0 25px;
  }

  .sent_msg p {
    background: #d6d5d5 none repeat scroll 0 0;
    border-radius: 3px;
    font-size: 14px;
    margin: 0;
    padding: 5px 10px 5px 12px;
    width: 100%;
  }

  .outgoing_msg {
    overflow: hidden;
    margin: 26px 0 26px;
  }

  .sent_msg {
    float: right;
    width: 46%;
  }

  .input_msg_write input {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    border: medium none;
    font-size: 15px;
    min-height: 48px;
    width: 100%;
  }

  .type_msg {
    border-top: 1px solid #c4c4c4;
    position: relative;
  }

  .msg_send_btn {
    background: #989898 none repeat scroll 0 0;
    border: medium none;
    border-radius: 50%;
    color: #fff;
    cursor: pointer;
    font-size: 17px;
    height: 30px;
    position: absolute;
    right: 4px;
    top: 7px;
    width: 33px;
  }

  .messaging {
    padding: 0 0 50px 0;
  }

  .msg_history {
    overflow-y: auto;
  }
</style>
@extends('layouts.app')

@section('content')
<section class="container pt-5">
  <div class="row">
    @include('user.nav')
    <div class="col-md-8 offset-lg-1 pb-5 mb-2 mb-lg-4 mt-n3 mt-md-0">
      <section class="container">
        <div class="messaging">
          <div class="inbox_msg">
            <div class="mesgs" style="background-color:#F1F1F1">
              <div class="msg_history">
                <!-- from ajax->db !-->
                <div class="incoming_msg">
                  <div class="incoming_msg_img">  <i class="bx bx-user-circle fs-lg ms-1"></i> </div>
                  <div class="received_msg">
                    <div class="received_withd_msg">
                      <p>Bonjour "username", nous avons bien reçu votre dossier ! Nous vous avons envoyé un dernier formulaire dans le menu "Mon Dossier".</p>
                      <span class="time_date"> 11:05 | 9 Juin 2023</span>
                    </div>
                  </div>
                </div>
                <!-- from ajax db and live !-->
                <div class="outgoing_msg">
                  <div class="sent_msg">
                    <p>Bonjour c'est fait !</p>
                    <span class="time_date"> 11:10 | 9 Juin 2023</span>
                  </div>
                </div>
                <!--end!-->
              </div>
              <div class="type_msg">
                <div class="input_msg_write">
                  <input type="text" class="write_msg" placeholder="Type a message">
                  <button class="msg_send_btn" type="button"><i class="bx bx-paper-plane" aria-hidden="true"></i></button>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</section>
@include('template.rrweb')
@endsection