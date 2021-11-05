@extends('front.layouts.master')

@section('title', __('Add Fund'))

@section('content')

    <style>

        .stepwizard-step p {
            margin-top: 0px;
            color:#666;
        }
        .stepwizard-row {
            display: table-row;
        }
        .stepwizard {
            display: table;
            width: 100%;
            position: relative;
        }
        .stepwizard-step button[disabled] {
            /*opacity: 1 !important;
            filter: alpha(opacity=100) !important;*/
        }
        .stepwizard .btn.disabled, .stepwizard .btn[disabled], .stepwizard fieldset[disabled] .btn {
            opacity:1 !important;
            color:#bbb;
        }
        .stepwizard-row:before {
            top: 14px;
            bottom: 0;
            position: absolute;
            content:" ";
            width: 100%;
            height: 1px;
            background-color: #ccc;
            z-index: 0;
        }
        .stepwizard-step {
            display: table-cell;
            text-align: center;
            position: relative;
        }
        .btn-circle {
            width: 30px;
            height: 30px;
            text-align: center;
            padding: 6px 0;
            font-size: 12px;
            line-height: 1.428571429;
            border-radius: 15px;
        }
    </style>


    <div class="check-profit-area pb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="stepwizard">
                        <div class="stepwizard-row setup-panel">
                            <div class="stepwizard-step col-xs-3">
                                <a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
                                <p><small>Amount</small></p>
                            </div>
                            <div class="stepwizard-step col-xs-3">
                                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                                <p><small>Gateway</small></p>
                            </div>

                          
                        </div>
                    </div>

                    <form role="form" method="POST" action="{{ route('submit.amount.deposit') }}" id="submitPayment" enctype="multipart/form-data">
                        @csrf
                        <div class="card panel-primary mt-5 setup-content" id="step-1">
                            <div class="card-header panel-heading">
                                <h3 class="panel-title text-center">{{__('Put Your Deposit Amount')}}</h3>
                            </div>
                            <div class="card-body panel-body">
                                <div class="form-group">
                                    <label class="control-label">{{__('Amount')}}</label>
                                    <input maxlength="100" type="text" required="required" class="form-control" autocomplete="off" onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" name="amount"  id="amount" placeholder="{{__('AMOUNT')}}" />
                                </div>
                                <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                            </div>
                        </div>

                        <div class="panel panel-primary setup-content mt-5" id="step-2">
                            <div class="panel-heading">
                                <h3 class="panel-title text-center">Select Payment Gateway</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    @foreach($gateways as $gate)
                                        <div class="card col-md-4 mb-5">
                                            <div class="card-header">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" class="custom-control-input" id="customRadio{{$gate->id}}" name="gateway" data-valFour="{{clean(nl2br($gate->gateway_key_four))}}" value="{{$gate->id}}">
                                                    <label class="custom-control-label" for="customRadio{{$gate->id}}">{{$gate->name}}</label>
                                                </div></div>
                                            <div class="card-body">
                                                <img src="{{asset('images/gateway/'.$gate->image)}}">
                                            </div>
                                            <div class="card-footer text-center">
                                                <p class="text-success">{{__('Min-Max')}} :{{$gate->minimum_deposit_amount}} - {{$gate->maximum_deposit_amount}} {{$general->currency}}</p>
                                                <small class="text-danger"> {{__('Fixed Charge')}} : {{$gate->fixed_charge}} {{$general->currency}} & {{__('Percentage Charge')}} : {{$gate->percentage_charge}}%</small>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="col-12">


                                          <div class="modal fade" id="depositModal" tabindex="-1" role="dialog"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">{{__('Deposit via')}} <strong>{{$gate->name}}</strong></h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form method="post" action="{{route('submit.amount.deposit')}}" enctype="multipart/form-data">
                                                        @csrf

                                                        <div class="modal-body">
                                                           
                                                                <strong class="text-dark">{{__('Payment Details')}}</strong> <small>{{__('(Send Here)')}}</small><br>
                                                                <div class="gateWayFour">
                                                                  
                                                                </div>
                                                           

                                                            <!-- <input type="hidden" name="gateway" value="{{$gate->id}}">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1" class="text-dark"><strong>{{__('Amount')}}</strong></label>
                                                                <div class="input-group mb-3">
                                                                    <input name="amount" type="text" class="form-control" onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" placeholder="{{__('Enter Amount')}}" required>
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text" id="basic-addon2">{{$general->currency}}</span>
                                                                    </div>
                                                                </div>
                                                            </div> -->

                                                        
                                                                <div class="form-group">
                                                                    <label for="exampleInputRecipt" class="text-dark"><strong>{{__('Receipt Image')}}</strong></label>
                                                                    <input type="file" class="form-control" name="receipt">
                                                                </div>
                                                           
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success">{{__('Preview')}}</button>
                                                            <button type="button" class="btn btn-danger " data-dismiss="modal">Close
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                   

                                        <button class="btn btn-success pull-right" type="button" onclick="document.getElementById('submitPayment').submit();">{{__('Submit & Preview')}}</button>
                                
                                    </div>
                                </div>
                            </div>
                        </div>

                      
                    </form>
                </div>

            </div>
        </div>
    </div>



                                      

@endsection

@section('script')
    <script>
        $(document).ready(function () {


            $(".custom-control-input").change(function() {
                if(this.checked && $(this).val() > 3) {
                    $('#depositModal').modal('show');
                    $('.gateWayFour').html($(this).attr('data-valFour'));
                }
            });

            var navListItems = $('div.setup-panel div a'),
                allWells = $('.setup-content'),
                allNextBtn = $('.nextBtn');

            allWells.hide();

            navListItems.click(function (e) {
                e.preventDefault();
                var $target = $($(this).attr('href')),
                    $item = $(this);

                if (!$item.hasClass('disabled')) {
                    navListItems.removeClass('btn-success').addClass('btn-default');
                    $item.addClass('btn-success');
                    allWells.hide();
                    $target.show();
                    $target.find('input:eq(0)').focus();
                }
            });

            allNextBtn.click(function () {
                var curStep = $(this).closest(".setup-content"),
                    curStepBtn = curStep.attr("id"),
                    nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                    curInputs = curStep.find("input[type='text'],input[type='url']"),
                    isValid = true;

                $(".form-group").removeClass("has-error");
                for (var i = 0; i < curInputs.length; i++) {
                    if (!curInputs[i].validity.valid) {
                        isValid = false;
                        $(curInputs[i]).closest(".form-group").addClass("has-error");
                    }
                }

                if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');
            });

            $('div.setup-panel div a.btn-success').trigger('click');
        });
    </script>

@stop
