@extends('front.layouts.master')

@section('title', __('Deposit Methods'))

@section('content')
    <div class="video-area-2 common-pd-bottom right-line-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <form method="POST" action="{{ route('transfer.store') }}">
                        @csrf
                        <div class="title text-center">
                            <h5>{{__('Share your Balance with Other User')}}</h5>
                        </div>

                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p class="text-danger"> {{$general->bal_trans_percentage_charge}}% {{__('Transfer Charge will Applied and transferred Fund will go to Secondary Balance.')}}</p>
                                <p class="text-danger"> {{$general->bal_trans_fixed_charge}} {{$general->currency}} {{__('fixed transfer Charge will Applied and transferred Fund will go to Secondary Balance.')}}</p>
                                <hr>

                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{__('Receiver Email')}} :</label>
                            <input type="email" name="email" class="form-control" placeholder="{{__('Email to Transfer')}}" required autocomplete="email" autofocus>
                        </div>
                        <div class="form-group">
                            <label>{{__('Amount')}} :</label>
                            <input type="text" name="amount" class="form-control" id="amount" placeholder="{{__('AMOUNT YOU WANT TO SHARE')}}" autocomplete="off" required>
                            <span class="text-danger wrnMsg"></span>
                        </div>
                        <button type="submit" class="btn btn-success btn-block">{{__('Transfer Now')}}</button>
                    </form>
                </div>



{{--                @foreach($gateways as $gate)--}}
{{--                    <div class="col-lg-3 col-md-6">--}}
{{--                        <div class="single-about text-center bg-gradient">--}}
{{--                            <div class="thumb">--}}
{{--                                <img src="{{asset('images/gateway')}}/{{$gate->id.'.jpg'}}" alt="icon">--}}
{{--                            </div>--}}
{{--                            <h5><a href="#depositModal{{$gate->id}}" data-toggle="modal">{{$gate->name}}</a></h5>--}}
{{--                            <a class="btn btn-plus" href="#depositModal{{$gate->id}}" data-toggle="modal"><i class="fa fa-plus"></i></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}


{{--                    <!-- Modal -->--}}
{{--                    <div class="modal fade" id="depositModal{{$gate->id}}" tabindex="-1" role="dialog"--}}
{{--                         aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--                        <div class="modal-dialog" role="document">--}}
{{--                            <div class="modal-content">--}}
{{--                                <div class="modal-header">--}}
{{--                                    <h4 class="modal-title">{{__('Deposit via')}} <strong>{{$gate->name}}</strong></h4>--}}
{{--                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                        <span aria-hidden="true">&times;</span>--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                                <form method="post" action="{{route('users.depositDataInsert')}}" enctype="multipart/form-data">--}}
{{--                                    @csrf--}}

{{--                                    <div class="modal-body">--}}
{{--                                        <label><strong>{{__('DEPOSIT AMOUNT')}}</strong>--}}
{{--                                            <span class="modal-msg">({{ $gate->minamo }} - {{$gate->maxamo }}--}}
{{--                                                ) {{$general->currency}}--}}
{{--                                                <br>--}}
{{--                                               <code--}}
{{--                                                       class="font-weight-bold">{{__('Charged')}} {{ $gate->fixed_charge }} {{$general->currency}}--}}
{{--                                                   + {{ $gate->percent_charge }}%</code>--}}
{{--                                        </span>--}}
{{--                                        </label>--}}
{{--                                        <hr/>--}}

{{--                                        @if ($gate->id > 899)--}}
{{--                                            <strong class="text-dark">{{__('Payment Details')}}</strong> <small>{{__('(Send Here)')}}</small><br>--}}
{{--                                            <div class="">--}}
{{--                                                {!! clean(nl2br($gate->val3)) !!}--}}
{{--                                            </div>--}}
{{--                                        @endif--}}

{{--                                            <input type="hidden" name="gateway" value="{{$gate->id}}">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label for="exampleInputEmail1" class="text-dark"><strong>{{__('Amount')}}</strong></label>--}}
{{--                                                <div class="input-group mb-3">--}}
{{--                                                    <input name="amount" type="text" class="form-control" onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" placeholder="{{__('Enter Amount')}}" required>--}}
{{--                                                    <div class="input-group-append">--}}
{{--                                                        <span class="input-group-text" id="basic-addon2">{{$general->currency}}</span>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            @if ($gate->id > 899)--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <label for="exampleInputRecipt" class="text-dark"><strong>{{__('Receipt Image')}}</strong></label>--}}
{{--                                                    <input type="file" class="form-control" name="receipt">--}}
{{--                                                </div>--}}
{{--                                            @endif--}}
{{--                                    </div>--}}

{{--                                    <div class="modal-footer">--}}
{{--                                        <button type="submit" class="btn btn-success ">{{__('Preview')}}</button>--}}
{{--                                        <button type="button" class="btn btn-danger " data-dismiss="modal">Close--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                @endforeach--}}

            </div>
        </div>
    </div>
@endsection
